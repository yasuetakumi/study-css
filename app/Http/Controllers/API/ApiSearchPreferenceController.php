<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use Stripe\Customer;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\PropertyPreference;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\CustomerSearchPreference;
use App\Models\PropertyPublicationStatus;
use App\Models\CustomerSkeletonPreference;
use App\Models\WalkingDistanceFromStationOption;
use App\Http\Controllers\Frontend\PropertyController;

class ApiSearchPreferenceController extends Controller
{
    public function getSearchConditionMember($memberId)
    {
        // {
        //     "surfaceMin": "10坪",
        //     "面積下限": "33坪",
        //     "surfaceMax": "30坪",
        //     "面積上限": "99坪",
        //     "rentAmountMin": "10万円",
        //     "賃料下限": "100000万円",
        //     "rentAmountMax": "30万円",
        //     "賃料上限": "300000万円",
        //     "フリーワード": "locatiion", free text
        //     "徒歩": "10分以内", wallking distance
        //     "階数_地上": "1階, 2階 ", floor under
        //     "階数_地下": "1階, 2階 ", floor above
        //     "こだわり条件": "ロードサイド, 駐車場, 看板取り付け可  ", property_preference
        //     "飲食店の種類": "重飲食　一般飲食店すべて, 軽飲食　カフェ、喫茶など", property_types
        //     "スケルトン物件_居抜き物件": "居抜き物件", //skeleton
        //      city
        //     "市区町村": "札幌市, 函館市, 小樽市, 旭川市, 室蘭市, 釧路市, 帯広市, 北見市, 夕張市, 岩見沢市, 網走市, 留萌市, 苫小牧市, 稚内市, 美唄市, 芦別市, 江別市, 赤平市, 紋別市, 士別市, 名寄市, 三笠市, 根室市, 千歳市, 滝川市, 砂川市, 歌志内市, 深川市, 富良野市, 登別市, 恵庭市, 伊達市, 北広島市, 石狩市, 北斗市, 当別町, 新篠津村, 松前町, 福島町, 知内町, 木古内町, 七飯町, 鹿部町, 森町, 八雲町, 長万部町, 江差町, 上ノ国町, 厚沢部町, 乙部町, 奥尻町, 今金町, せたな町, 島牧村, 寿都町, 黒松内町, 蘭越町, ニセコ町, 真狩村, 留寿都村, 喜茂別町, 京極町, 倶知安町, 共和町, 岩内町, 泊村, 神恵内村, 積丹町, 古平町, 仁木町, 余市町, 赤井川村, 南幌町, 奈井江町, 上砂川町, 由仁町, 長沼町, 栗山町, 月形町, 浦臼町, 新十津川町, 妹背牛町, 秩父別町, 雨竜町, 北竜町, 沼田町, 鷹栖町, 東神楽町, 当麻町, 比布町, 愛別町, 上川町, 東川町, 美瑛町, 上富良野町, 中富良野町, 南富良野町, 占冠村, 和寒町, 剣淵町, 下川町, 美深町, 音威子府村, 中川町, 幌加内町, 増毛町, 小平町, 苫前町, 羽幌町, 初山別村, 遠別町, 天塩町, 猿払村, 浜頓別町, 中頓別町, 枝幸町, 豊富町, 礼文町, 利尻町, 利尻富士町, 幌延町, 美幌町, 津別町, 斜里町, 清里町, 小清水町, 訓子府町, 置戸町, 佐呂間町, 遠軽町, 湧別町, 滝上町, 興部町, 西興部村, 雄武町, 大空町, 豊浦町, 壮瞥町, 白老町, 厚真町, 洞爺湖町, 安平町, むかわ町, 日高町, 平取町, 新冠町, 浦河町, 様似町, えりも町, 新ひだか町, 音更町, 士幌町, 上士幌町, 鹿追町, 新得町, 清水町, 芽室町, 中札内村, 更別村, 大樹町, 広尾町, 幕別町, 池田町, 豊頃町, 本別町, 足寄町, 陸別町, 浦幌町, 釧路町, 厚岸町, 浜中町, 標茶町, 弟子屈町, 鶴居村, 白糠町, 別海町, 中標津町, 標津町, 羅臼町",
        //     "created_at": "2022/10/04 14:13:22",
        //     "number_of_match_property": 0,
        //     "url": "http://localhost:8000/result?from_prefecture=true&surface_min=10&surface_max=30&rent_amount_min=10&rent_amount_max=30&name=locatiion&walking_distance=4&floor_under=1%2C2&floor_above=1%2C2&property_preference=1%2C2%2C3&property_type=1%2C2&skeleton=1&city=11002%2C12025%2C12033%2C12041%2C12050%2C12068%2C12076%2C12084%2C12092%2C12106%2C12114%2C12122%2C12131%2C12149%2C12157%2C12165%2C12173%2C12181%2C12190%2C12203%2C12211%2C12220%2C12238%2C12246%2C12254%2C12262%2C12271%2C12289%2C12297%2C12301%2C12319%2C12335%2C12343%2C12351%2C12360%2C13030%2C13048%2C13315%2C13323%2C13331%2C13340%2C13374%2C13439%2C13455%2C13463%2C13471%2C13617%2C13625%2C13633%2C13641%2C13676%2C13706%2C13714%2C13919%2C13927%2C13935%2C13943%2C13951%2C13960%2C13978%2C13986%2C13994%2C14001%2C14010%2C14028%2C14036%2C14044%2C14052%2C14061%2C14079%2C14087%2C14095%2C14231%2C14249%2C14257%2C14273%2C14281%2C14290%2C14303%2C14311%2C14320%2C14338%2C14346%2C14362%2C14371%2C14389%2C14524%2C14532%2C14541%2C14559%2C14567%2C14575%2C14583%2C14591%2C14605%2C14613%2C14621%2C14630%2C14648%2C14656%2C14681%2C14699%2C14702%2C14711%2C14729%2C14818%2C14826%2C14834%2C14842%2C14851%2C14869%2C14877%2C15113%2C15121%2C15130%2C15148%2C15164%2C15172%2C15181%2C15199%2C15202%2C15431%2C15440%2C15458%2C15466%2C15474%2C15491%2C15504%2C15521%2C15555%2C15598%2C15601%2C15610%2C15628%2C15636%2C15644%2C15717%2C15750%2C15784%2C15814%2C15849%2C15857%2C15865%2C16012%2C16021%2C16047%2C16071%2C16080%2C16098%2C16101%2C16314%2C16322%2C16331%2C16349%2C16357%2C16365%2C16373%2C16381%2C16390%2C16411%2C16420%2C16438%2C16446%2C16454%2C16462%2C16471%2C16489%2C16497%2C16616%2C16624%2C16632%2C16641%2C16659%2C16675%2C16683%2C16918%2C16926%2C16934%2C16942"
        //   }
        $response = [];
        $with = [
            'customer_search_preference_cities',
            'customer_search_preference_stations',
            'customer_search_preferences_floor_aboves',
            'customer_search_preferences_floor_unders',
            'customer_search_preferences_property_preferences',
            'customer_search_preferences_property_types',
            'customer_search_preference_cuisines',
        ];
        $searchCondition = CustomerSearchPreference::with($with)->where('member_id', $memberId)->get();

        foreach($searchCondition as $search){
            // this for response to view Search Condition Modal
            $object = new \stdClass();
            // this is for getting URL
            $queryString = [];

            $object->id = $search->id;

            // surface min
            if($search->surface_min){
                $object->surfaceMin = $search->surface_min . '坪';
                $queryString['surface_min'] = $search->surface_min;
                // $object->面積下限 = $search->surface_min . '坪';
            }

            // surface max
            if($search->surface_max){
                $object->surfaceMax = $search->surface_max . '坪';
                $queryString['surface_max'] = $search->surface_max;
                // $object->面積上限 = $search->surface_max;
            }

            // rent amount min
            if($search->rent_amount_min){
                $object->rentAmountMin = toMan( $search->rent_amount_min, true);
                $queryString['rent_amount_min'] = toMan( $search->rent_amount_min);
                // $object->賃料下限 = $search->rent_amount_min;
            }

            // rent amount max
            if($search->rent_amount_max){
                $object->rentAmountMax = toMan($search->rent_amount_max, true);
                $queryString['rent_amount_max'] = toMan($search->rent_amount_max);
                // $object->賃料上限 = $search->rent_amount_max;
            }

            // walking distance
            if($search->walking_distance){
                $getWalkingDistance = WalkingDistanceFromStationOption::find($search->walking_distance);
                if($getWalkingDistance){
                    $object->徒歩 = $getWalkingDistance->label_jp;
                    $queryString['walking_distance'] = $getWalkingDistance->id;
                }
            }

            // skeleton
            if($search->skeleton_id){
                $getSkeleton = CustomerSkeletonPreference::find($search->skeleton_id);
                if($getSkeleton){
                    $object->スケルトン物件_居抜き物件 = $getSkeleton->label_jp;
                    if($getSkeleton->id == CustomerSkeletonPreference::SKELETON){
                        $queryString['skeleton'] = 1;
                    }
                    else if($getSkeleton->id == CustomerSkeletonPreference::FURNISHED){
                        $queryString['furnished'] = 1;
                    }
                    else if($getSkeleton->id == CustomerSkeletonPreference::FURNISHED_AND_SKELETON){
                        $queryString['furnished'] = 1;
                        $queryString['skeleton'] = 1;
                    }
                }
            }

            // name
            if($search->freetext){
                $object->name = $search->freetext;
                $queryString['name'] = $search->freetext;
            }

            // comment
            if($search->comment){
                $object->comment = $search->comment;
            }

            // floor above
            if(count($search->customer_search_preferences_floor_aboves) > 0){
                $floorAbove = [];
                foreach($search->customer_search_preferences_floor_aboves as $floorAboveItem){
                    $floorAbove[] = $floorAboveItem->floor_above->label_jp;
                }
                $object->階数_地下 = implode(',', $floorAbove);
                $queryString['floor_above'] = implode(',', array_column($search->customer_search_preferences_floor_aboves->toArray(), 'floor_above_id'));
            }

            // floor under
            if(count($search->customer_search_preferences_floor_unders) > 0){
                $floorUnder = [];
                foreach($search->customer_search_preferences_floor_unders as $floorUnderItem){
                    $floorUnder[] = $floorUnderItem->floor_under->label_jp;
                }
                $object->階数_地上 = implode(',', $floorUnder);
                $queryString['floor_under'] = implode(',', array_column($search->customer_search_preferences_floor_unders->toArray(), 'floor_under_id'));
            }

            // property preference
            if(count($search->customer_search_preferences_property_preferences) > 0){
                $propertyPreference = [];
                foreach($search->customer_search_preferences_property_preferences as $propertyPreferenceItem){
                    $propertyPreference[] = $propertyPreferenceItem->property_preference->label_jp;
                }
                $object->こだわり条件 = implode(',', $propertyPreference);
                $queryString['property_preference'] = implode(',', array_column($search->customer_search_preferences_property_preferences->toArray(), 'property_preference_id'));
            }

            // property type
            if(count($search->customer_search_preferences_property_types) > 0){
                $propertyType = [];
                foreach($search->customer_search_preferences_property_types as $propertyTypeItem){
                    $propertyType[] = $propertyTypeItem->property_type->label_jp;
                }
                $object->飲食店の種類 = implode(',', $propertyType);
                $queryString['property_type'] = implode(',', array_column($search->customer_search_preferences_property_types->toArray(), 'property_type_id'));
            }

            // city
            if(count($search->customer_search_preference_cities) > 0){
                $city = [];
                foreach($search->customer_search_preference_cities as $cityItem){
                    $city[] = $cityItem->city->display_name;
                }
                $object->市区町村 = implode(',', $city);
                $queryString['city'] = implode(',', array_column($search->customer_search_preference_cities->toArray(), 'city_id'));
            }

            // station
            if(count($search->customer_search_preference_stations) > 0){
                $station = [];
                foreach($search->customer_search_preference_stations as $stationItem){
                    $station[] = $stationItem->station->display_name;
                }
                $object->駅 = implode(',', $station);
                $queryString['station'] = implode(',', array_column($search->customer_search_preference_stations->toArray(), 'station_id'));
            }


            // created at
            if($search->created_at){
                $object->created_at = $search->created_at;
            }

            $object->number_of_match_property = $this->getCountProperty($queryString)->getData()->count;

            // url
            $object->url = route('property.index', $queryString);

            $response[] = $object;
        }
        return response()->json($response);
    }


    public function storeComment(Request $request)
    {
        $search = CustomerSearchPreference::find($request->id);
        if($search){
            $search->comment = $request->comment;
            $search->save();
            return response()->json(['status' => true]);
        }
        return response()->json(['status' => false], 400);
    }

    public function deleteSearchConditionMember(Request $request)
    {
        $search = CustomerSearchPreference::find($request->id);
        if($search){
            $search->delete();
            return response()->json(['status' => true]);
        }
        return response()->json(['status' => false], 400);
    }

    public function getCountProperty($filter)
    {
        // convert array to object
        $filter = (object) $filter;

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

        if(Auth::check() || Auth::guard('user')->check()) {
            $query->published();
        } else {
            $query->publishedOnly();
        }

        // Filter city
        if(!empty($filter->city)){
            $arrCity = $filter->city;
            // check if request is not array, then convert to array
            if(!is_array($filter->city)){
                $arrCity = explode(",", $filter->city);
            }
            foreach($arrCity as $value){
                array_push($selectedCities, (int) $value);
            }
            $query->whereIn('city_id', $selectedCities);
        }

        // Filter station
        if(!empty($filter->station)){
            $arrStations = $filter->station;
            // check if request is not array, then convert to array
            if(!is_array($filter->station)){
                $arrStations = explode(",", $filter->station);
            }
            foreach($arrStations as $value){
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
            $arrUnders = $filter->floor_under;
            // check if request is not array, then convert to array
            if(!is_array($filter->floor_under)){
                $arrUnders = explode(",", $filter->floor_under);
            }
            foreach($arrUnders as $value){
                array_push($selectedUnderground, (int) $value);
            }
            $query->whereIn('number_of_floors_under_ground', $selectedUnderground);
        }

        // Filter floor above
        if(isset($filter->floor_above)){
            $arrAboves = $filter->floor_above;
            // check if request is not array, then convert to array
            if(!is_array($filter->floor_above)){
                $arrAboves = explode(",", $filter->floor_above);
            }
            foreach($arrAboves as $value){
                array_push($selectedAboveground, (int) $value);
            }
            $query->whereIn('number_of_floors_above_ground', $selectedAboveground);
        }

        // Filter cuisine
        if(isset($filter->cuisine)){
            $arrCuisines = $filter->cuisine;
            // check if request is not array, then convert to array
            if(!is_array($filter->cuisine)){
                $arrCuisines = explode(",", $filter->cuisine);
            }
            foreach($arrCuisines as $value){
                array_push($selectedCuisines, (int) $value);
            }
            $query->whereIn('cuisine_id', $selectedCuisines);
        }

        // Filter walking distance
        if(!empty($filter->walking_distance)){
            $walkingDistance = WalkingDistanceFromStationOption::find((int) $filter->walking_distance);
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
            $arrTypes = $filter->property_type;
            // check if request is not array, then convert to array
            if(!is_array($filter->property_type)){
                $arrTypes = explode(",", $filter->property_type);
            }
            foreach($arrTypes as $value){
                array_push($selectedPropertyType, (int) $value);
            }
            $query->whereIn('property_type_id', $selectedPropertyType);
        }

        // Filter property preference
        if(isset($filter->property_preference)){
            // now - 48 hour
            $now = Carbon::now();
            $now->subHours(48);

            $arrPreferences = $filter->property_preference;
            // check if request is not array, then convert to array
            if(!is_array($filter->property_preference)){
                $arrPreferences = explode(",", $filter->property_preference);
            }
            foreach($arrPreferences as $value){
                array_push($selectedPropertyPreference, (int) $value);
            }
            if(in_array(PropertyPreference::LATEST, $selectedPropertyPreference)){
                $query->whereHas('properties_property_preferences', function($q) use($selectedPropertyPreference) {
                    $excludeLatest = array_diff($selectedPropertyPreference, [PropertyPreference::LATEST]);
                    $q->whereIn('property_preferences_id', $excludeLatest);
                })->orWhere('created_at', '>=', $now);

            } else {
                $query->whereHas('properties_property_preferences', function($q) use($selectedPropertyPreference) {
                    $q->whereIn('property_preferences_id', $selectedPropertyPreference);
                });
            }

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


        // Response data
        return response()->json([
            'count' => $count,
        ]);
    }

}
