<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * SuperAdmin:
 *   -
 *
 */
class AdminRole extends Model
{
    // const values : Please use this if it need to refer on source-code(logic).
    const ROLE_SUPER_ADMIN = 1;
    const ROLE_GENERAL_ADMIN = 2;
    const ROLE_COMPANY_ADMIN = 3;

    public $timestamps = false;

    protected $fillable = [
        'display_name',
        'label'
    ];

    // relation has many rules for admin
    public function admin(){
        return $this->hasMany('App\Models\Admin');
    }
}
