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
        'name_kana',
        'phone_number',
        'email',
        'password',
        'line_id',
        'remember_token',
        'is_line_notification_enabled',
        'is_email_notification_enabled'
    ];

    public function socialAccounts()
    {
        return $this->hasMany(SocialAccount::class);
    }

}
