<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ErrorLog extends Model
{
    public $timestamps = false;

    protected $fillable =[
        'message',
        'stack_trace',
    ];

    public function admin(){
        return $this->belongsTo('App\Models\Admin');
    }

    public function getDisplayNameAttribute()
    {
        return $this->admin()->first()->display_name;
    }
}
