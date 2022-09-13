<?php

namespace App\Http\Controllers\API;

use App\Models\DesignStyle;
use App\Models\PropertyPlan;
use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiDesignStyleController extends Controller
{
    public function getDesignByCategory($category_id){
        $designstyle = DesignStyle::with('design_category')->where('design_category_id',$category_id)->orderBy('display_name','ASC')->get();
        return response()->json($designstyle);
    }

    public function getDesignByCategoryFrontentProperty($category_id, $property_id, $paginate = 3){
        $planList = PropertyPlan::where('property_id', $property_id)->pluck('plan_id');
        $plans = Plan::whereIn('id', $planList)->where('design_category_id', $category_id)->first();

        if($plans){
            $designstyle = DesignStyle::with('design_category')
            ->where('design_category_id',$category_id)
            ->orderBy('display_name','ASC')
            ->paginate($paginate);
            return response()->json($designstyle, 200);
        }else{
            $designstyle = null;
            return response()->json($designstyle, 400);
        }

    }
}
