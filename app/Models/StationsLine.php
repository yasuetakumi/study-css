<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StationsLine extends Model
{
    protected $table = 'stations_lines';
    protected $fillable = [
        'code',
        'display_name',
    ];

    public function stations()
    {
        return $this->hasMany(Station::class);
    }
}
