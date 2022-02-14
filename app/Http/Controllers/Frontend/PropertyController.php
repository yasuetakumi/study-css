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
        $queryString = $request->all();
        //return $queryString;
        $withQuery = array();
        if(!empty($queryString['surface_min'])){
            $withQuery['surface_min'] = $queryString['surface_min'];
        }
        if(!empty($queryString['surface_max'])){
            $withQuery['surface_max'] = $queryString['surface_max'];
        }
        if(!empty($queryString['rent_amount_min'])){
            $withQuery['rent_amount_min'] = $queryString['rent_amount_min'];
        }
        if(!empty($queryString['rent_amount_max'])){
            $withQuery['rent_amount_max'] = $queryString['rent_amount_max'];
        }
        if(!empty($queryString['transfer_price_min'])){
            $withQuery['transfer_price_min'] = $queryString['transfer_price_min'];
        }
        if(!empty($queryString['transfer_price_max'])){
            $withQuery['transfer_price_max'] = $queryString['transfer_price_max'];
        }
        if(isset($queryString['name'])){
            $withQuery['name'] = $queryString['name'];
        }
        if(!empty($queryString['walking_distance'])){
            $withQuery['walking_distance'] = $queryString['walking_distance'];
        }
        if(isset($queryString['floor_under'])){
            $stringFloorUnder = implode(",", $queryString['floor_under']);
            $withQuery['underground'] = $stringFloorUnder;
        }
        if(isset($queryString['floor_above'])){
            $stringFloorAbove = implode(",", $queryString['floor_above']);
            $withQuery['aboveground'] = $stringFloorAbove;
        }
        if(isset($queryString['property_preference'])){
            $stringPropertyPref = implode(",", $queryString['property_preference']);
            $withQuery['preference'] = $stringPropertyPref;
        }
        if(isset($queryString['property_type'])){
            $stringPropertyType = implode(",", $queryString['property_type']);
            $withQuery['type'] = $stringPropertyType;
        }
        if(isset($queryString['skeleton'])){
            $withQuery['skeleton'] = true;
        }
        if(isset($queryString['furnished'])){
            $withQuery['furnished'] = true;
        }
        if(isset($queryString['cuisine'])){
            $stringCuisine = implode(",", $queryString['cuisine']);
            $withQuery['cuisine'] = $stringCuisine;
        }
        if(!empty($queryString['city'])){
            $stringCity= implode(",", $queryString['city']);
            $withQuery['city'] = $stringCity;
        }
        if(!empty($queryString['station'])){
            $stringStation= implode(",", $queryString['station']);
            $withQuery['station'] = $stringStation;
        }

        // return $withQuery;

        return redirect()->route('property.index', $withQuery);
    }
}
