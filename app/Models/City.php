<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'name',
        'display_name',
        'prefecture_id',
        'created_at',
        'updated_at'
    ];

    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
