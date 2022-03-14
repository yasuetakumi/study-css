<?php

namespace App\Http\Controllers\Frontend;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CustomerSearchPreference;
use App\Models\CustomerSearchPreferenceCity;
use App\Models\CustomerSearchPreferencesPropertyPreference;
use App\Models\NumberOfFloorsUnderGround;
use App\Models\PropertyPreference;
use App\Models\PropertyType;
use Illuminate\Support\Arr;

class CustomerSearchPreferenceController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        $cities = array();
        $property_preferences = array();
        $property_types = array();
        $undergrounds = array();
        $abovegrounds = array();
        $skeleton = '';
        //get cities
        if(isset($data['市'])){
            $cities = City::whereIn('display_name', explode(",", $data['市']))->get();

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
            $property_types = NumberOfFloorsUnderGround::whereIn('label_jp', $arr_data)->get();
        }

        //get undergrounds
        if(isset($data['階数_地上'])){
            $arr_data =  explode(", ", $data['階数_地上']);
            $undergrounds = NumberOfFloorsUnderGround::whereIn('label_jp'. $arr_data)->get();
        }
        //get skeleton
        if(isset($data['スケルトン物件_居抜き物件'])){
            $arr_data = explode(", ", $data['スケルトン物件_居抜き物件']);
            $skeleton = $arr_data[0];
        }

        $customer = new CustomerSearchPreference();
        $customer->customer_email = $data['customer_email'];
        $customer->is_enabled_email = CustomerSearchPreference::DISABLE_EMAIL;
        $customer->city_id = $cities[0]->id;
        $customer->surface_min = (int) filter_var($data['面積下限'], FILTER_SANITIZE_NUMBER_INT) ?? '';
        $customer->surface_max = (int) filter_var($data['面積上限'], FILTER_SANITIZE_NUMBER_INT) ?? '';
        $customer->rent_amount_min = (int) filter_var($data['賃料下限'], FILTER_SANITIZE_NUMBER_INT) ?? '';
        $customer->rent_amount_max = (int) filter_var($data['賃料上限'], FILTER_SANITIZE_NUMBER_INT) ?? '';
        $customer->freetext = $data['name'] ?? '';
        $customer->walking_distance = $data['徒歩'];
        $customer->transfer_price_min = $data['譲渡額下限'] ?? '';
        $customer->transfer_price_max = $data['譲渡額上限'] ?? '';
        $customer->floor_under = $data['階数_地上'];
        $customer->floor_above = $data['階数_地下'];
        $customer->property_preference = $data['こだわり条件'];
        $customer->property_type = $data['飲食店の種類'];
        $customer->skeleton_id = $data['スケルトン物件_居抜き物件'];
        $customer->save();

        //save to intermediate table customer_search_preference_cities
        foreach($cities as $city){
            $customer_city = new CustomerSearchPreferenceCity();
            $customer_city->customer_search_preference_id = $customer->id;
            $customer_city->city_id = $city->id;
            $customer_city->save();
        }
        foreach($property_preferences as $pp){
            $customer_pp = new CustomerSearchPreferencesPropertyPreference();
            $customer_pp->customer_search_preference_id = $customer->id;
            $customer_pp->property_preference_id = $pp->id;
            $customer_pp->save();
        }
        foreach($property_types as $pt){
            $customer_pp = new CustomerSearchPreferencesPropertyPreference();
            $customer_pp->customer_search_preference_id = $customer->id;
            $customer_pp->property_type_id = $pt->id;
            $customer_pp->save();
        }
    }
}
