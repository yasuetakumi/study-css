<?php

namespace App\Http\Controllers\API;

use App\Models\Station;
use App\Models\StationsLine;
use Illuminate\Http\Request;
use App\Traits\CommonToolsTraits;
use App\Http\Controllers\Controller;

class ApiStationController extends Controller
{
    use CommonToolsTraits;

    public function getStationByStationLine($stationLine, $prefectureId)
    {
        $stations = Station::where('station_line_id', $stationLine)->where('prefecture_id', $prefectureId)->withCount('properties')->get();

        return response()->json($stations);
    }
    public function getStationByPrefecture($id)
    {
        $stations = Station::where('prefecture_id', $id)->withCount('properties')->get();

        return response()->json($stations);
    }

    public function getStationLineByPrefecture($prefectureId)
    {
        $stations = Station::where('prefecture_id', $prefectureId)->get();
        $arrStationLineIds = array();
        foreach($stations as $station){
            array_push($arrStationLineIds, $station->station_line_id);
        }
        $stationLines= StationsLine::whereIn('id', $arrStationLineIds)->get();

        return response()->json($stationLines);
    }

    public function select2StationLineByPrefecture($prefectureId)
    {
        $stationLines = collect(Station::with('station_line')->where('prefecture_id', $prefectureId)->get()->pluck('station_line.display_name', 'station_line.id'));

        $initSelect2 = $this->initSelect2Options($stationLines);

        return response()->json($initSelect2);
    }
}
