<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Member extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
    // These traits are used for admin login authentication
    use Authenticatable, Authorizable, CanResetPassword, Notifiable, SoftDeletes;

    const ID_ENABLE_NOTIF = 1;
    const ID_DISABLE_NOTIF = 0;

    const ID_ENABLE_NOTIF_LABEL = '有効';
    const ID_DISABLE_NOTIF_LABEL = '無効';

    protected $hidden   = [
        'password',
        'remember_token'
    ];

    protected $fillable = [
        'company_name',
        'name',
        'name_kana',
        'phone_number',
        'email',
        'password',
        'nonce',
        'line_id',
        'remember_token',
        'is_line_notification_enabled',
        'is_email_notification_enabled'
    ];

    public function socialAccounts()
    {
        return $this->hasMany(SocialAccount::class);
    }

    public function member_viewed_properties()
    {
        return $this->hasMany(MemberViewedProperty::class, 'member_id');
    }

}
