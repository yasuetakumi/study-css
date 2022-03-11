<?php
// -----------------------------------------------------------------------------
namespace App\Http\Controllers\Frontend;
// -----------------------------------------------------------------------------

// -----------------------------------------------------------------------------
use App\Http\Controllers\API\ApiPropertyController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
// -----------------------------------------------------------------------------
use App\Models\City;
use App\Models\Station;
use App\Models\Cuisine;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\RentPriceOption;
use App\Models\SurfaceAreaOption;
use App\Models\PropertyPreference;
use App\Models\TransferPriceOption;
use App\Models\NumberOfFloorsAboveGround;
use App\Models\NumberOfFloorsUnderGround;
use App\Models\WalkingDistanceFromStationOption;
// -----------------------------------------------------------------------------

// -----------------------------------------------------------------------------
class PropertyController extends Controller {
    // -------------------------------------------------------------------------
    public function index(Request $request) {
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

        $searchCondition = [];
        if ($request->session()->has('searchCondition')) {
            $searchCondition = session()->get('searchCondition');
        }
        $data['searchCondition'] = $searchCondition;

        return view('frontend.property.index', $data);
    }
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    public function filter(Request $request, $toJson = false) {
        // Filter data
        $queryString = $request->all();

        // Default data
        $withQuery = array();
        $filter = collect([]);

        // Set route parameter
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

        // Compiled filter data need filter url to be store on local storage
        // If this function was called from compile filter function
        // Return filter url with query string
        if ($toJson) return response()->json(route('property.index', $withQuery));

        // Compile the filter for search history
        $filter = $this->compileFilter($request);

        // Redirect with param
        // If this function was called by clicking search button on C2
        if (array_key_exists('search_button', $queryString)) {
            $data = collect([
                'searchCondition' => $filter,
                'searchButtonClicked' => true,
            ]);
            return redirect()->route('property.index', $withQuery)->with($data->toArray());
        }
        // This function was called from C5
        else return redirect()->route('property.index', $withQuery);

    }
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Compile filter data
    // -------------------------------------------------------------------------
    public function compileFilter(Request $request) {
        // FIlter and result data
        $filter = $request->all();
        $result = [];

        // Compile filter data
        if(!empty($filter['surface_min'])){
            $surfaceMin = fromTsubo($filter['surface_min']);
            $result['面積下限'] = $surfaceMin;
        }
        if(!empty($filter['surface_max'])){
            $surfaceMax = fromTsubo($filter['surface_max']);
            $result['面積下限'] = $surfaceMax;
        }
        if(!empty($filter['rent_amount_min'])){
            $rentAmountMin = fromMan($filter['rent_amount_min']);
            $result['賃料下限'] = $rentAmountMin;
        }
        if(!empty($filter['rent_amount_max'])){
            $rentAmountMax = fromMan($filter['rent_amount_max']);
            $result['賃料上限'] = $rentAmountMax;
        }
        if(!empty($filter['transfer_price_min'])){
            $transferPriceMin = fromMan($filter['transfer_price_min']);
            $result['譲渡額下限'] = $transferPriceMin;
        }
        if(!empty($filter['transfer_price_max'])){
            $transferPriceMax = fromMan($filter['transfer_price_max']);
            $result['譲渡額上限'] = $transferPriceMax;
        }
        if(isset($filter['name'])){
            $result['フリーワード'] = $filter['name'];
        }
        if(!empty($filter['walking_distance'])){
            $walkingDistance = WalkingDistanceFromStationOption::find($filter['walking_distance']);
            $result['徒歩'] = $walkingDistance->label_jp;
        }
        if(isset($filter['floor_under'])){
            $underGrounds = NumberOfFloorsUnderGround::find($filter['floor_under'])->pluck('label_jp')->join(', ');
            $result['階数(地下)'] = $underGrounds;
        }
        if(isset($filter['floor_above'])){
            $aboveGrounds = NumberOfFloorsAboveGround::find($filter['floor_above'])->pluck('label_jp')->join(', ');
            $result['階数(地下)'] = $aboveGrounds;
        }
        if(isset($filter['property_preference'])){
            $preferences = PropertyPreference::find($filter['property_preference'])->pluck('label_jp')->join(', ');
            $result['こだわり条件'] = $preferences;
        }
        if(isset($filter['property_type'])){
            $types = PropertyType::find($filter['property_type'])->pluck('label_jp')->join(', ');
            $result['飲食店の種類'] = $types;
        }

        $skeletonOrFurnished = collect();
        if(isset($filter['skeleton'])){
            $skeletonOrFurnished->push(Property::SKELETON_JP_LABEL);
        }
        if(isset($filter['furnished'])){
            $skeletonOrFurnished->push(Property::FURNISHED_JP_LABEL);
        }
        if (count($skeletonOrFurnished)) {
            $result['スケルトン物件・居抜き物件'] = $skeletonOrFurnished->join(', ');
        }

        if(isset($filter['cuisine'])){
            $cuisines = Cuisine::find($filter['cuisine'])->pluck('label_jp')->join(', ');
            $result['料理'] = $cuisines;
        }
        if(!empty($filter['city'])){
            $citiesName = City::find($filter['city'])->pluck('display_name')->join(', ');
            $result['市'] = $citiesName;
        }
        if(!empty($filter['station'])){
            $stationsName = Station::find($filter['station'])->pluck('display_name')->join(', ');
            $result['駅'] = $stationsName;
        }

        // Created at
        $result['created_at'] = Carbon::now()->format('Y/m/d h:i:s');

        // Get number of match property related to the filter
        $request->merge(['count' => true]);
        $response = app(ApiPropertyController::class)->getPropertyByFilter($request);
        $result['number_of_match_property'] = $response->getData()->data->count ?? 0;

        // Get filter url with query string
        $response = $this->filter($request, true);
        $result['url'] = $response->getData();

        // Return result
        // This function was called from filter function (search button on C2 was clicked)
        if (!isset($request['toJson'])) return $result;
        // This function was called from axios (current condition on form filter)
        else return response()->json($result);
    }
    // -------------------------------------------------------------------------
}
// -----------------------------------------------------------------------------
