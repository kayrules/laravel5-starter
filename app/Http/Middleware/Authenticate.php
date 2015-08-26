<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Routing\Route;
use Auth;

class Authenticate
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest(route('_auth.login'));
            }
        }

        $current_route = $request->route()->getName();
        $user = Auth::user();
        $user_groups = $user->getGroups();
        $permits = array();
        foreach ($user_groups as $key => $group) {
            $perms = json_decode($group->permissions, true);
            // debug($perms);
            if(array_key_exists($current_route, $perms)) {
                $permits[] = $current_route;
            }
        }
        // debug(count($permits), $permits);

        if (!count($permits)) {
            Auth::logout();
            // return redirect()->guest(route('_auth.login'))->with('STATUS_FAIL', 'fail');
            return redirect(route('_auth.login'))->with('STATUS_FAIL', 'You do not have access to this page.');
        }

        return $next($request);
    }
}
