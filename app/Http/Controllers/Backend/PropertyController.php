<?php

namespace App\Http\Controllers\Backend;

use stdClass;
use Carbon\Carbon;
use App\Models\Plan;
use App\Models\User;
use App\Models\Company;
use App\Models\Cuisine;
use App\Models\Property;
use App\Models\Structure;
use App\Models\Prefecture;
use App\Helpers\FileHelper;
use App\Helpers\ImageHelper;
use App\Models\BusinessTerm;
use App\Models\PropertyPlan;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use App\Helpers\DatatablesHelper;
use App\Imports\PropertiesImport;
use App\Traits\CommonToolsTraits;
use App\Models\PropertiesStations;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\PropertyPublicationStatus;
use Illuminate\Support\Facades\Validator;
use App\Models\PropertyPublicationStatusPeriod;
use App\Models\WalkingDistanceFromStationOption;

class PropertyController extends Controller
{
    use CommonToolsTraits;

    protected function validator( array $data, $type ){
        return Validator::make($data, [
            'user_id'       => 'required',
            'postcode_id'   => 'required',
            'prefecture_id' => 'required',
            'city_id'       => 'required',
            'location'      => 'required',
            'surface_area'  => 'required',
            'rent_amount'   => 'required',
            'is_skeleton'   => 'required',
            'location'      => 'required',
            'plan_id_dc_1'  => isset($data['plan_id_dc_1']) ? 'required' : '',
            'plan_id_dc_2'  => isset($data['plan_id_dc_2']) ? 'required' : '',
            'plan_id_dc_3'  => isset($data['plan_id_dc_3']) ? 'required' : '',
            'plan_id_dc_4'  => isset($data['plan_id_dc_4']) ? 'required' : '',
            'thumbnail_image_main' => 'max:1024|mime_types:image/jpeg,image/png',
            'thumbnail_image_1' => 'max:1024|mime_types:image/jpeg,image/png',
            'thumbnail_image_2' => 'max:1024|mime_types:image/jpeg,image/png',
            'thumbnail_image_3' => 'max:1024|mime_types:image/jpeg,image/png',
            'thumbnail_image_4' => 'max:1024|mime_types:image/jpeg,image/png',
            'thumbnail_image_5' => 'max:1024|mime_types:image/jpeg,image/png',
            'thumbnail_image_6' => 'max:1024|mime_types:image/jpeg,image/png',
            'image_1' => 'max:1024|mime_types:image/jpeg,image/png',
            'image_2' => 'max:1024|mime_types:image/jpeg,image/png',
            'image_3' => 'max:1024|mime_types:image/jpeg,image/png',
            'image_4' => 'max:1024|mime_types:image/jpeg,image/png',
            'image_5' => 'max:1024|mime_types:image/jpeg,image/png',
            'image_6' => 'max:1024|mime_types:image/jpeg,image/png',
            'image_7' => 'max:1024|mime_types:image/jpeg,image/png',
            'image_8' => 'max:1024|mime_types:image/jpeg,image/png',
            'image_9' => 'max:1024|mime_types:image/jpeg,image/png',
            'image_10' => 'max:1024|mime_types:image/jpeg,image/png',
            'image_360_1' => 'max:1024|mime_types:image/jpeg,image/png',
            'image_360_2' => 'max:1024|mime_types:image/jpeg,image/png',
            'image_360_3' => 'max:1024|mime_types:image/jpeg,image/png',
            'image_360_4' => 'max:1024|mime_types:image/jpeg,image/png',
            'image_360_5' => 'max:1024|mime_types:image/jpeg,image/png',

        ], [
            'location.regex'        => 'Only Japanase Characther Allowed!',
            'location.alpha_dash'   => 'No space allowed!',
            'plan_id_dc_1.required' => 'Plan for Design Category 居酒屋 is Required',
            'plan_id_dc_2.required' => 'Plan for Design Category カフェ is Required',
            'plan_id_dc_3.required' => 'Plan for Design Category バー is Required',
            'plan_id_dc_4.required' => 'Plan for Design Category ラーメン is Required',
            'thumbnail_image_main.max' => __('validation.max.file', ['attribute' => __('label.thumbnail_image_main'), 'max' => 1024]),
            'thumbnail_image_1.max' => __('validation.max.file', ['attribute' => __('label.thumbnail_image') . '1', 'max' => 1024]),
            'thumbnail_image_2.max' => __('validation.max.file', ['attribute' => __('label.thumbnail_image') . '2', 'max' => 1024]),
            'thumbnail_image_3.max' => __('validation.max.file', ['attribute' => __('label.thumbnail_image') . '3', 'max' => 1024]),
            'thumbnail_image_4.max' => __('validation.max.file', ['attribute' => __('label.thumbnail_image') . '4', 'max' => 1024]),
            'thumbnail_image_5.max' => __('validation.max.file', ['attribute' => __('label.thumbnail_image') . '5', 'max' => 1024]),
            'thumbnail_image_6.max' => __('validation.max.file', ['attribute' => __('label.thumbnail_image') . '6', 'max' => 1024]),
            'image_1.max' => __('validation.max.file', ['attribute' => __('label.image') . '1', 'max' => 1024]),
            'image_2.max' => __('validation.max.file', ['attribute' => __('label.image') . '2', 'max' => 1024]),
            'image_3.max' => __('validation.max.file', ['attribute' => __('label.image') . '3', 'max' => 1024]),
            'image_4.max' => __('validation.max.file', ['attribute' => __('label.image') . '4', 'max' => 1024]),
            'image_5.max' => __('validation.max.file', ['attribute' => __('label.image') . '5', 'max' => 1024]),
            'image_6.max' => __('validation.max.file', ['attribute' => __('label.image') . '6', 'max' => 1024]),
            'image_7.max' => __('validation.max.file', ['attribute' => __('label.image') . '7', 'max' => 1024]),
            'image_8.max' => __('validation.max.file', ['attribute' => __('label.image') . '8', 'max' => 1024]),
            'image_9.max' => __('validation.max.file', ['attribute' => __('label.image') . '9', 'max' => 1024]),
            'image_10.max' => __('validation.max.file', ['attribute' => __('label.image') . '10', 'max' => 1024]),
            'image_360_1.max' => __('validation.max.file', ['attribute' => __('label.image_360') . '1', 'max' => 1024]),
            'image_360_2.max' => __('validation.max.file', ['attribute' => __('label.image_360') . '2', 'max' => 1024]),
            'image_360_3.max' => __('validation.max.file', ['attribute' => __('label.image_360') . '3', 'max' => 1024]),
            'image_360_4.max' => __('validation.max.file', ['attribute' => __('label.image_360') . '4', 'max' => 1024]),
            'image_360_5.max' => __('validation.max.file', ['attribute' => __('label.image_360') . '5', 'max' => 1024]),
        ]);
    }

    public function show($param)
    {

        if( $param == 'json' ){

            $model = Property::with(['user.company', 'postcode']);
            if(Auth::guard('user')->check()){
                $model = Property::with(['user', 'postcode']);
                $model->whereHas('user', function($q){
                    $q->where('belong_company_id', Auth::guard('user')->user()->belong_company_id);
                })->propertyCompany(); // only property is not deleted and not expired
            }
            return (new DatatablesHelper)->instance($model, true, true, null, null, null, false, true)
                                            ->filterColumn('user.display_name', function($query, $keyword){
                                                $query->whereHas('user', function($q) use ($keyword){
                                                    $q->where('display_name', 'like', '%'.$keyword.'%');
                                                });
                                            })
                                            ->filterColumn('postcode.postcode', function($query, $keyword){
                                                $query->whereHas('postcode', function($q) use ($keyword){
                                                    $q->where('postcode', 'like', '%'.$keyword.'%');
                                                });
                                            })
                                            ->filterColumn('user.company.id', function($query, $keyword){
                                                $query->whereHas('user', function($q) use ($keyword){
                                                    $q->whereHas('company', function($q) use ($keyword){
                                                        $q->where('id', 'like', '%'.$keyword.'%');
                                                    });
                                                });
                                            })
                                            ->filterColumn('user.company.company_name', function($query, $keyword){
                                                $query->whereHas('user', function($q) use ($keyword){
                                                    $q->whereHas('company', function($q) use ($keyword){
                                                        $q->where('company_name', 'like', '%'.$keyword.'%');
                                                    });
                                                });
                                            })
                                            ->addColumn('prefecture_city_location', function(Property $property){
                                                $prefectureName = $property->prefecture ? $property->prefecture->display_name : null;
                                                $cityName = $property->city ? $property->city->display_name : null;
                                                if($prefectureName && $cityName){
                                                    return $prefectureName . ' ' . $cityName . ' ' . $property->location;
                                                } else if($prefectureName && !$cityName){
                                                    return $prefectureName . ' ' . $property->location;
                                                } else if(!$prefectureName && $cityName){
                                                    return $cityName . ' ' . $property->location;
                                                } else {
                                                    return $property->location;
                                                }
                                            })
                                            ->toJson();

        }
        abort(404);


    }

    public function index()
    {
        $data['page_title'] = __('label.property_list');
        // if(Auth::guard('user')->check()){
        //     $data['page_title'] = __('label.property') . __('label.company') . __('label.list');
        // }

        return view('backend.property.index', $data);
    }

    public function detail($id)
    {

    }

    public function create()
    {
        $data['item'] = new StdClass();
        $data['form_action'] = route('admin.property.store');
        $data['publication_statuses'] = PropertyPublicationStatus::ONLY_VISIBLE_ADMIN_FORM;
        if(Auth::guard('user')->check()){
            $data['form_action'] = route('company.property.store');
            $data['publication_statuses'] = PropertyPublicationStatus::ONLY_VISIBLE_COMPANY_FORM;
        }
        $data['property_related'] = '';
        $data['page_type'] = 'create';
        $data['property_types'] = PropertyType::pluck('label_jp', 'id')->all();
        $data['structures'] = Structure::pluck('label_jp', 'id')->all();
        $data['business_terms'] = BusinessTerm::pluck('label_jp', 'id')->all();
        $data['page_title'] = __('label.new_property_create');
        $data['is_skeleton'] = [Property::FURNISHED => __('label.furnished'), Property::SKELETON => __('label.skeleton')];
        $data['cuisines'] = Cuisine::pluck('label_jp', 'id')->all();

        // options for vue select 2 options
        $companies                     = collect(Company::pluck('company_name', 'id')->all());
        $data['companies_options']     = $this->initSelect2Options($companies);
        $categories =  [
            [
                'value' => Cuisine::IZAKAYA,
                'label_en' => 'Izakaya / Dining Bar',
                'label_jp' => '居酒屋・ダイニングバー',
            ],
            [
                'value' => Cuisine::CAFE,
                'label_en' => 'Cafe',
                'label_jp' => 'カフェ',
            ],
            [
                'value' => Cuisine::BAR,
                'label_en' => 'Bar',
                'label_jp' => 'バー',
            ],
            [
                'value' => Cuisine::RAMEN,
                'label_en' => 'Ramen',
                'label_jp' => 'ラーメン',
            ],

        ];
        $prefectures = collect(Prefecture::pluck('display_name', 'id')->all());
        $data['prefectures'] = $this->initSelect2Options($prefectures);
        $data['walking_distances'] = WalkingDistanceFromStationOption::pluck('label_jp', 'id')->all();

        $data['design_categories'] = collect($categories)->all();

        return view('backend.property.form', $data);
    }

    public function store( Request $request)
    {
        $data = $request->all();
        $this->validator($data, 'create')->validate();

        $properties_plans = array();
        if(isset($data['plan_id_dc_1'])){
            array_push($properties_plans, $data['plan_id_dc_1']);
        }
        if(isset($data['plan_id_dc_2'])){
            array_push($properties_plans, $data['plan_id_dc_2']);
        }
        if(isset($data['plan_id_dc_3'])){
            array_push($properties_plans, $data['plan_id_dc_3']);
        }
        if(isset($data['plan_id_dc_4'])){
            array_push($properties_plans, $data['plan_id_dc_4']);
        }

        //return $data;
        if(Auth::guard('user')->check()){
            $data['user_id'] = Auth::id();
        }

        // handle properties stations
        $properties_stations = $data['select_stations'] ?? [];
        $closest_station_id = $data['nearest_station_id'] ?? null;
        $distance_closest_station = $data['walking_distance_id'] ?? null;


        //return $data;
        $data['date_built'] = $request->date_built ? $request->date_built . '-01-01' : null; // save as first day of the year
        $data['thumbnail_image_main']   = FileHelper::upload( $request->file('thumbnail_image_main'));

        $data['thumbnail_image_1']  = ImageHelper::upload( $request->file('thumbnail_image_1'));
        $data['thumbnail_image_2']  = ImageHelper::upload( $request->file('thumbnail_image_2'));
        $data['thumbnail_image_3']  = ImageHelper::upload( $request->file('thumbnail_image_3'));
        $data['thumbnail_image_4']  = ImageHelper::upload( $request->file('thumbnail_image_4'));
        $data['thumbnail_image_4']  = ImageHelper::upload( $request->file('thumbnail_image_4'));
        $data['thumbnail_image_5']  = ImageHelper::upload( $request->file('thumbnail_image_5'));
        $data['thumbnail_image_6']  = ImageHelper::upload( $request->file('thumbnail_image_6'));

        $data['image_1']     = ImageHelper::upload( $request->file('image_1'));
        $data['image_2']     = ImageHelper::upload( $request->file('image_2'));
        $data['image_3']     = ImageHelper::upload( $request->file('image_3'));
        $data['image_4']     = ImageHelper::upload( $request->file('image_4'));
        $data['image_5']     = ImageHelper::upload( $request->file('image_5'));
        $data['image_6']     = ImageHelper::upload( $request->file('image_6'));
        $data['image_7']     = ImageHelper::upload( $request->file('image_7'));
        $data['image_8']     = ImageHelper::upload( $request->file('image_8'));
        $data['image_9']     = ImageHelper::upload( $request->file('image_9'));
        $data['image_10']    = ImageHelper::upload( $request->file('image_10'));

        $data['image_360_1']     = ImageHelper::upload( $request->file('image_360_1'));
        $data['image_360_2']     = ImageHelper::upload( $request->file('image_360_2'));
        $data['image_360_3']     = ImageHelper::upload( $request->file('image_360_3'));
        $data['image_360_4']     = ImageHelper::upload( $request->file('image_360_4'));
        $data['image_360_5']     = ImageHelper::upload( $request->file('image_360_5'));

        // change to meter and yen before save
        $data['surface_area'] = fromTsubo($data['surface_area']);
        $data['rent_amount'] = fromMan($data['rent_amount']);
        // change to yen before save
        $data['deposit_amount'] = fromMan($data['deposit_amount']);
        $data['special_moving_fee'] = fromMan($data['special_moving_fee']);
        $data['interior_transfer_price'] = fromMan($data['interior_transfer_price']);
        $data['monthly_maintainance_fee'] = fromMan($data['monthly_maintainance_fee']);

        DB::beginTransaction();
        try {
            $feature = new Property();
            $feature->fill($data)->save();

            foreach($properties_plans as $pp){
                PropertyPlan::create([
                    'plan_id' => $pp,
                    'property_id' => $feature->id,
                ]);
            }

            // handle properties stations
            foreach($properties_stations as $ps){
                PropertiesStations::create([
                    'station_id' => $ps,
                    'property_id' => $feature->id,
                    'distance_from_station' => $ps == $closest_station_id && $closest_station_id != null ? $distance_closest_station : null,
                    'is_closest' => $ps == $closest_station_id && $closest_station_id != null ? 1 : 0,
                ]);
            }

            DB::commit();
            if(Auth::guard('user')->check()){
                return redirect()->route('company.property.index')->with('success', __('label.SUCCESS_CREATE_MESSAGE'));
            } else {
                return redirect()->route('admin.property.index')->with('success', __('label.SUCCESS_CREATE_MESSAGE'));
            }
        } catch (\Exception $e) {
            DB::rollback();
            if(Auth::guard('user')->check()){
                return redirect()->route('company.property.index')->with('success', __('label.SUCCESS_CREATE_MESSAGE'));
            }
            return redirect()->route('admin.property.create')->with('error', 'Property created unsuccessfully');
        }



    }

    public function edit($id)
    {
        $data['item'] = Property::with(['property_plans.plan', 'postcode', 'prefecture', 'city', 'user.company', 'property_stations', 'property_stations_closest.station.station_line'])->find($id);
        // return $data;
        // Company user can edit properties on their own company
        // User A and User B on the same company, User A can edit the property of User B
        if(Auth::guard('user')->check()){
            // Company user only can edit if the property is on their company or the property publication status id is not deleted or expired
            if($data['item']->user->company->id != Auth::user()->company->id || in_array($data['item']->publication_status_id, PropertyPublicationStatus::ONLY_VISIBLE_ADMIN)){
                return redirect()->route('company.property.index')->withErrors(['msg' => 'このプロパティへのアクセス権がありません']);
            }
        }
        $data['publication_statuses'] = PropertyPublicationStatus::ONLY_VISIBLE_ADMIN_FORM;
        $data['form_action'] = route('admin.property.update', $id);
        if(Auth::guard('user')->check()){
            $data['form_action'] = route('company.property.update', $id);
            $data['publication_statuses'] = PropertyPublicationStatus::ONLY_VISIBLE_COMPANY_FORM;
        }
        $data['property_related'] = '';
        $data['page_type'] = 'edit';
        $data['property_types'] = PropertyType::pluck('label_jp', 'id')->all();
        $data['structures'] = Structure::pluck('label_jp', 'id')->all();
        $data['business_terms'] = BusinessTerm::pluck('label_jp', 'id')->all();
        $data['page_title'] = __('label.property_editing');
        $data['is_skeleton'] = [Property::FURNISHED => __('label.furnished'), Property::SKELETON => __('label.skeleton')];
        $data['cuisines'] = Cuisine::pluck('label_jp', 'id')->all();

        // options for vue select 2 options
        $companies                     = collect(Company::pluck('company_name', 'id')->all());
        $data['companies_options']     = $this->initSelect2Options($companies);

        $categories =  [
            [
                'value' => Cuisine::IZAKAYA,
                'label_en' => 'Izakaya / Dining Bar',
                'label_jp' => '居酒屋・ダイニングバー',
            ],
            [
                'value' => Cuisine::CAFE,
                'label_en' => 'Cafe',
                'label_jp' => 'カフェ',
            ],
            [
                'value' => Cuisine::BAR,
                'label_en' => 'Bar',
                'label_jp' => 'バー',
            ],
            [
                'value' => Cuisine::RAMEN,
                'label_en' => 'Ramen',
                'label_jp' => 'ラーメン',
            ],

        ];
        $data['design_categories'] = collect($categories)->all();
        $data['dc_id'] = Plan::select('design_category_id')->find($data['item']->plan_id);
        $prefectures = collect(Prefecture::pluck('display_name', 'id')->all());
        $data['prefectures'] = $this->initSelect2Options($prefectures);
        $data['walking_distances'] = WalkingDistanceFromStationOption::pluck('label_jp', 'id')->all();
        return view('backend.property.form', $data);
    }

    public function update( Request $request, $id)
    {
        $data = $request->all();
        // dd($data);
        // return $data;
        $this->validator($data, 'update')->validate();
        $properties_plans = array();
        if(isset($data['plan_id_dc_1'])){
            array_push($properties_plans, $data['plan_id_dc_1']);
        }
        if(isset($data['plan_id_dc_2'])){
            array_push($properties_plans, $data['plan_id_dc_2']);
        }
        if(isset($data['plan_id_dc_3'])){
            array_push($properties_plans, $data['plan_id_dc_3']);
        }
        if(isset($data['plan_id_dc_4'])){
            array_push($properties_plans, $data['plan_id_dc_4']);
        }
        if(Auth::guard('user')->check()){
            $data['user_id'] = Auth::id();
        }

        // handle properties stations
        $properties_stations = $data['select_stations'] ?? [];
        $closest_station_id = $data['nearest_station_id'] ?? null;
        $distance_closest_station = $data['walking_distance_id'] ?? null;

        $edit = Property::find($id);
        $publicationStatusBeforeUpdate = $edit->publication_status_id;

        $data['date_built'] = $request->date_built ? $request->date_built . '-01-01' : null; // save as first day of the year
        $data['thumbnail_image_main']   = ImageHelper::update( $request->file('thumbnail_image_main'), $edit->thumbnail_image_main);

        $data['thumbnail_image_1']  = ImageHelper::update( $request->file('thumbnail_image_1'), $edit->thumbnail_image_1, $data['removable_image']['thumbnail_image_1']);
        $data['thumbnail_image_2']  = ImageHelper::update( $request->file('thumbnail_image_2'), $edit->thumbnail_image_2, $data['removable_image']['thumbnail_image_2']);
        $data['thumbnail_image_3']  = ImageHelper::update( $request->file('thumbnail_image_3'), $edit->thumbnail_image_3, $data['removable_image']['thumbnail_image_3']);
        $data['thumbnail_image_4']  = ImageHelper::update( $request->file('thumbnail_image_4'), $edit->thumbnail_image_4, $data['removable_image']['thumbnail_image_4']);
        $data['thumbnail_image_5']  = ImageHelper::update( $request->file('thumbnail_image_5'), $edit->thumbnail_image_5, $data['removable_image']['thumbnail_image_5']);
        $data['thumbnail_image_6']  = ImageHelper::update( $request->file('thumbnail_image_6'), $edit->thumbnail_image_6, $data['removable_image']['thumbnail_image_6']);

        $data['image_1']     = ImageHelper::update( $request->file('image_1'), $edit->image_1, $data['removable_image']['image_1']);
        $data['image_2']     = ImageHelper::update( $request->file('image_2'), $edit->image_2, $data['removable_image']['image_2']);
        $data['image_3']     = ImageHelper::update( $request->file('image_3'), $edit->image_3, $data['removable_image']['image_3']);
        $data['image_4']     = ImageHelper::update( $request->file('image_4'), $edit->image_4, $data['removable_image']['image_4']);
        $data['image_5']     = ImageHelper::update( $request->file('image_5'), $edit->image_5, $data['removable_image']['image_5']);
        $data['image_6']     = ImageHelper::update( $request->file('image_6'), $edit->image_6, $data['removable_image']['image_6']);
        $data['image_7']     = ImageHelper::update( $request->file('image_7'), $edit->image_7, $data['removable_image']['image_7']);
        $data['image_8']     = ImageHelper::update( $request->file('image_8'), $edit->image_8, $data['removable_image']['image_8']);
        $data['image_9']     = ImageHelper::update( $request->file('image_9'), $edit->image_9, $data['removable_image']['image_9']);
        $data['image_10']    = ImageHelper::update( $request->file('image_10'), $edit->image_10, $data['removable_image']['image_10']);

        $data['image_360_1']     = ImageHelper::update( $request->file('image_360_1'), $edit->image_360_1, $data['removable_image']['image_360_1']);
        $data['image_360_2']     = ImageHelper::update( $request->file('image_360_2'), $edit->image_360_2, $data['removable_image']['image_360_2']);
        $data['image_360_3']     = ImageHelper::update( $request->file('image_360_3'), $edit->image_360_3, $data['removable_image']['image_360_3']);
        $data['image_360_4']     = ImageHelper::update( $request->file('image_360_4'), $edit->image_360_4, $data['removable_image']['image_360_4']);
        $data['image_360_5']     = ImageHelper::update( $request->file('image_360_5'), $edit->image_360_5, $data['removable_image']['image_360_5']);

        // change to meter and yen before update
        $data['surface_area'] = fromTsubo($data['surface_area']);
        $data['rent_amount'] = fromMan($data['rent_amount']);
        // change to yen before save
        $data['deposit_amount'] = fromMan($data['deposit_amount']);
        $data['special_moving_fee'] = fromMan($data['special_moving_fee']);
        $data['interior_transfer_price'] = fromMan($data['interior_transfer_price']);
        $data['monthly_maintainance_fee'] = fromMan($data['monthly_maintainance_fee']);

        // check publication status id need update
        $publicationId = (int) $data['publication_status_id'];
        if(($publicationId == PropertyPublicationStatus::ID_PUBLISHED ||
            $publicationId == PropertyPublicationStatus::ID_LIMITED_PUBLISHED)
            && $publicationStatusBeforeUpdate != $publicationId){
            $data['publication_date'] = Carbon::now();
        }

        $edit->update($data);

        // update publication status period if it is changed
        if($data['publication_status_id'] != $publicationStatusBeforeUpdate){
            $this->updatePublicationStatus($edit->id);
        }
        // Still Pending [A13] Add modal to save stations+ distance to the property table. Comment out for now
        // $property_plans_old = array();
        // foreach($edit->plans as $plan){
        //     array_push($property_plans_old, $plan->pivot->plan_id);
        // }

        // $shouldUpdatePlan = ($property_plans_old != $properties_plans); //check if property plan need update
        // if($shouldUpdatePlan){
        //     $edit->plans()->detach();
        //     $edit->plans()->attach($properties_plans);
        // }

        // $property_stations_old = array();
        // foreach($edit->property_stations as $ps){
        //     array_push($property_stations_old, $ps->station_id);
        // }
        // $shouldUpdatePropertyStations = ($property_stations_old != $properties_stations); //check if property station need update
        // if($shouldUpdatePropertyStations){
        //     Log::info("message: should update property stations");
        //     $edit->property_stations()->delete();
        //     // handle properties stations
        //     foreach($properties_stations as $ps){
        //         PropertiesStations::create([
        //             'station_id' => $ps,
        //             'property_id' => $edit->id,
        //             'distance_from_station' => $ps == $closest_station_id && $closest_station_id != null ? $distance_closest_station : null,
        //             'is_closest' => $ps == $closest_station_id && $closest_station_id != null ? 1 : 0,
        //         ]);
        //     }
        // }
        if(Auth::guard('user')->check()){
            return redirect()->route('company.property.edit', $id)->with('success', __('label.SUCCESS_UPDATE_MESSAGE'));
        } else {
            return redirect()->route('admin.property.edit', $id)->with('success', __('label.SUCCESS_UPDATE_MESSAGE'));
        }

    }

    public function destroy($id)
    {
        $property = Property::find($id);
        $property->update(['publication_status_id' => PropertyPublicationStatus::ID_MANUALLY_DELETED]);
    }

    public function getCompanyName($id){
        $data = User::with(['company'])->find($id);
        return response()->json($data);
    }

    public function updatePublicationStatus($propertyId)
    {
        Log::info("message: propertyId");
        $property = Property::find($propertyId);

        $previous_period = PropertyPublicationStatusPeriod::where('property_id', $propertyId)->where('is_current_status', 1)->latest();

        if($previous_period->count() > 0){
            $latest_period = $previous_period->first(); // get latest previous period

            $previous_start_date = Carbon::parse($latest_period->status_start_date);
            $diff = $previous_start_date->diffInDays(Carbon::now()->format("Y-m-d"));
            //3a
            $property_period = new PropertyPublicationStatusPeriod();
            $property_period->property_id = $propertyId;
            $property_period->status_start_date = Carbon::now()->format("Y-m-d");
            $property_period->status_end_date = null;
            $property_period->is_current_status = true;
            $property_period->remaining_publication_days = $latest_period->property->publication_status_id == PropertyPublicationStatus::ID_PUBLISHED ? $latest_period->remaining_publication_days - $diff : $latest_period->remaining_publication_days ;
            $property_period->publication_status_id = Property::find($propertyId)->publication_status_id ?? null;
            $property_period->save();
            //4 update previos record status to false
            if($property_period){
                $latest_period->update([
                    'status_end_date' => Carbon::now()->format("Y-m-d"),
                    'is_current_status' => false
                ]);
            }
        } else {
            //create if no property period 3b
            $property_period = new PropertyPublicationStatusPeriod();
            $property_period->property_id = $propertyId;
            $property_period->status_start_date = Carbon::now()->format("Y-m-d");
            $property_period->status_end_date = null;
            $property_period->is_current_status = true;
            $property_period->remaining_publication_days = 120;
            $property_period->publication_status_id = Property::find($propertyId)->publication_status_id ?? null;
            $property_period->save();

        }

        // finally update property publication_status_id
        // if($property->publication_status_id == PropertyPublicationStatus::ID_NOT_PUBLISHED){
        //     $property->update([
        //         'publication_status_id' => PropertyPublicationStatus::ID_PUBLISHED,
        //         'publication_date' => Carbon::now(),
        //     ]);
        // } else {
        //     $property->update([
        //         'publication_status_id' => PropertyPublicationStatus::ID_NOT_PUBLISHED,
        //     ]);
        // }

        return redirect()->back()->with('success', __('label.SUCCESS_UPDATE_MESSAGE'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt'
        ], [
            'file.required' => __('validation.required', ['attribute' => 'ファイル']),
            'file.mimes' => __('validation.mimes', ['attribute' => 'ファイル', 'values' => 'csv']),
        ]);

        $file = $request->file('file');
        Excel::import(new PropertiesImport, $file, null, \Maatwebsite\Excel\Excel::CSV);
        // (new PropertiesImport)->import($file, null, \Maatwebsite\Excel\Excel::CSV);

        return redirect()->back()->with('success', __('label.SUCCESS_CREATE_MESSAGE'));
    }


}
