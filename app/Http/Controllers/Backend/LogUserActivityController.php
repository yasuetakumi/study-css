<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\DatatablesHelper;
use App\Http\Controllers\Controller;
use App\Models\LogActivity;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LogUserActivityController extends Controller
{
    public function show( Request $request , $param ){
        if( $param == 'json' ){
            $model = LogActivity::with('user')->has('user')->where('activity', '=', 'User login succeed');

            // // Exclude filter conditions
            if($request->has('columns')){
                $columns = $request->get('columns');
                foreach( $columns as $column ){
                    // [hint] Please implement here if you need custom filter by each filter.
                    if( $column['data'] == 'formatted_access_time' ){
                        if(!empty($column['search']['value'])){
                            //Ex: 2020-09/11 00:09 - 2020/10/06 23:10
                            $filter_access_time = explode(' - ',$column['search']['value']);
                            // Log::debug($filter_access_time);
                            $model = $model ->where('access_time','>=',$filter_access_time[0])
                                            ->where('access_time','<=',$filter_access_time[1]);
                        }
                    }
                }
            }

            \DB::enableQueryLog();
            $result = (new DatatablesHelper)->instance($model, false, false)
                                            // example custom filter
                                            ->addColumn('formatted_access_time', function($query){
                                                return date('Y/m/d h:i', strtotime($query->access_time) );
                                            })
                                            ->filterColumn('user.display_name', function($query, $keyword){
                                                $query->whereHas('user', function($q) use ($keyword){
                                                    $q->where('display_name', 'like', '%'.$keyword.'%');
                                                });
                                            })
                                            ->filterColumn('user.email', function($query, $keyword){
                                                $query->whereHas('user', function($q) use ($keyword){
                                                    $q->where('email', 'like', '%'.$keyword.'%');
                                                });
                                            })
                                            ->toJson();

            \Log::debug(\DB::getQueryLog());
            \DB::disableQueryLog();
            return $result;
        }
        abort(404);
    }

    public function index(){
        $data['page_title'] = __('label.log_activity').__('label.user'). __('label.list');
        return view('backend.logactivity.index_user', $data);
    }
}
