<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function show()
    {
        $data['item']       = new Property();
        $data['page_title'] = __('label.add') . __('label.user');
        $data['form_action']= route('admin.user.store');


        $data['page_type']  = 'detail';
        return view('backend.property.form', $data);
    }


}
