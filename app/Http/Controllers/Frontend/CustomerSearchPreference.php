<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerSearchPreference extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        return $data;
        $customer = new CustomerSearchPreference();

    }
}
