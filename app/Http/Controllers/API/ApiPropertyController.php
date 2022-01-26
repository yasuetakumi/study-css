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
        $query = Property::select('id', 'location', 'rent_amount', 'surface_area');

        $maxSurface = !empty($filter->surface_max) ? $filter->surface_max : '';
        $minSurface = !empty($filter->surface_min) ? $filter->surface_min : '';
        $columnSurface = 'surface_area';
        $query->RangeArea((int)$minSurface, (int)$maxSurface, $columnSurface);


        $maxRentAmount = !empty($filter->rent_amount_max) ? $filter->rent_amount_max : '';
        $minRentAmount = !empty($filter->rent_amount_min) ? $filter->rent_amount_min : '';
        $columnRentAmount = 'rent_amount';

        $query->RangeArea((int)$minRentAmount, (int)$maxRentAmount, $columnRentAmount);

        if(isset($filter->skeleton)){
            $query->where('is_skeleton', (int)$filter->skeleton);
        }
        if(isset($filter->furnished)){
            $query->where('is_skeleton', (int)$filter->skeleton);
        }
        if(isset($filter->floor0)){
            // $query->where()
        }
        if(isset($filter->floor1)){
            // $query->where()
        }
        if(isset($filter->floor2)){
            // $query->where()
        }
        if(isset($filter->floor3)){
            // $query->where()
        }
        if(isset($filter->floor4)){
            // $query->where()
        }
        if(isset($filter->floor5)){
            // $query->where()
        }
        if(isset($filter->property_type_1)){
            $query->where('property_type_id', (int)$filter->property_type_1);
        }
        if(isset($filter->property_type_2)){
            $query->where('property_type_id', (int)$filter->property_type_2);
        }
        if(isset($filter->property_type_3)){
            $query->where('property_type_id', (int)$filter->property_type_3);
        }
        if(isset($filter->walking_distance)){
            // $query->where()
        }
        if(isset($filter->property_preference_1)){
            // $query->where()
        }
        if(isset($filter->property_preference_2)){
            // $query->where()
        }
        if(isset($filter->property_preference_3)){
            // $query->where()
        }
        if(isset($filter->property_preference_4)){
            // $query->where()
        }
        if(isset($filter->property_preference_5)){
            // $query->where()
        }
        if(isset($filter->name)){
            // $query->where()
        }

        $count = $query->count();
        $response = $query->get();

        // $response->result = $query;
        return response()->json([
            'data' => [
                'status' => 'success',
                'count' => $count,
                'result' => $response,
            ]
        ], 200, [], JSON_NUMERIC_CHECK);


    }
}
