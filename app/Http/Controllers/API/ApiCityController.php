<?php

namespace App\Http\Controllers\API;

use App\Models\City;
use Illuminate\Http\Request;
use App\Traits\CommonToolsTraits;
use App\Helpers\Select2AjaxHelper;
use App\Http\Controllers\Controller;

class ApiCityController extends Controller
{
    use CommonToolsTraits;
    public function select2City()
    {
        return Select2AjaxHelper::set(City::query(), 'id', 'display_name');
    }
    public function getCityByPrefecture($id)
    {
        $cities = City::where('prefecture_id', $id)->withCount('properties')->get();
        return response()->json($cities);
    }

    public function getCityByPrefectureSelect2($prefectureId = null)
    {
        if(empty($prefectureId)){
            $cities = collect(City::query()->pluck('display_name', 'id')->all());
        } else {
            $cities = collect(City::where('prefecture_id', $prefectureId)->pluck('display_name', 'id')->all());
        }

        $initSelect2 = $this->initSelect2Options($cities);

        return response()->json($initSelect2);
    }
}
