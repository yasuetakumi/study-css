<?php

namespace App\Http\Controllers\API;

use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiPlanController extends Controller
{
    public function getPlanByCategory($category_id) {
        $plan = Plan::select('display_name','id', 'internal_id', 'area_group_id')->where('design_category_id',$category_id)->get();
        return response()->json($plan);
    }
    public function getPlanByAreaGroup($category_id, $area_id){
        $plan = Plan::select('display_name','id', 'area_group_id')->where('design_category_id',$category_id)->where('area_group_id', $area_id)->get();
        return response()->json($plan);
    }
}
