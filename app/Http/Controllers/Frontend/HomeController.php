<?php

namespace App\Http\Controllers\Frontend;

use App\Models\City;
use App\Models\Prefecture;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\Station;
use App\Models\StationsLine;

class HomeController extends Controller
{
    public function index(){
        $data['page_title'] = 'Home Real Estate Media';
        $data['prefectures'] = Prefecture::all();

        return view('frontend.index', $data);
    }

    public function prefecture($prefecture){
        $data['page_title'] = 'Prefecture ' . Str::ucfirst($prefecture);
        $data['prefecture'] = Prefecture::where('name', $prefecture)->first();
        $data['cities'] = City::where('prefecture_id', $data['prefecture']->id)->get();
        $stations = Station::where('prefecture_id', $data['prefecture']->id)->get();
        $station_lines = array();
        foreach($stations as $station){
            array_push($station_lines, $station->station_line_id);
        }
        $data['station_lines'] = StationsLine::whereIn('id', $station_lines)->get();
        $data['initial_station_line'] = $data['station_lines']->first();
        $data['properties'] = Property::where('prefecture_id', $data['prefecture']->id)->get();
        //return $data;
        return view('frontend.prefecture.index', $data);
    }
}
