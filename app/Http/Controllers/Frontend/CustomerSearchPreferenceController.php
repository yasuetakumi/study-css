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
            if($csp->count() == 2){
                $skeleton = 3;
            } else {
                $skeleton = $csp[0]->id;
            }
        }
        //get walking distance
        if(isset($data['徒歩'])){
            $walking_distance = WalkingDistanceFromStationOption::find($data['徒歩']);
        }

        DB::beginTransaction(function() use ($data, $walking_distance, $cities, $property_preferences, $property_types, $abovegrounds, $undergrounds, $skeleton){
            $customer = new CustomerSearchPreference();
            $customer->customer_email = $data['customer_email'];
            $customer->is_email_enabled = CustomerSearchPreference::DISABLE_EMAIL;

            $customer->surface_min = isset($data['面積下限']) ? (int) filter_var($data['面積下限'], FILTER_SANITIZE_NUMBER_INT) : '';
            $customer->surface_max = isset($data['面積上限']) ? (int) filter_var($data['面積上限'], FILTER_SANITIZE_NUMBER_INT) : '';
            $customer->rent_amount_min = isset($data['賃料下限']) ? (int) filter_var($data['賃料下限'], FILTER_SANITIZE_NUMBER_INT) : '';
            $customer->rent_amount_max = isset($data['賃料上限']) ? (int) filter_var($data['賃料上限'], FILTER_SANITIZE_NUMBER_INT) : '';
            $customer->freetext = isset($data['フリーワード']) ?? null;
            $customer->walking_distance = $walking_distance->count() > 0 ? $walking_distance->id : null ;
            $customer->transfer_price_min = isset($data['譲渡額下限'] ) ? (int) filter_var($data['譲渡額下限'], FILTER_SANITIZE_NUMBER_INT) : '';
            $customer->transfer_price_max = isset($data['譲渡額上限']) ? (int) filter_var($data['譲渡額上限'], FILTER_SANITIZE_NUMBER_INT) : '';

            $customer->skeleton_id = !empty($skeleton) ? $skeleton : null;
            $customer->save();

            //save to intermediate table

            if($cities->count() > 0){
                foreach($cities as $city){
                    $customer_city = new CustomerSearchPreferenceCity();
                    $customer_city->customer_search_preference_id = $customer->id;
                    $customer_city->city_id = $city->id;
                    $customer_city->save();
                }
            }
            if($property_preferences->count() > 0){
                foreach($property_preferences as $pp){
                    $customer_pp = new CustomerSearchPreferencesPropertyPreference();
                    $customer_pp->customer_search_preference_id = $customer->id;
                    $customer_pp->property_preference_id = $pp->id;
                    $customer_pp->save();
                }
            }
            if($property_types->count() > 0){
                foreach($property_types as $pt){
                    $customer_pt = new CustomerSearchPreferencesPropertyType();
                    $customer_pt->customer_search_preference_id = $customer->id;
                    $customer_pt->property_type_id = $pt->id;
                    $customer_pt->save();
                }
            }

            if($abovegrounds->count() > 0){
                foreach($abovegrounds as $ab){
                    $customer_above = new CustomerSearchPreferencesFloorAbove();
                    $customer_above->customer_search_preference_id = $customer->id;
                    $customer_above->floor_above_id = $ab->id;
                    $customer_above->save();
                }
            }

            if($undergrounds->count() > 0){
                foreach($undergrounds as $ud){
                    $customer_under = new CustomerSearchPreferencesFloorUnder();
                    $customer_under->customer_search_preference_id = $customer->id;
                    $customer_under->floor_under_id = $ud->id;
                    $customer_under->save();
                }
            }

        });
        $response = 'success';
        return response()->json($response);
    }
}
