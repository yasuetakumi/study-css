<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StationsLine extends Model
{
    protected $fillable = [
        'code',
        'display_name',
    ];

    public function stations()
    {
        return $this->hasMany(Station::class);
    }
}
