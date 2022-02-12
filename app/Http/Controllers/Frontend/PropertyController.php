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
        // if(isset($request->city)){
        //     $data['city_id'] = $request->city;
        // }
        // if(isset($request->station)){
        //     $data['station_id'] = $request->station;
        // }
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
            $undergroundByFilter = NumberOfFloorsUnderGround::whereIn('id', $queryString['floor_under'])->get();
            foreach($undergroundByFilter as $ud){
                $getFirstWord = strtolower(explode(' ', trim($ud->label_en))[0]);
                $withQuery[$getFirstWord] = 1;
            }
        }
        if(isset($queryString['floor_above'])){
            $abovegroundByFilter = NumberOfFloorsAboveGround::whereIn('id', $queryString['floor_above'])->get();
            foreach($abovegroundByFilter as $ab){
                $getFirstWord = strtolower(explode(' ', trim($ab->label_en))[0]);
                $withQuery[$getFirstWord] = 1;
            }
        }
        if(isset($queryString['property_preference'])){
            $propertyPreferenceByFilter = PropertyPreference::whereIn('id', $queryString['property_preference'])->get();
            foreach($propertyPreferenceByFilter as $pp){
                $getFirstWord = strtolower(explode(' ', trim($pp->label_en))[0]);
                $withQuery[$getFirstWord] = 1;
            }
        }
        if(isset($queryString['property_type'])){
            $propertyTypeByFilter = PropertyType::whereIn('id', $queryString['property_type'])->get();
            foreach($propertyTypeByFilter as $pt){
                $getFirstWord = strtolower(explode(' ', trim($pt->label_en))[0]);
                $withQuery[$getFirstWord] = 1;
            }
        }
        if(isset($queryString['skeleton'])){
            $withQuery['skeleton'] = true;
        }
        if(isset($queryString['furnished'])){
            $withQuery['furnished'] = true;
        }
        if(isset($queryString['cuisine'])){
            $cuisineByFilter = Cuisine::whereIn('id', $queryString['cuisine'])->get();
            foreach($cuisineByFilter as $cu){
                $getFirstWord = strtolower(explode(' ', trim($cu->label_en))[0]);
                $withQuery[$getFirstWord] = 1;
            }
        }

        //return $withQuery;

        return redirect()->route('property.index', $withQuery);
    }
}
