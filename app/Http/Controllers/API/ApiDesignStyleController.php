<?php

namespace App\Http\Controllers\API;

use App\Models\DesignStyle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiDesignStyleController extends Controller
{
    public function getDesignByCategory($category_id){
        $designstyle = DesignStyle::select('display_name','id', 'internal_id')->where('design_category_id',$category_id)->orderBy('display_name','ASC')->get();
        return response()->json($designstyle);
    }
}
