<?php

namespace App\Http\Middleware;

use App\Models\AdminRole;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class MultiLanguage
{
    /**
     * Apply locale from 'language' data in session to all user.
     *
     * - Created by Grune-Abe 2020/11/24
     */
    public function handle(Request $request, Closure $next, ...$role){
        if(config('app.debug')){
            if(!empty( $request->hasSession('language') )){
                App::setLocale( $request->session()->get('language') );
            }
        }else{
            // On live environment, always apply 'ja'.
            App::setLocale( 'ja' );
        }
        return $next($request);
    }
}
