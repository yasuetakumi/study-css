<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SocialAccount extends Model
{
    use SoftDeletes;

    protected $hidden   = [
        'password',
        'remember_token'
    ];

    protected $fillable = [
        'member_id',
        'provider_name',
        'provider_id',
        'remember_token',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
