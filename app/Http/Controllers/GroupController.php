<?php

namespace App\Http\Controllers;

use App\User;
use App\Group;
use App\UserGroup;
use App\Classes\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Route;
use Theme;
use Input;
use Validator;

class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Groups
    public function GET_assignGroupForm()
    {
        $theme = Theme::uses('notebook')->layout('default');
        $theme->asset()->container('post-scripts')->usePath()->add('laravel', 'js/laravel.js');
        $theme->setMenu('user.group');
        
        $routes = Route::getRoutes();
        $groups = Group::all();

        $permits = array();
        if($groups) {
            foreach ($groups as $group) {
                $findGroup = Group::find($group->id);
                $permissions = json_decode($findGroup->permissions);
                $permits[$group->name] = array();
                if($permissions) {
                    foreach ($permissions as $key => $permission) {
                        $permits[$group->name][] = $key;
                    }
                }
            }
        }

        $params = array('routes' => $routes, 'groups' => $groups, 'permits' => $permits);
        return $theme->scope('user.group-assign', $params)->render();
    }

    public function POST_assignGroup($params)
    {
        $ex_params = explode('_', $params);
        $group_name = ucfirst($ex_params[0]);
        $route = $ex_params[1];
        $action = $ex_params[2];

        $group = Group::where('name', $group_name)->first();
        $permits = json_decode($group->permissions, true);

        if ($action == 'push') {
            $permits[$route] = 1;
            $msg = 'Route `'.$route.'` successfully added to group `'.$group_name.'`';
        } else if($action == 'pop') {
            unset($permits[$route]);
            $msg = 'Route `'.$route.'` successfully removed from group `'.$group_name.'`';
        } else {
            return redirect(route('group.assign'));
        }

        $group->permissions = json_encode($permits);
        if ($group->save()) {
            return redirect(route('group.assign', '#'.$route))->with('STATUS_OK', $msg);
        } else {
            return redirect(route('group.assign', '#'.$route))->with('STATUS_FAIL', $msg);
        }
    }
    
    public function GET_createGroupForm()
    {
        $theme = Theme::uses('notebook')->layout('default');
        $theme->setMenu('user.group');

        $routeCollection = Route::getRoutes();

        $params = array('routes' => $routeCollection);
        return $theme->scope('user.group-create', $params)->render();
    }

    public function POST_createGroup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'group_name' => 'required',
            'routes' => 'required|array'
        ]);

        $errors = array();
        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $message) {
                $errors[] = $message;
            }
        }

        if(!count($errors)) {
            $chk = Group::where('name', $request->input('group_name'))->count();
            if($chk) {
                $errors[] = 'Group `'.$request->input('group_name').'` already exists.';
            }
        }

        if(!count($errors)) {
            $ar_grps = $request->input('routes');
            $ar_groups = array();

            if(is_array($ar_grps)) {
                foreach ($ar_grps as $key => $grp) {
                    $ar_groups[$grp] = 1;
                }
            }

            // $group = Group::create(array(
            $group = new Group;
            $group->name = $request->input('group_name');
            $group->permissions = json_encode($ar_groups);
            $group->save();

            return redirect(route('group.assign'))->with('STATUS_OK', 'Group `'.$request->input('group_name').'` successfully created.');
        }
        else {
            $msg = Helper::arrayToList($errors);
            return redirect(route('group.create'))->with('STATUS_FAIL', $msg)->withInput();
        }
    }

    public function DELETE_deleteGroup($id)
    {
        $group = Group::find($id);
        if(!$group) {
            $msg = 'Group not found.';
            return redirect(route('group.assign'))->with('STATUS_FAIL', $msg);
        }
        else {
            $group_name = $group->name;
            $group->delete();
            $ug = UserGroup::where('group_id', $id);
            $ug->delete();
            return redirect(route('group.assign'))->with('STATUS_OK', 'Group `'.$group_name.'` has been deleted.');
        }
    }

}