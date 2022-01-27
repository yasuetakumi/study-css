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

class PropertyController extends Controller
{
    use CommonToolsTraits;
    public function show($param)
    {

        if( $param == 'json' ){

            $model = Property::with(['user', 'postcode']);
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
        $data['page_title'] = 'Property List';
        return view('backend.property.index', $data);
    }

    public function detail($id)
    {
        $data['item']       = Property::find($id);
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
            $tsubo = new TsuboHelper();
            $tsubo_value = $tsubo->toTsubo($sf->value);
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



    public function create()
    {
        $data['item'] = new StdClass();
        $data['form_action'] = route('admin.property.store');
        $data['page_type'] = 'create';
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
        return view('backend.property.form', $data);
    }

    public function store( Request $request)
    {
        $data = $request->all();

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

        $feature = new Property();
        $feature->fill($data)->save();

        return redirect()->route('admin.property.index')->with('success', __('label.SUCCESS_CREATE_MESSAGE'));
    }

    public function edit($id)
    {
        $data['item'] = Property::find($id);
        $data['form_action'] = route('admin.property.update', $id);
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

        return view('backend.property.form', $data);
    }

    public function update( Request $request, $id)
    {
        $data = $request->all();

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

        $edit->update($data);

        return redirect()->route('admin.property.edit', $id)->with('success', __('label.SUCCESS_UPDATE_MESSAGE'));
    }

    public function destroy()
    {

    }


}