<?php

namespace App\Http\Middleware;

use App\Models\AdminRole;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if(Auth::guard("web")->check()){
                if(Auth::user()->admin_role_id == AdminRole::ROLE_SUPER_ADMIN){
                    // Check when superadmin access manage page
                    if( $request->is('manage.*') ){
                        // Redirect to manage/login
                        return redirect()->route('company-user-login');
                    } else{
                        \Log::debug('RedirectIfAuthenticated: Redirect to super admin edit');
                        return redirect()->route('admin.superadmin.edit', ['superadmin' => Auth::user()->id]);
                    }
                } else{
                    // Check when admin access manage page
                    if( $request->is('manage.*') ){
                        // Redirect to manage/login
                        return redirect()->route('company-user-login');
                    } else{
                        \Log::debug('RedirectIfAuthenticated: Redirect to admins edit');
                        return redirect()->route('admin.admins.edit', ['admin' => Auth::user()->id]);
                    }
                }
            }

            if(Auth::guard("user")->check()){
                // check when user access admin page
                if( $request->is('admin.*') ){
                    // Redirect to admin/login
                    return redirect()->route('login');
                } else{
                    \Log::debug('RedirectIfAuthenticated: Redirect to userowner edit');
                    return redirect()->route('userowner-edit');
                }
            }
        }

        return $next($request);
    }
}
