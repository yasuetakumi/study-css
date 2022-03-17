<?php

namespace App\Http\Controllers\Frontend;

use stdClass;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Select2AjaxHelper;
use App\Traits\CommonToolsTraits;

//models used
use App\Models\Postcode;

class EstateController extends Controller
{
    use CommonToolsTraits;

    protected function validator( array $data, $type ){
        return Validator::make($data, [
            'name'         => 'required',
            'name_kana'    => 'required',
        ]);
    }

    public function create(){
        $data['page_title']     = '会員 （不動産業者） 登録申し込み';
        $data['item']           = new StdClass();
        $data['form_action']    = route('company.store');

        // options for vue select 2 options
        $data['prefecture_options']     = Postcode::groupBy('prefecture')->pluck('prefecture', 'prefecture');

        return view('frontend.estate.index', $data);
    }

    public function confirm(Request $request){
        $data = $request->all();
        $this->validator($data, 'create')->validate();
        return response()->json($data, 200);  
    }

    public function store(Request $request){
        $data = $request->all();

        $new = new News();
        $new->fill($data)->save();
        return redirect()->route('frontend.estate.index')->with('success', __('label.SUCCESS_CREATE_MESSAGE'));
    }
}
