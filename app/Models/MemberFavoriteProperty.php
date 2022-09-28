<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberFavoriteProperty extends Model
{

    protected $fillable = [
        'member_id',
        'property_id',
        'distance'
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
