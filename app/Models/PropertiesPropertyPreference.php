<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertiesPropertyPreference extends Model
{
    protected $table = 'properties_property_preferences';
    protected $fillable = [
        'properties_id',
        'property_preferences_id'
    ];
}
