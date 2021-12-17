<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    // const values : Please use this if it need to refer on source-code(logic).
    const ROLE_SUPERVISOR = 1;
    const ROLE_OPERATOR = 2;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'label'
    ];

    public function user(){
        return $this->hasMany('App\Models\User');
    }
}
