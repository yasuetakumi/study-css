<?php

namespace App\Traits;

use App\Models\LogActivity;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

trait LogActivityTrait
{
    /**
     * saving admin logging to database.
     * @param $activity
     * @param $detail
     * @param $admin_id
     */
    private function saveLog($activity, $detail, $current_admin_id = null){
        $log = new LogActivity();

        if( Auth::guard('web')->check() ){
            $log->admin_id = Auth::user()->id;
        } else if( Auth::guard('user')->check() ){
            $log->user_id = Auth::guard('user')->user()->id;
        }

        $log->activity = $activity;
        $log->detail = $detail;
        $log->ip = $this->getUserIpAddr();
        $log->access_time = Carbon::now();
        $log->save();
    }

    // Function for get current ip address from user login
    public function getUserIpAddr(){
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
}
