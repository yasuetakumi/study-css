<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use SoftDeletes;

    protected $hidden   = [
        'password',
        'remember_token'
    ];

    protected $fillable = [
        'company_name',
        'name',
        'name_furigana',
        'phone_number',
        'email',
        'password',
        'line_id',
        'remember_token',
    ];

    public function socialAccounts()
    {
        return $this->hasMany(SocialAccount::class);
    }

}
