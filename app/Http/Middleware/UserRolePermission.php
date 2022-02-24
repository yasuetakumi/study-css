<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class UserRolePermission
{
    /**
     * Handle an incoming request.
     * db admin_roles->name == name
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     * @param array                    $role
     * @return mixed
     */
    public function handle($request, Closure $next, ...$role){
        if(in_array(Auth::guard('user')->user()->userRole->name, $role))
            return $next($request);
        // redirect to company user login
        else
            return redirect()->route('company-user-login');
    }
}
