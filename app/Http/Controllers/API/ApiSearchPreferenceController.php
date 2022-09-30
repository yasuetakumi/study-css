<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CustomerSearchPreference;

class ApiSearchPreferenceController extends Controller
{
    public function getSearchConditionMember($memberId)
    {
        $with = [
            'customer_search_preference_cities',
            'customer_search_preference_stations',
            'customer_search_preferences_floor_aboves',
            'customer_search_preferences_floor_unders',
            'customer_search_preferences_property_preferences',
            'customer_search_preferences_property_types',
            'customer_search_preferences_cuisines',
        ];
        $searchCondition = CustomerSearchPreference::with($with)->where('member_id', $memberId)->get();

        return response()->json($searchCondition);
    }
}
