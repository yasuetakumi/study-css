<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Helpers\Select2AjaxHelper;
use App\Http\Controllers\Controller;
use App\Models\City;

class ApiCityController extends Controller
{
    public function select2City()
    {
        return Select2AjaxHelper::set(City::query(), 'id', 'display_name');
    }
    public function getCityByPrefecture($id)
    {
        $cities = City::where('prefecture_id', $id)->withCount('properties')->get();
        return response()->json($cities);
    }
}
