<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cuisine;
use App\Models\Property;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use App\Models\RentPriceOption;
use App\Models\SurfaceAreaOption;
use App\Models\PropertyPreference;
use App\Models\TransferPriceOption;
use App\Http\Controllers\Controller;
use App\Models\NumberOfFloorsAboveGround;
use App\Models\NumberOfFloorsUnderGround;
use App\Models\WalkingDistanceFromStationOption;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        if(isset($request->city)){
            $data['city_id'] = $request->city;
        }
        if(isset($request->station)){
            $data['station_id'] = $request->station;
        }
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
        $data['page_title'] = __('Property List');
        return view('frontend.property.index', $data);
    }

    public function filter(Request $request)
    {
        $filter = (object) $request->all();
        $response = (object) array('status' => 'success');
        $response->result = $filter;
        return response()->json($response, 200);
    }
}
