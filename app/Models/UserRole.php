<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    // const values : Please use this if it need to refer on source-code(logic).
    const ROLE_SUPERVISOR = 1;
    const ROLE_OPERATOR = 2;

    const LABEL_SUPERVISOR_JP = '管理者';
    const LABEL_OPERATOR_JP = '通常';

    const USER_ROLES = [
        self::ROLE_SUPERVISOR => self::LABEL_SUPERVISOR_JP,
        self::ROLE_OPERATOR => self::LABEL_OPERATOR_JP,
    ];

    public $timestamps = false;

    protected $fillable = [
        'name',
        'label'
    ];

    public function user(){
        return $this->hasMany('App\Models\User');
    }
}
