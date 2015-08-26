<?php

namespace App\Http\Controllers;

use App\User;
use App\Group;
use App\UserGroup;
use App\Classes\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Theme;
use Input;
use Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function GET_listUser()
    {
        $theme = Theme::uses('notebook')->layout('default');
        $theme->asset()->container('post-scripts')->usePath()->add('laravel', 'js/laravel.js');
        $theme->setMenu('user.user');

        $users = User::all();
        
        $params = array('users' => $users);
        return $theme->scope('user.list', $params)->render();
    }
    
    public function GET_createUserForm()
    {
        $theme = Theme::uses('notebook')->layout('default');
        $theme->setMenu('user.user');

        $theme->asset()->container('post-scripts')->usePath()->add('typeahead', 'js/typeahead/bootstrap3-typeahead.js');
        $theme->asset()->container('post-scripts')->usePath()->add('custom', 'js/custom.js');

        $groups = Group::all();

        $params = array('groups' => $groups);
        return $theme->scope('user.create', $params)->render();
    }

    public function POST_createUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
            'name' => 'required',
            'groups' => 'required|array'
        ]);

        $errors = array();
        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $message) {
                $errors[] = $message;
            }
        }

        // check if record exists
        if(!count($errors)) {
            $chk = User::where('email', $request->input('email'))->count();
            if($chk) {
                $errors[] = 'User with this email already exists.';
            }
        }

        if(!count($errors)) {
            $user = User::create(array(
                'email'    => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'name' => $request->input('name')
            ));

            $groups = $request->input('groups');
            if (is_array($groups)) {
                foreach ($groups as $key => $group) {
                    $adminGroup = Group::find($group);
                    $usergroup = UserGroup::create(array(
                        'user_id' => $user->id,
                        'group_id' => $adminGroup->id
                    ));
                }
            }

            return redirect(route('user.list'))->with('STATUS_OK', 'User `'.$request->input('email').'` successfully created.');
        } 
        else {
            $msg = Helper::arrayToList($errors);
            return redirect(route('user.create'))->with('STATUS_FAIL', $msg)->withInput();
        }
    }

    public function GET_updateUserForm($id)
    {
        $theme = Theme::uses('notebook')->layout('default');
        $theme->setMenu('user.user');

        $user = User::find($id);
        $ugroups = $user->getGroups();
        $user_groups = array();
        foreach ($ugroups as $key => $usergrp) {
            $user_groups[$usergrp->id] = $usergrp->name;
        }
        
        $groups = Group::all();

        $params = array('user' => $user, 'groups' => $groups, 'user_groups' => $user_groups);
        return $theme->scope('user.update', $params)->render();
    }

    public function PUT_updateUser(Request $request, $id)
    {
        $theme = Theme::uses('notebook')->layout('default');
        $theme->setMenu('user.user');

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required_with:password|min:6',
            'name' => 'required',
            'groups' => 'required|array'
        ]);

        $errors = array();
        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $message) {
                $errors[] = $message;
            }
        }

        if(!count($errors)) {
            $chk = User::where('email', $request->input('email'))
                       ->where('id', '!=', $id)->count();
            if($chk) {
                $errors[] = 'User with this email already exists.';
            }
        }

        if(!count($errors)) {
            $user = User::find($id);
            $user->email = $request->input('email');
            $user->name = $request->input('name');
            if($request->has('password')) $user->password = bcrypt($request->input('password'));
            $user->save();

            $ug = UserGroup::where('user_id', $id);
            $ug->delete();

            $groups = $request->input('groups');
            if (is_array($groups)) {
                foreach ($groups as $key => $group) {
                    $adminGroup = Group::find($group);
                    $usergroup = UserGroup::create(array(
                        'user_id' => $user->id,
                        'group_id' => $adminGroup->id
                    ));
                }
            }

            return redirect(route('user.list'))->with('STATUS_OK', 'User `'.$request->input('email').'` successfully updated.');
        } 
        else {
            $msg = Helper::arrayToList($errors);
            return redirect(route('user.update', $id))->with('STATUS_FAIL', $msg)->withInput();
        }
    }

    public function DELETE_deleteUser($id)
    {
        $user = User::find($id);
        if(!$user) {
            $msg = 'User not found.';
            return redirect(route('user.list'))->with('STATUS_FAIL', $msg);
        }
        else {
            $name = $user->name;
            $user->delete();
            $ug = UserGroup::where('user_id', $id);
            $ug->delete();
            return redirect(route('user.list'))->with('STATUS_OK', 'User `'.$name.'` has been deleted.');
        }
    }
}