<?php

namespace App\Http\Controllers\API;

use App\Helpers\Select2AjaxHelper;
use App\Http\Controllers\Controller;
use App\Models\Postcode;
use Illuminate\Http\Request;

class ApiPostcodeController extends Controller
{
    public function address($postcode)
    {
        $item = Postcode::where('postcode', $postcode)->first();
        if($item){
            $address = $item->prefecture . $item->city . $item->local;
            $city = $item->city;
            $prefecture = $item->prefecture;
            $local = $item->local;
            return response()->json(['status' => 200, 'address' => $address, 'city' => $city, 'prefecture' => $prefecture, 'local' => $local]);
        }else{
            return response()->json(['status' => 201,
                                    'message' => __('label.postcode_notfound'),
                                ]);
        }
    }
    public function getPostcode()
    {
        return Select2AjaxHelper::set(Postcode::query(), 'id', 'postcode');
    }
}
