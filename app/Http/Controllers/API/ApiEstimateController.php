<?php

namespace App\Http\Controllers\API;

use App\Models\Plan;
use App\Models\DesignStyle;
use Illuminate\Http\Request;
use App\Models\EstimationIndex;
use App\Http\Controllers\Controller;

class ApiEstimateController extends Controller
{
    public function getGrandTotalEstimation(Plan $plan, $tsubo, DesignStyle $design = null, $hasKitchen, $designCatId){
        if($design!=null){

            //get data from estimate index
            $grandTotal = EstimationIndex::where('plan_id', $plan->id)
                ->where('design_style_id', $design->id)
                ->where('tsubo_area', $tsubo)
                ->where('has_kitchen', $hasKitchen)// kitchen
                ->where('design_category_id', $designCatId)
                ->orderBy('id', 'DESC')// design category id
                ->first();

            if($grandTotal){
                return response()->json([
                    'min' => floor($grandTotal->grand_total / 10000),
                    'range' => "0 万円",
                    'total'=>0
                ]);
            }else{
                return response()->json([
                    'min' => 0,
                    'range' => "0 万円",
                    'total'=>0
                ]);
            }
        }else{
          return response()->json([
            'min' => 0,
            'range' => "0 万円",
            'total'=>0
          ]);
        }
    }
}
