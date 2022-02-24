<?php

namespace App\Http\Middleware;

use App\Models\AdminRole;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class RolePermission
{
    /**
     * Handle an incoming request.
     * db admin_roles->name == name
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     * @param array                    $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$role){
        if(in_array(Auth::user()->adminRole->name, $role))
        {
            // \Log::debug('login-user's company id :'.Auth::user()->company->id);
            // \Log::debug($request->route()->parameter('company'));

            /** [secutiry] Restrict to edit ANOTHER COMPANY data **/
            /**
             *  $request->route()->parameter('company') get parameter of URL.
             *  ex. company/{company}/user -> get id by parameter('company')
             */
            if( Auth::user()->adminRole->id == AdminRole::ROLE_COMPANY_ADMIN
                && $request->route()->parameter('company') != Auth::user()->company->id ){
                    return redirect()->route('company-user-login');
            }

            return $next($request);
        }
        else{
            return redirect()->route('login');
        }
    }
}
