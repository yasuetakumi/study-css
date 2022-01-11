<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function show()
    {
        $data['page_title']     = __('Property Detail') ;
        return view('backend.property.form', $data);
    }
}
