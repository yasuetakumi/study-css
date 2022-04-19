<?php

namespace App\Http\Controllers\Frontend;

use App\Models\City;
use Illuminate\Support\Arr;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use App\Models\PropertyPreference;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\CustomerSearchPreference;
use App\Models\NumberOfFloorsAboveGround;
use App\Models\NumberOfFloorsUnderGround;
use App\Models\CustomerSkeletonPreference;
use App\Models\CustomerSearchPreferenceCity;
use App\Models\WalkingDistanceFromStationOption;
use App\Models\CustomerSearchPreferencesFloorAbove;
use App\Models\CustomerSearchPreferencesFloorUnder;
use App\Models\CustomerSearchPreferencesPropertyType;
use App\Models\CustomerSearchPreferencesPropertyPreference;
use Exception;

class CustomerSearchPreferenceController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        $cities = collect();
        $property_preferences = collect();
        $property_types = collect();
        $undergrounds = collect();
        $abovegrounds = collect();
        $skeleton = '';
        $walking_distance = collect();
        $response = '';
        //get cities
        if(isset($data['市区町村'])){
            $arr_data = explode(", ", $data['市区町村']);
            $cities = City::whereIn('display_name', $arr_data)->get();
        }

        //get property preference
        if(isset($data['こだわり条件'])){
            $arr_data = explode(", ", $data['こだわり条件']);
            $property_preferences = PropertyPreference::whereIn('label_jp', $arr_data)->get();
        }

        //get property type
        if(isset($data['飲食店の種類'])){
            $arr_data = explode(", ", $data['飲食店の種類']);
            $property_types = PropertyType::whereIn('label_jp', $arr_data)->get();
        }

        //get abovegrounds
        if(isset($data['階数_地下'])){
            $arr_data = explode(", ", $data['階数_地下']);
            $abovegrounds = NumberOfFloorsAboveGround::whereIn('label_jp', $arr_data)->get();

        }

        //get undergrounds
        if(isset($data['階数_地上'])){
            $arr_data =  explode(", ", $data['階数_地上']);
            $undergrounds = NumberOfFloorsUnderGround::whereIn('label_jp', $arr_data)->get();
        }
        //get skeleton
        if(isset($data['スケルトン物件_居抜き物件'])){
            $arr_data = explode(", ", $data['スケルトン物件_居抜き物件']);
            $csp = CustomerSkeletonPreference::whereIn('label_jp', $arr_data)->get();
            if(count($csp)){
                if($csp->count() == 2){
                    $skeleton = 3;
                } else {
                    $skeleton = $csp[0]->id;
                }
            }else{
                $skeleton = null;
            }
        }
        //get walking distance
        if(isset($data['徒歩'])){
            $walking_distance = WalkingDistanceFromStationOption::where('id', $data['徒歩'])->first();
        }

        DB::beginTransaction();

        try {
            $customer = new CustomerSearchPreference();
            $customer->customer_email = $data['customer_email'];
            $customer->is_email_enabled = CustomerSearchPreference::DISABLE_EMAIL;

            $customer->surface_min = isset($data['面積下限']) ? (int) filter_var($data['面積下限'], FILTER_SANITIZE_NUMBER_INT) : '';
            $customer->surface_max = isset($data['面積上限']) ? (int) filter_var($data['面積上限'], FILTER_SANITIZE_NUMBER_INT) : '';
            $customer->rent_amount_min = isset($data['賃料下限']) ? (int) filter_var($data['賃料下限'], FILTER_SANITIZE_NUMBER_INT) : '';
            $customer->rent_amount_max = isset($data['賃料上限']) ? (int) filter_var($data['賃料上限'], FILTER_SANITIZE_NUMBER_INT) : '';
            $customer->freetext = isset($data['フリーワード']) ? $data['フリーワード'] : null;
            $customer->walking_distance = isset($data['徒歩']) ? $walking_distance->id : null ;
            $customer->transfer_price_min = isset($data['譲渡額下限'] ) ? (int) filter_var($data['譲渡額下限'], FILTER_SANITIZE_NUMBER_INT) : '';
            $customer->transfer_price_max = isset($data['譲渡額上限']) ? (int) filter_var($data['譲渡額上限'], FILTER_SANITIZE_NUMBER_INT) : '';

            $customer->skeleton_id = !empty($skeleton) ? $skeleton : null;
            $customer->save();

            //save to intermediate table

            

            //if all inserted successfully then commit the database insert
            DB::commit();
            $response = 'success';
            return response()->json($response);

        } catch (\Exception $e) {
            DB::rollback();
            $response = 'failed';
            return response()->json($e->getMessage());
        }
        
    }
}
