<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function SetLanguage($param, Request $request){
        $lang = ['en', 'ja'];
        if(in_array($param, $lang)){
            $request->session()->put('language', $param);
            return redirect($request->header("referer"));
        }
        abort(404);
    }
}
