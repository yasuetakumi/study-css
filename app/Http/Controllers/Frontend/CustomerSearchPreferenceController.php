<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CustomerSearchPreference;
use App\Models\CustomerSearchPreferenceCity;

class CustomerSearchPreferenceController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        $cities = array();
        $property_preferences = array();
        if(isset($data['市'])){
            $cities = explode(",", $data['市']);
        }
        $customer = new CustomerSearchPreference();
        $customer->customer_email = $data['customer_email'];
        $customer->is_enabled_email = CustomerSearchPreference::DISABLE_EMAIL;
        $customer->city_id = $data['市'];
        $customer->surface_min = $data['面積下限'] ?? '';
        $customer->surface_max = $data['面積上限'] ?? '';
        $customer->rent_amount_min = $data['賃料下限'] ?? '';
        $customer->rent_amount_max = $data['賃料上限'] ?? '';
        $customer->freetext = $data['name'] ?? '';
        $customer->walking_distance = $data['徒歩'];
        $customer->transfer_price_min = $data['譲渡額下限'] ?? '';
        $customer->transfer_price_max = $data['譲渡額上限'] ?? '';
        $customer->floor_under = $data['階数_地上'];
        $customer->floor_above = $data['階数_地下'];
        $customer->property_preference = $data['こだわり条件'];
        $customer->property_type = $data['飲食店の種類'];
        $customer->skeleton = $data['スケルトン物件_居抜き物件'];
        $customer->save();

        //save to intermediate table customer_search_preference_cities
        foreach($cities as $city){
            $customer_city = new CustomerSearchPreferenceCity();
            $customer_city->customer_search_preference_id = $customer->id;
            $customer_city->city_id = $city->id;
            $customer_city->save();
        }
    }
}
