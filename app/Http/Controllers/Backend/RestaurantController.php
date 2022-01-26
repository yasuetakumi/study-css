<?php

namespace App\Http\Controllers\Backend;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\RentPriceOption;
use App\Models\SurfaceAreaOption;
use App\Http\Controllers\Controller;
use App\Models\PropertyPreference;
use App\Models\PropertyType;
use App\Models\WalkingDistanceFromStationOption;

class RestaurantController extends Controller
{
    public function index()
    {
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
        $data['page_title'] = __('Restaurant List');
        return view('frontend.restaurant.index', $data);
    }

    public function filter(Request $request)
    {
        $filter = (object) $request->all();
        $response = (object) array('status' => 'success');
        $response->result = $filter;
        return response()->json($response, 200);
    }
}
