<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            // User try to access admin route and not login as admin yet
            if($request->is('admin/*') && !Auth::guard('web')->check())
                return route('login');
            // User try to access company route and not login as user yet
            elseif ($request->is('company/*') && !Auth::guard('user')->check())
                return route('company-user-login');
        }
    }
}
