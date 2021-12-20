<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogActivity extends Model
{
    public $timestamps = false;

    protected $appends  = ['display_name'];

    protected $fillable =[
        'admin_id',
        'user_id',
        'activity',
        'detail',
        'ip',
        'access_time'
    ];

    public function admin(){
        return $this->belongsTo('App\Models\Admin');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function get_current_user(){
        if( !empty($this->admin_id) ){
            $user_obj = $this->admin()->first();
            if(!empty($user_obj)){
                return $user_obj;
            }
        } else if( !empty($this->user_id) ){
            $user_obj = $this->user()->first();
            if(!empty($user_obj)){
                return $user_obj;
            }
        }
        return null;
    }

    public function getDisplayNameAttribute()
    {
        $user_obj = $this->get_current_user();

        if(!empty($user_obj)){
            // Success
            return $user_obj->display_name;
        }else{
            // Failed
            if( !empty($this->admin_id) ){
                return "[removed admin]";
            } else if( !empty($this->user_id) ){
                return "[removed user]";
            }else{
                // Ex: when login failed
                return "-";
            }
        }
        // * never reach
        return "guest";
    }
}
