<?php

namespace App\Models;

use App\PropertiesStations;
use Illuminate\Database\Eloquent\Model;

class WalkingDistanceFromStationOption extends Model
{
    const ID_1MINUTE = 1;
    const ID_3MINUTE = 2;
    const ID_5MINUTE = 3;
    const ID_10MINUTE = 4;
    const ID_15MINUTE = 5;
    const ID_16MINUTEORMORE = 6;

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
