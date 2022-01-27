<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertiesPropertyPreference extends Model
{
    protected $table = 'properties_property_preferences';
    protected $with = ['property_preferences'];
    protected $fillable = [
        'properties_id',
        'property_preferences_id'
    ];

    public function properties()
    {
        return $this->belongsTo(Property::class, 'properties_id');
    }

    public function property_preferences()
    {
        return $this->belongsTo(PropertyPreference::class, 'property_preferences_id');
    }
}
