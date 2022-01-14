<?php

namespace App\Http\Controllers\Backend;

use App\Models\City;
use App\Models\User;
use App\Models\Cuisine;
use App\Models\Postcode;
use App\Models\Property;
use App\Models\Structure;
use App\Models\BusinessTerm;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use App\Helpers\DatatablesHelper;
use App\Http\Controllers\Controller;

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
        $data['cities'] = City::pluck('label_en', 'label_jp', 'id')->all();
        $data['prefectures'] = [1 => 'Prefecture 1', 2 => 'Prefecture 2', 3 => 'Prefecture 3'];
        $data['property_types'] = PropertyType::pluck('label_en', 'label_jp', 'id')->all();
        $data['structures'] = Structure::pluck('label_en', 'label_jp', 'id')->all();
        $data['business_terms'] = BusinessTerm::pluck('label_en', 'label_jp', 'id')->all();
        $data['page_title'] = 'Property Detail';
        $data['is_skeleton'] = [Property::FURNISHED => 'Furnished', Property::SKELETON => 'Updated by the Scraping Process'];
        $data['cuisines'] = Cuisine::pluck('label_en', 'label_jp', 'id')->all();
        //$data['form_action']= route('admin.user.store');


        $data['page_type']  = 'detail';
        //dd($data);
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
