<?php

namespace App\Http\Controllers\API;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiPropertyHistoryController extends Controller
{
    public function getPropertyHistoryOrFavorite(Request $request)
    {
        $property_id = $request->all();
        if(!empty($property_id)){
            $data = Property::with(['city','cuisine','property_stations.station.station_line', 'property_stations' => function($q){
                $q->orderBy('distance_from_station', 'ASC');
            }])
            ->whereIn('id', $property_id)
            ->orderByRaw('FIELD (id, ' . implode(', ', $property_id) . ') DESC')
            ->get();

            return response()->json($data);
        }

    }
}
