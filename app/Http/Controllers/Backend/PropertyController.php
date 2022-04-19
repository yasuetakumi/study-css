<?php

namespace App\Http\Controllers\Backend;

use stdClass;
use TsuboHelper;
use Carbon\Carbon;
use App\Models\City;
use App\Models\Plan;
use App\Models\User;
use App\Models\Company;
use App\Models\Cuisine;
use App\Models\TagMood;
use App\Models\Postcode;
use App\Models\Property;
use App\Models\TagStyle;
use App\Models\Structure;
use App\Models\Prefecture;
use App\Helpers\FileHelper;
use App\Models\DesignStyle;
use App\Helpers\ImageHelper;
use App\Models\BusinessTerm;
use App\Models\PropertyPlan;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use App\Models\ContactUsType;
use App\Models\CustomerInquiry;
use App\Models\TagArchitecture;
use App\Helpers\DatatablesHelper;
use App\Models\SurfaceAreaOption;
use App\Traits\CommonToolsTraits;
use App\Helpers\Select2AjaxHelper;
use App\Http\Controllers\Controller;
use App\Models\PropertyPublicationStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\PropertyPublicationStatusPeriod;

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
            'location'      => 'required|regex:/^[ぁ-んァ-ン一-龥]/|alpha_dash',
            'plan_id_dc_1'  => isset($data['plan_id_dc_1']) ? 'required' : '',
            'plan_id_dc_2'  => isset($data['plan_id_dc_2']) ? 'required' : '',
            'plan_id_dc_3'  => isset($data['plan_id_dc_3']) ? 'required' : '',
            'plan_id_dc_4'  => isset($data['plan_id_dc_4']) ? 'required' : '',

        ], [
            'location.regex'        => 'Only Japanase Characther Allowed!',
            'location.alpha_dash'   => 'No space allowed!',
            'plan_id_dc_1.required' => 'Plan for Design Category 居酒屋 is Required',
            'plan_id_dc_2.required' => 'Plan for Design Category カフェ is Required',
            'plan_id_dc_3.required' => 'Plan for Design Category バー is Required',
            'plan_id_dc_4.required' => 'Plan for Design Category ラーメン is Required'
        ]);
    }

    public function show($param)
    {

        if( $param == 'json' ){

            $model = Property::with(['user', 'postcode']);
            if(Auth::guard('user')->check()){
                $model = Property::with(['user', 'postcode']);
                $model->whereHas('user', function($q){
                    $q->where('belong_company_id', Auth::guard('user')->user()->belong_company_id);
                });
            }
            return (new DatatablesHelper)->instance($model)
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
                                            ->toJson();

        }
        abort(404);


    }

    public function index()
    {
        $data['page_title'] = __('label.property_list');
        if(Auth::guard('user')->check()){
            $data['page_title'] = 'Property Company List';
        }

        return view('backend.property.index', $data);
    }

    public function detail($id)
    {

    }

    public function create()
    {
        $data['item'] = new StdClass();
        $data['form_action'] = route('admin.property.store');
        if(Auth::guard('user')->check()){
            $data['form_action'] = route('company.property.store');
        }
        $data['property_related'] = '';
        $data['page_type'] = 'create';
        $data['property_types'] = PropertyType::pluck('label_jp', 'id')->all();
        $data['structures'] = Structure::pluck('label_jp', 'id')->all();
        $data['business_terms'] = BusinessTerm::pluck('label_jp', 'id')->all();
        $data['page_title'] = 'Property Create';
        $data['is_skeleton'] = [Property::FURNISHED => 'Furnished', Property::SKELETON => 'Updated by the Scraping Process'];
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

        return view('backend.property.form', $data);
    }

    public function store( Request $request)
    {
        $data = $request->all();
        $this->validator($data, 'create')->validate();
        // dd($data);

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

        //return $data;
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

        $feature = new Property();
        $feature->fill($data)->save();

        foreach($properties_plans as $pp){
            PropertyPlan::create([
                'plan_id' => $pp,
                'property_id' => $feature->id,
            ]);
        }

        if(Auth::guard('user')->check()){
            return redirect()->route('company.property.index')->with('success', __('label.SUCCESS_CREATE_MESSAGE'));
        } else {
            return redirect()->route('admin.property.index')->with('success', __('label.SUCCESS_CREATE_MESSAGE'));
        }
    }

    public function edit($id)
    {
        $data['item'] = Property::with(['property_plans.plan', 'postcode', 'prefecture', 'city', 'user.company'])->find($id);
        // return $data;
        // Company user can edit properties on their own company
        // User A and User B on the same company, User A can edit the property of User B
        if(Auth::guard('user')->check()){
            if($data['item']->user->company->id != Auth::user()->company->id){
                return redirect()->route('company.property.index')->withErrors(['msg' => 'You dont have access to this property']);
            }
        }

        $data['form_action'] = route('admin.property.update', $id);
        if(Auth::guard('user')->check()){
            $data['form_action'] = route('company.property.update', $id);
        }
        $data['property_related'] = '';
        $data['page_type'] = 'edit';
        $data['property_types'] = PropertyType::pluck('label_jp', 'id')->all();
        $data['structures'] = Structure::pluck('label_jp', 'id')->all();
        $data['business_terms'] = BusinessTerm::pluck('label_jp', 'id')->all();
        $data['page_title'] = 'Property Detail';
        $data['is_skeleton'] = [Property::FURNISHED => 'Furnished', Property::SKELETON => 'Updated by the Scraping Process'];
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
        return view('backend.property.form', $data);
    }

    public function update( Request $request, $id)
    {
        $data = $request->all();
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

        $edit = Property::find($id);

        $data['thumbnail_image_main']   = ImageHelper::update( $request->file('thumbnail_image_main'), $edit->thumbnail_image_main);

        $data['thumbnail_image_1']  = ImageHelper::update( $request->file('thumbnail_image_1'), $edit->thumbnail_image_1);
        $data['thumbnail_image_2']  = ImageHelper::update( $request->file('thumbnail_image_2'), $edit->thumbnail_image_2);
        $data['thumbnail_image_3']  = ImageHelper::update( $request->file('thumbnail_image_3'), $edit->thumbnail_image_3);
        $data['thumbnail_image_4']  = ImageHelper::update( $request->file('thumbnail_image_4'), $edit->thumbnail_image_4);
        $data['thumbnail_image_5']  = ImageHelper::update( $request->file('thumbnail_image_5'), $edit->thumbnail_image_5);
        $data['thumbnail_image_6']  = ImageHelper::update( $request->file('thumbnail_image_6'), $edit->thumbnail_image_6);

        $data['image_1']     = ImageHelper::update( $request->file('image_1'), $edit->image_1);
        $data['image_2']     = ImageHelper::update( $request->file('image_2'), $edit->image_2);
        $data['image_3']     = ImageHelper::update( $request->file('image_3'), $edit->image_3);
        $data['image_4']     = ImageHelper::update( $request->file('image_4'), $edit->image_4);
        $data['image_5']     = ImageHelper::update( $request->file('image_5'), $edit->image_5);
        $data['image_6']     = ImageHelper::update( $request->file('image_6'), $edit->image_6);
        $data['image_7']     = ImageHelper::update( $request->file('image_7'), $edit->image_7);
        $data['image_8']     = ImageHelper::update( $request->file('image_8'), $edit->image_8);
        $data['image_9']     = ImageHelper::update( $request->file('image_9'), $edit->image_9);
        $data['image_10']    = ImageHelper::update( $request->file('image_10'), $edit->image_10);

        $data['image_360_1']     = ImageHelper::update( $request->file('image_360_1'), $edit->image_360_1);
        $data['image_360_2']     = ImageHelper::update( $request->file('image_360_2'), $edit->image_360_2);
        $data['image_360_3']     = ImageHelper::update( $request->file('image_360_3'), $edit->image_360_3);
        $data['image_360_4']     = ImageHelper::update( $request->file('image_360_4'), $edit->image_360_4);
        $data['image_360_5']     = ImageHelper::update( $request->file('image_360_5'), $edit->image_360_5);

        // change to meter and yen before update
        $data['surface_area'] = fromTsubo($data['surface_area']);
        $data['rent_amount'] = fromMan($data['rent_amount']);

        $edit->update($data);

        $property_plans_old = array();
        foreach($edit->plans as $plan){
            array_push($property_plans_old, $plan->pivot->plan_id);
        }

        $shouldUpdatePlan = ($property_plans_old != $properties_plans); //check if property plan need update
        if($shouldUpdatePlan){
            $edit->plans()->detach();
            $edit->plans()->attach($properties_plans);
        }

        if(Auth::guard('user')->check()){
            return redirect()->route('company.property.edit', $id)->with('success', __('label.SUCCESS_UPDATE_MESSAGE'));
        } else {
            return redirect()->route('admin.property.edit', $id)->with('success', __('label.SUCCESS_UPDATE_MESSAGE'));
        }

    }

    public function destroy($id)
    {
        $property = Property::find($id);
        $property->delete();

        // return redirect()->back()->with('success', __('label.SUCCESS_DELETE_MESSAGE'));
    }

    public function getCompanyName($id){
        $data = User::with(['company'])->find($id);
        return response()->json($data);
    }

    public function updatePublicationStatus($propertyId)
    {
        $property = Property::find($propertyId);

        if($property->publication_status_id == PropertyPublicationStatus::ID_NOT_PUBLISHED){
            $property->update([
                'publication_status_id' => PropertyPublicationStatus::ID_PUBLISHED,
            ]);
        } else {
            $property->update([
                'publication_status_id' => PropertyPublicationStatus::ID_NOT_PUBLISHED,
            ]);
        }
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
                return redirect()->back()->with('success', __('label.SUCCESS_UPDATE_MESSAGE'));
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
            if($property_period){
                return redirect()->back()->with('success', __('label.SUCCESS_CREATE_MESSAGE'));
            }
        }
    }


}
