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
