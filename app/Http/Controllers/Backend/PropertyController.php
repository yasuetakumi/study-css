<?php

namespace App\Http\Controllers\Backend;

use App\Models\City;
use App\Models\User;
use App\Models\Cuisine;
use App\Models\TagMood;
use App\Models\Postcode;
use App\Models\Property;
use App\Models\TagStyle;
use App\Models\Structure;
use App\Models\Prefecture;
use App\Models\BusinessTerm;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use App\Models\TagArchitecture;
use App\Helpers\DatatablesHelper;
use App\Http\Controllers\Controller;
use App\Models\DesignStyle;
use App\Models\Plan;
use App\Models\SurfaceAreaOption;

class PropertyController extends Controller
{
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
        $data['postcodes'] = Postcode::pluck('postcode', 'id')->take(10)->all();
        $data['users'] = User::pluck('display_name', 'id')->take(10)->all();
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
        $data['design_styles'] = DesignStyle::orderBy('id')->pluck('display_name', 'id');
        $data['design_categories']  = Cuisine::orderBy('id')->pluck('label_jp','id');
        $data['plans']  = Plan::orderBy('id')->pluck('display_name','id');
        $surface_area = SurfaceAreaOption::orderBy('id')->get();
        $surface_area_tsubo = [];
        foreach($surface_area as $sf){
            $tsubo_value = round($sf->value / 3.30579);
            array_push($surface_area_tsubo, $tsubo_value );
        }
        $surface_area_tsubo_options = collect($surface_area_tsubo);
        $data['max_surface_area'] = $surface_area_tsubo_options->max();
        $data['min_surface_area'] = $surface_area_tsubo_options->min();
        $data['is_skeleton'] = [
            Property::FURNISHED => 'FURNISHED',
            Property::SKELETON => 'SKELETON',
        ];
        $data['page_type']  = 'detail';
        return view('backend.property.form', $data);
    }

    public function update()
    {

    }

    public function create()
    {

    }
    public function store()
    {

    }

    public function edit()
    {

    }

    public function destroy()
    {

    }


}
