<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BusinessTerm;
use App\Models\City;
use App\Models\Cuisine;
use App\Models\Postcode;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\Structure;
use App\Models\User;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function show()
    {
        $data['item']       = Property::find(1);
        $data['postcodes'] = Postcode::pluck('postcode', 'id')->take(10)->all();
        $data['users'] = User::pluck('display_name', 'id')->take(10)->all();
        $data['cities'] = City::pluck('label_en', 'label_jp', 'id')->all();
        $data['prefectures'] = [1 => 'Prefecture 1', 2 => 'Prefecture 2', 3 => 'Prefecture 3'];
        $data['property_types'] = PropertyType::pluck('label_en', 'label_jp', 'id')->all();
        $data['structures'] = Structure::pluck('label_en', 'label_jp', 'id')->all();
        $data['business_terms'] = BusinessTerm::pluck('label_en', 'label_jp', 'id')->all();
        $data['page_title'] = __('label.add') . __('label.user');
        $data['is_skeleton'] = [Property::FURNISHED => 'Furnished', Property::SKELETON => 'Updated by the Scraping Process'];
        $data['cuisines'] = Cuisine::pluck('label_en', 'label_jp', 'id')->all();
        //$data['form_action']= route('admin.user.store');


        $data['page_type']  = 'detail';
        //dd($data);
        return view('backend.property.form', $data);
    }


}
