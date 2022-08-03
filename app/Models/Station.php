<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    protected $fillable = [
        'code',
        'display_name',
        'prefecture_id',
        'station_line_id',
        'station_g_cd',
    ];

    public function prefecture()
    {
        return $this->belongsTo(Prefecture::class);
    }

    public function station_line()
    {
        return $this->belongsTo(StationsLine::class);
    }

    public function properties()
    {
        return $this->belongsToMany(Property::class, 'properties_stations');
    }


}
