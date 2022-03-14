<?php

namespace App\Http\Controllers\Backend;

use stdClass;
use TsuboHelper;
use App\Models\City;
use App\Models\Plan;
use App\Models\User;
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
use App\Models\PropertyType;
use Illuminate\Http\Request;
use App\Models\TagArchitecture;
use App\Helpers\DatatablesHelper;

use App\Models\SurfaceAreaOption;
use App\Traits\CommonToolsTraits;
use App\Http\Controllers\Controller;
use App\Models\ContactUsType;
use App\Models\CustomerInquiry;
use App\Models\PropertyPlan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        //abort(404);
        $id = $param;
        $data['item']       = Property::with(['city'])->find($id);

        // Company user can edit properties on their own company
        // User A and User B on the same company, User A can edit the property of User B
        if(Auth::guard('user')->check()){
            if($data['item']->user->company->id != Auth::user()->company->id){
                return redirect()->route('company.property.index')->withErrors(['msg' => 'You dont have access to this property']);
            }
        }

        $data['form_action'] = '';
        $data['page_type'] = 'detail';
        $data['postcodes'] = Postcode::pluck('postcode', 'id')->take(10)->all();
        $users                     = collect(User::pluck('display_name', 'id')->take(10)->all());
        $data['users_options']     = $this->initSelect2Options($users);
        $data['cities'] = City::pluck('display_name', 'id')->all();
        // $data['prefectures'] = [1 => 'Prefecture 1', 2 => 'Prefecture 2', 3 => 'Prefecture 3'];
        $data['property_types'] = PropertyType::pluck('label_en', 'label_jp', 'id')->all();
        $data['structures'] = Structure::pluck('label_en', 'label_jp', 'id')->all();
        $data['business_terms'] = BusinessTerm::pluck('label_en', 'label_jp', 'id')->all();
        $data['page_title'] = 'Property Detail';
        $data['is_skeleton'] = [Property::FURNISHED => 'Furnished', Property::SKELETON => 'Updated by the Scraping Process'];
        $data['cuisines'] = Cuisine::pluck('label_en', 'label_jp', 'id')->all();
        //$data['form_action']= route('admin.user.store');

        $data['prefectures'] = Prefecture::orderBy('area_id','asc')->orderBy('id')->pluck('display_name', 'id');
        // $data['tag_styles']  = TagStyle::orderBy('id')->get();
        // $data['tag_architectures'] = TagArchitecture::orderBy('id')->get();
        // $data['tag_moods'] = TagMood::orderBy('id')->get();
        $data['design_styles'] = DesignStyle::orderBy('id')->get();
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
        $skeleton = [
            [
                'value' => Property::FURNISHED,
                'label_jp' => '居抜き物件',
            ],
            [
                'value' => Property::SKELETON,
                'label_jp' => 'スケルトン物件',
            ],

        ];
        $data['design_categories']  = collect($categories)->all();

        $data['plans']  = Plan::orderBy('area')->get();
        $surface_area = SurfaceAreaOption::orderBy('id')->get();
        $surface_area_tsubo = [];
        foreach($surface_area as $sf){
            $tsubo_value = toTsubo($sf->value);
            array_push($surface_area_tsubo, $tsubo_value );
        }
        $surface_area_tsubo_options = collect($surface_area_tsubo);
        $data['max_surface_area'] = $surface_area_tsubo_options->max();
        $data['min_surface_area'] = $surface_area_tsubo_options->min();
        $data['has_kitchens'] = collect($skeleton);
        $data['page_type']  = 'detail';

        //dd($data['design_categories']);
        return view('backend.property.form', $data);

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
        $data['item']       = Property::with(['property_plans.plan' => function($query){
            $query->select('id', 'display_name', 'design_category_id');
        }])->find($id);
        $data['form_action'] = '';
        $data['page_type'] = 'detail';
        $data['postcodes'] = Postcode::pluck('postcode', 'id')->take(10)->all();
        $users                     = collect(User::pluck('display_name', 'id')->take(10)->all());
        $data['users_options']     = $this->initSelect2Options($users);
        $data['cities'] = City::pluck('display_name', 'id')->all();
        // $data['prefectures'] = [1 => 'Prefecture 1', 2 => 'Prefecture 2', 3 => 'Prefecture 3'];
        $data['property_types'] = PropertyType::pluck('label_en', 'label_jp', 'id')->all();
        $data['structures'] = Structure::pluck('label_en', 'label_jp', 'id')->all();
        $data['business_terms'] = BusinessTerm::pluck('label_en', 'label_jp', 'id')->all();
        $data['page_title'] = 'Property Detail';
        $data['is_skeleton'] = [Property::FURNISHED => 'Furnished', Property::SKELETON => 'Updated by the Scraping Process'];
        $data['cuisines'] = Cuisine::pluck('label_en', 'label_jp', 'id')->all();
        //$data['form_action']= route('admin.user.store');

        $data['prefectures'] = Prefecture::orderBy('area_id','asc')->orderBy('id')->pluck('display_name', 'id');
        // $data['tag_styles']  = TagStyle::orderBy('id')->get();
        // $data['tag_architectures'] = TagArchitecture::orderBy('id')->get();
        // $data['tag_moods'] = TagMood::orderBy('id')->get();
        $data['design_styles'] = DesignStyle::orderBy('id')->get();
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
        $skeleton = [
            [
                'value' => Property::FURNISHED,
                'label_jp' => '居抜き物件',
            ],
            [
                'value' => Property::SKELETON,
                'label_jp' => 'スケルトン物件',
            ],

        ];
        $data['design_categories']  = collect($categories)->all();

        $data['plans']  = Plan::orderBy('area')->get();
        $surface_area = SurfaceAreaOption::orderBy('id')->get();
        $surface_area_tsubo = [];
        foreach($surface_area as $sf){
            $tsubo_value = toTsubo($sf->value);
            array_push($surface_area_tsubo, $tsubo_value );
        }
        $surface_area_tsubo_options = collect($surface_area_tsubo);
        $data['max_surface_area'] = $surface_area_tsubo_options->max();
        $data['min_surface_area'] = $surface_area_tsubo_options->min();
        $data['has_kitchens'] = collect($skeleton);
        $data['page_type']  = 'detail';
        if(!Auth::check()){
            $data['contact_us_type'] = ContactUsType::select('id', 'label_jp')->orderBy('id')->get();
            $data['form_action_inquiry'] = route('enduser.inquiry.store');
        }
        $data['property_related'] = Property::with(['city', 'property_stations.station'])
                ->select('id', 'location', 'city_id', 'surface_area', 'thumbnail_image_main')
                ->where('city_id', $data['item']->city_id)
                ->where('id', '!=', $data['item']->id)
                ->orderByRaw('RAND()')
                ->limit(3)
                ->get();
        // return $data['property_related'];
        //dd($data['design_categories']);
        return view('backend.property.form', $data);
    }



    public function create()
    {
        $data['item'] = new StdClass();
        $data['form_action'] = route('admin.property.store');
        if(Auth::guard('user')->check()){
            $data['form_action'] = route('company.property.store');
        }
        $data['page_type'] = 'create';
        $data['postcodes'] = Postcode::pluck('postcode', 'id')->take(10)->all();
        //$data['users'] = User::pluck('display_name', 'id')->all();
        $data['cities'] = City::pluck('display_name', 'id')->all();
        $data['property_types'] = PropertyType::pluck('label_jp', 'id')->all();
        $data['structures'] = Structure::pluck('label_jp', 'id')->all();
        $data['business_terms'] = BusinessTerm::pluck('label_jp', 'id')->all();
        $data['page_title'] = 'Property Create';
        $data['is_skeleton'] = [Property::FURNISHED => 'Furnished', Property::SKELETON => 'Updated by the Scraping Process'];
        $data['cuisines'] = Cuisine::pluck('label_jp', 'id')->all();

        // options for vue select 2 options
        $users                     = collect(User::pluck('display_name', 'id')->take(10)->all());
        $data['users_options']     = $this->initSelect2Options($users);
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

        $data['prefectures'] = Prefecture::orderBy('area_id','asc')->orderBy('id')->pluck('display_name', 'id');
        return view('backend.property.form', $data);
    }

    public function store( Request $request)
    {
        $data = $request->all();
        $properties_plans = array();
        array_push($properties_plans, $data['plan_id_dc_1']);
        array_push($properties_plans, $data['plan_id_dc_2']);
        array_push($properties_plans, $data['plan_id_dc_3']);
        array_push($properties_plans, $data['plan_id_dc_4']);
        //return $data;
        if(Auth::guard('user')->check()){
            $data['user_id'] = Auth::id();
        }
        $this->validator($data, 'create')->validate();
        //return $data;
        $data['thumbnail_image_main']   = FileHelper::upload( $request->file('thumbnail_image_main') );
        for($i=1; $i<=6; $i++){
            $data['thumbnail_image_' . $i]  = ImageHelper::upload( $request->file('thumbnail_image_' . $i) );
        }
        for($i=1; $i<=10; $i++){
            $data['image_' . $i]     = ImageHelper::upload( $request->file('image_'. $i) );
        }
        for($i=1; $i<=5; $i++){
            $data['image_360_' . $i]     = ImageHelper::upload( $request->file('image_360_'. $i) );
        }
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
        $data['item'] = Property::with(['property_plans'])->find($id);

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
        $data['page_type'] = 'edit';
        $data['postcodes'] = Postcode::pluck('postcode', 'id')->take(10)->all();
        //$data['users'] = User::pluck('display_name', 'id')->all();
        $data['cities'] = City::pluck('display_name', 'id')->all();
        $data['property_types'] = PropertyType::pluck('label_jp', 'id')->all();
        $data['structures'] = Structure::pluck('label_jp', 'id')->all();
        $data['business_terms'] = BusinessTerm::pluck('label_jp', 'id')->all();
        $data['page_title'] = 'Property Detail';
        $data['is_skeleton'] = [Property::FURNISHED => 'Furnished', Property::SKELETON => 'Updated by the Scraping Process'];
        $data['cuisines'] = Cuisine::pluck('label_jp', 'id')->all();

        // options for vue select 2 options
        $users                     = collect(User::pluck('display_name', 'id')->take(10)->all());
        $data['users_options']     = $this->initSelect2Options($users);

        $data['prefectures'] = Prefecture::orderBy('area_id','asc')->orderBy('id')->pluck('display_name', 'id');

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
        $properties_plans = array();
        array_push($properties_plans, $data['plan_id_dc_1']);
        array_push($properties_plans, $data['plan_id_dc_2']);
        array_push($properties_plans, $data['plan_id_dc_3']);
        array_push($properties_plans, $data['plan_id_dc_4']);
        if(Auth::guard('user')->check()){
            $data['user_id'] = Auth::id();
        }
        $this->validator($data, 'update')->validate();
        $edit = Property::find($id);

        $data['thumbnail_image_main']   = ImageHelper::update( $request->file('thumbnail_image_main'), $edit->thumbnail_image_main);
        for($i=1; $i<=5; $i++){
            $data['thumbnail_image_' . $i]  = ImageHelper::update( $request->file('thumbnail_image_' . $i), $edit->thumbnail_image_ . $i);
        }
        $data['thumbnail_image_6']  = ImageHelper::update( $request->file('thumbnail_image_6'), $edit->thumbnail_image_6);
        for($i=1; $i<=10; $i++){
            $data['image_' . $i]     = ImageHelper::update( $request->file('image_'. $i), $edit->image_ . $i);
        }
        for($i=1; $i<=5; $i++){
            $data['image_360_' . $i]     = ImageHelper::update( $request->file('image_360_'. $i), $edit->image_360_ . $i);
        }
        // change to meter and yen before update
        $data['surface_area'] = fromTsubo($data['surface_area']);
        $data['rent_amount'] = fromMan($data['rent_amount']);

        $edit->update($data);
        $edit->plans()->sync($properties_plans);
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


}
