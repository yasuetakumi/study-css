<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Station;
use Illuminate\Http\Request;

class ApiStationController extends Controller
{
    public function getStationByStationLine($stationLine)
    {
        $stations = Station::where('station_line_id', $stationLine)->get();

        return response()->json($stations);
    }
}
