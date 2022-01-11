<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertiesPermittedActivities extends Model
{
    protected $table = 'properties_permitted_activities';

    protected $fillable = [
        'properties_id',
        'permitted_activities_id'
    ];
}
