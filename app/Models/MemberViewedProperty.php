<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberViewedProperty extends Model
{

    protected $fillable = [
        'member_id',
        'property_id',
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
