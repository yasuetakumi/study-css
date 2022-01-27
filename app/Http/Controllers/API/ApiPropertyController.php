<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class ApiPropertyController extends Controller
{

    public function getPropertyByFilter(Request $request)
    {
        $filter = (object) $request->all();
        //return response()->json($filter);
        $query = Property::with(['properties_property_preferences', 'property_stations'])->select('id', 'location', 'rent_amount', 'surface_area');
        $selectedUnderground = array();
        $selectedAboveground = array();
        $selectedPropertyType = array();
        $selectedPropertyPreference = array();
        $selectedCuisines = array();

        $maxSurface = !empty($filter->surface_max) ? $filter->surface_max : '';
        $minSurface = !empty($filter->surface_min) ? $filter->surface_min : '';
        $columnSurface = 'surface_area';
        $query->RangeArea((int)$minSurface, (int)$maxSurface, $columnSurface);


        $maxRentAmount = !empty($filter->rent_amount_max) ? $filter->rent_amount_max : '';
        $minRentAmount = !empty($filter->rent_amount_min) ? $filter->rent_amount_min : '';
        $columnRentAmount = 'rent_amount';

        $query->RangeArea((int)$minRentAmount, (int)$maxRentAmount, $columnRentAmount);

        $maxTransferPrice = !empty($filter->transfer_price_max) ? $filter->transfer_price_max : '';
        $minTransferPrice = !empty($filter->transfer_price_min) ? $filter->transfer_price_min : '';
        $columnTransferPrice = 'interior_transfer_price';

        $query->RangeArea((int)$minTransferPrice, (int)$maxTransferPrice, $columnTransferPrice);

        if(isset($filter->skeleton) && !isset($filter->furnished)){
            $query->where('is_skeleton', (int)$filter->skeleton);
        }
        if(isset($filter->furnished)&& !isset($filter->skeleton)){
            $query->where('is_skeleton', (int)$filter->furnished);
        }
        if(isset($filter->floor_under)){
            foreach($filter->floor_under as $key => $value){
                array_push($selectedUnderground, $filter->floor_under[$key]);
            }
            $query->whereIn('number_of_floors_under_ground', $selectedUnderground);
        }
        if(isset($filter->above)){
            foreach($filter->above as $key => $value){
                array_push($selectedAboveground, $filter->above[$key]);
            }
            $query->whereIn('number_of_floors_above_ground', $selectedAboveground);
        }

        if(isset($filter->cuisine)){
            foreach($filter->cuisine as $key => $value){
                array_push($selectedCuisines, $filter->cuisine[$key]);
            }
            $query->whereIn('cuisine_id', $selectedCuisines);
        }

        if(isset($filter->walking_distance)){
            $id = $filter->walking_distance;
            $query->whereHas('property_stations', function($q) use($id) {
                $q->where('distance_from_station', $id);
            });
        }

        if(isset($filter->property_type)){
            foreach($filter->property_type as $key => $value){
                array_push($selectedPropertyType, $filter->property_type[$key]);
            }
            $query->whereIn('property_type_id', $selectedPropertyType);
        }

        if(isset($filter->property_preference)){
            foreach($filter->property_preference as $key => $value){
                array_push($selectedPropertyPreference, $filter->property_preference[$key]);
            }
            $query->whereHas('properties_property_preferences', function($q) use($selectedPropertyPreference) {
                $q->whereIn('property_preferences_id', $selectedPropertyPreference);
            });
        }

        if(isset($filter->name)){
            $query->where('location', 'like', '%' . $filter->name . '%')->orWhere('repayment', 'like', '%' . $filter->name . '%')->orWhere('renewal_fee', 'like', '%' . $filter->name . '%');
        }

        $count = $query->count();
        $response = $query->get();
        return response()->json([
            'data' => [
                'status' => 'success',
                'count' => $count,
                'result' => $response,
            ]
        ], 200, [], JSON_NUMERIC_CHECK);

    }
}
