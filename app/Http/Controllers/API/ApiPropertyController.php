<?php
// -----------------------------------------------------------------------------
namespace App\Http\Controllers\API;
// -----------------------------------------------------------------------------

// -----------------------------------------------------------------------------
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
// -----------------------------------------------------------------------------
use App\Models\Property;
use App\Models\PropertyPublicationStatus;
use App\Models\WalkingDistanceFromStationOption;
// -----------------------------------------------------------------------------

// -----------------------------------------------------------------------------
class ApiPropertyController extends Controller
{
    // -------------------------------------------------------------------------
    // Filter property
    // -------------------------------------------------------------------------
    public function getPropertyByFilter(Request $request) {
        // Filter data
        $filter = (object) $request->all();
        // return response()->json($filter);
        // Default value
        $selectedUnderground = array();
        $selectedAboveground = array();
        $selectedPropertyType = array();
        $selectedPropertyPreference = array();
        $selectedCuisines = array();
        $selectedCities = array();
        $selectedStations = array();

        // Base query
        $query = Property::with(['properties_property_preferences', 'cuisine', 'city', 'prefecture', 'property_stations.station.station_line', 'property_stations' => function($query){
            $query->orderBy('distance_from_station', 'ASC');
        }]);

        // Filter city
        if(!empty($filter->city)){
            foreach($filter->city as $value){
                array_push($selectedCities, (int) $value);
            }
            $query->whereIn('city_id', $selectedCities);
        }

        // Filter station
        if(!empty($filter->station)){
            foreach($filter->station as $value){
                array_push($selectedStations, (int)$value);
            }
            $query->whereHas('property_stations', function($q) use ($selectedStations){
                $q->whereIn('station_id', $selectedStations);
            });
        }

        // Filter surface
        $maxSurface = !empty($filter->surface_max) ? fromTsubo($filter->surface_max) : '';
        $minSurface = !empty($filter->surface_min) ? fromTsubo($filter->surface_min) : '';
        $columnSurface = 'surface_area';
        $query->RangeArea((int)$minSurface, (int)$maxSurface, $columnSurface);

        // Filter rent amount
        $maxRentAmount = !empty($filter->rent_amount_max) ? fromMan($filter->rent_amount_max) : '';
        $minRentAmount = !empty($filter->rent_amount_min) ? fromMan($filter->rent_amount_min) : '';
        $columnRentAmount = 'rent_amount';
        $query->RangeArea((int)$minRentAmount, (int)$maxRentAmount, $columnRentAmount);

        // Filter transfer price
        $maxTransferPrice = !empty($filter->transfer_price_max) ? $filter->transfer_price_max : '';
        $minTransferPrice = !empty($filter->transfer_price_min) ? $filter->transfer_price_min : '';
        $columnTransferPrice = 'interior_transfer_price';
        $query->RangeArea((int)$minTransferPrice, (int)$maxTransferPrice, $columnTransferPrice);

        // Filter is skeleton or is furnished
        if(isset($filter->skeleton) && !isset($filter->furnished)){
            $query->where('is_skeleton', (int)$filter->skeleton);
        }
        if(isset($filter->furnished)&& !isset($filter->skeleton)){
            $query->where('is_skeleton', (int)$filter->furnished);
        }

        // Filter floor under
        if(isset($filter->floor_under)){
            foreach($filter->floor_under as $key => $value){
                array_push($selectedUnderground, $filter->floor_under[$key]);
            }
            $query->whereIn('number_of_floors_under_ground', $selectedUnderground);
        }

        // Filter floor above
        if(isset($filter->floor_above)){
            foreach($filter->floor_above as $key => $value){
                array_push($selectedAboveground, $filter->floor_above[$key]);
            }
            $query->whereIn('number_of_floors_above_ground', $selectedAboveground);
        }

        // Filter cuisine
        if(isset($filter->cuisine)){
            foreach($filter->cuisine as $key => $value){
                array_push($selectedCuisines, $filter->cuisine[$key]);
            }
            $query->whereIn('cuisine_id', $selectedCuisines);
        }

        // Filter walking distance
        if(!empty($filter->walking_distance)){
            $walkingDistance = WalkingDistanceFromStationOption::find($filter->walking_distance);
            if($walkingDistance->id == WalkingDistanceFromStationOption::ID_16MINUTEORMORE){
                $query->has('property_stations')->whereDoesntHave('property_stations', function ($q) {
                    $q->whereIn('distance_from_station', [1,2,3,4,5]);
                });
            } else {
                $query->whereHas('property_stations', function($q) use($walkingDistance) {
                    $q->where('distance_from_station', '<=', $walkingDistance->id);
                });
            }
        }

        // Filter property type
        if(isset($filter->property_type)){
            foreach($filter->property_type as $key => $value){
                array_push($selectedPropertyType, $filter->property_type[$key]);
            }
            $query->whereIn('property_type_id', $selectedPropertyType);
        }

        // Filter property preference
        if(isset($filter->property_preference)){
            foreach($filter->property_preference as $key => $value){
                array_push($selectedPropertyPreference, $filter->property_preference[$key]);
            }
            $query->whereHas('properties_property_preferences', function($q) use($selectedPropertyPreference) {
                $q->whereIn('property_preferences_id', $selectedPropertyPreference);
            });
        }
        // return $query->get();

        // Filter name
        if(!empty($filter->name) ){
            $query->where(function($query) use($filter){
                $query->where('location', 'like', '%' . $filter->name . '%')
                  ->orWhere('repayment', 'like', '%' . $filter->name . '%')
                  ->orWhere('renewal_fee', 'like', '%' . $filter->name . '%')
                  ->orWhere('comment', 'like', '%' . $filter->name . '%')
                  ->orWhereHas('city', function($q) use ($filter){
                    $q->where('display_name', 'like', '%' . $filter->name . '%');
                  })
                  ->orWhereHas('prefecture', function($q) use ($filter){
                    $q->where('display_name', 'like', '%' . $filter->name . '%');
                  })
                  ->orWhereHas('property_stations.station', function($q) use ($filter){
                        $q->where('display_name', 'like', '%' . $filter->name . '%');
                  });
            });
        }

        // Filter date (for email)
        if(isset($filter->contain_date)){
            $yesterday = Carbon::now()->addDay('-1')->format('Y/m/d');
            $today = Carbon::now()->format('Y/m/d');
            $query->where('publication_status_id', PropertyPublicationStatus::ID_PUBLISHED)->whereDate('publication_date', '>=',$yesterday)->whereDate('publication_date', '<=', $today);
        }

        // Get property
        $count = $query->count();
        $response = $query->get();

        // If there is no city and station provided and it comes from C5 Page
        // Set property to empty collection
        if (empty($filter->city) && empty($filter->station) && !empty($filter->from_prefecture)) {
            $count = 0;
            $response = collect();
        }

        // Response data
        if(isset($filter->count)){
            return response()->json([
                'data' => [
                    'status' => 'success',
                    'count' => $count,
                ]
            ], 200, [], JSON_NUMERIC_CHECK);
        }
        else{
            return response()->json([
                'data' => [
                    'status' => 'success',
                    'result' => $response,
                ]
            ], 200, [], JSON_NUMERIC_CHECK);
        }

    }
    // -------------------------------------------------------------------------
}
// -----------------------------------------------------------------------------
