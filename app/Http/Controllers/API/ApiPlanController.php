<?php

namespace App\Http\Controllers\API;

use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AreaGroup;

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

    public function getPlanBySurfaceAndCategory($surface, $category_id)
    {
        $area_group_id = AreaGroup::where('minimum', '<=', (int)$surface)->where('maximum', '>=', (int) $surface)->first();

        $plan = Plan::select('display_name','id', 'area_group_id', 'thumbnail_image')->where('design_category_id', $category_id)->where('area_group_id',$area_group_id->id)->get();
        if(!$plan->isEmpty()){
            return response()->json([
                'data' => $plan,
                'status' => "success",
                'total'=> $plan->count(),
            ], 200);
        }else{
            return response()->json([
                'status' => "failed",
                'message' => "Plans Not Found",
                'total'=> 0,
                'design_category_id' => $category_id,
                'surface_area_tsubo' => $surface,
            ], 401);
        }
    }
}
