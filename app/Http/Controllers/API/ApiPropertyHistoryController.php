<?php

namespace App\Http\Controllers\API;

use App\Models\Member;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ApiPropertyHistoryController extends Controller
{
    public function getPropertyHistoryOrFavorite(Request $request)
    {
        $property_id = $request->all();
        if(!empty($property_id)){
            $data = Property::with(['city','cuisine','property_stations.station.station_line', 'property_stations' => function($q){
                $q->orderBy('distance_from_station', 'ASC');
            }])
            ->published()
            ->whereIn('id', $property_id)
            ->orderByRaw('FIELD (id, ' . implode(', ', array_filter($property_id)) . ') DESC')
            ->get();

            return response()->json($data);
        }

    }

    public function clearPropertyHistoryMember(Request $request)
    {
        $member = Member::find($request->member_id);
        $member->member_viewed_properties()->delete();
        return response()->json(['message' => 'success']);
    }
}
