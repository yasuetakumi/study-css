<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PropertyHistoryController extends Controller
{
    public function index(){
        $data['page_title'] = __('label.property_history');
        return view('frontend.property.history', $data);
    }
}
