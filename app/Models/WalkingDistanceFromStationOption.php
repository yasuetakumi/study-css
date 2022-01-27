<?php

namespace App\Models;

use App\PropertiesStations;
use Illuminate\Database\Eloquent\Model;

class WalkingDistanceFromStationOption extends Model
{
    protected $fillable = [
        'value',
        'label_en',
        'label_jp'
    ];

    public function property_stations()
    {
        return $this->hasMany(PropertiesStations::class);
    }
}
