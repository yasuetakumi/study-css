<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\DatatablesHelper;
use App\Models\LogActivity;

class LogUserFailController extends Controller
{
    public function show( $param ){
        if( $param == 'json' ){
            $model = LogActivity::whereNull('admin_id')
                               ->whereNull('user_id');

            return (new Datatableshelper)->instance($model, false, false)->toJson();
        }
        abort(404);
    }

    public function index(){
        $data['page_title'] = __('label.log_activity').__('label.login_fail'). __('label.list');
        return view('backend.logactivity.index_user_fail', $data);
    }
}
