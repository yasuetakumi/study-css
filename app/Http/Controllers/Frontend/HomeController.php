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

use App\Models\RentPriceOption;
use App\Models\SurfaceAreaOption;
use App\Models\PropertyType;
use App\Models\WalkingDistanceFromStationOption;
use App\Models\PropertyPreference;
use App\Models\NumberOfFloorsUnderGround;
use App\Models\NumberOfFloorsAboveGround;
use App\Models\Cuisine;
use App\Models\TransferPriceOption;

class HomeController extends Controller
{
    public function index(){
        $data['page_title'] = 'Home Real Estate Media';
        $data['prefectures'] = Prefecture::all();

        return view('frontend.index', $data);
    }

    public function prefecture($prefecture){
        // Page data
        $data['page_title'] = 'Prefecture ' . Str::ucfirst($prefecture);

        // Prefecture and property
        $data['prefecture'] = Prefecture::where('name', $prefecture)->first();
        $data['properties'] = Property::where('prefecture_id', $data['prefecture']->id)->get();

        // City belongs to prefecture, and count property belongs to city
        $data['cities'] = City::withCount('properties')->where('prefecture_id', $data['prefecture']->id)->get();

        // Station and station lines
        $stations = Station::where('prefecture_id', $data['prefecture']->id)->get();
        $station_lines = array();
        foreach($stations as $station){
            array_push($station_lines, $station->station_line_id);
        }
        $data['station_lines'] = StationsLine::whereIn('id', $station_lines)->get();
        $data['initial_station_line'] = $data['station_lines']->first();


        $data['rent_amounts'] = RentPriceOption::select('id', 'value', 'label_jp')->orderBy('id')->get();
        $data['surface_areas'] = SurfaceAreaOption::select('id', 'value', 'label_jp')->orderBy('id')->get();
        $skeleton = [
            [
                'value' => Property::SKELETON,
                'label_jp' => 'スケルトン物件',
            ],
            [
                'value' => Property::FURNISHED,
                'label_jp' => '居抜き物件',
            ],
        ];
        $data['is_skeletons'] = collect($skeleton)->all();
        $data['property_types'] = PropertyType::select('id', 'label_jp')->orderBy('id')->get();
        $data['walking_distances'] = WalkingDistanceFromStationOption::select('id', 'value', 'label_jp')->get();
        $data['property_preferences'] = PropertyPreference::select('id', 'label_jp')->orderBy('id')->get();
        $data['floor_undergrounds'] = NumberOfFloorsUnderGround::select('id', 'value', 'label_jp')->get();
        $data['floor_abovegrounds'] = NumberOfFloorsAboveGround::select('id', 'value', 'label_jp')->get();
        $data['cuisines'] = Cuisine::select('id', 'label_jp')->orderBy('id')->get();
        $data['transfer_price_options'] = TransferPriceOption::select('id', 'value', 'label_jp')->orderBy('id')->get();


        return view('frontend.prefecture.index', $data);
    }
}
