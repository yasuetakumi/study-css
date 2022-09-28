<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberFavoriteProperty extends Model
{

    protected $with = [
        'date_added',
    ];

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

    public function getDateAddedAttribute()
    {
        return $this->created_at->format('Y/m/d H:i:s');
    }
}
