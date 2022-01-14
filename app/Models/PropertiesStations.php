<?php

namespace App\Models;

use App\Models\WalkingDistanceFromStationOption;
use Illuminate\Database\Eloquent\Model;

class PropertiesStations extends Model
{
    protected $fillable = [
        'station_id',
        'property_id',
        'distance_from_station',
    ];

    public function walking_distance(){
        return $this->belongsTo(WalkingDistanceFromStationOption::class, 'distance_from_station');
    }
}
