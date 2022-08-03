<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyPreference extends Model
{
    const ROADSIDE = 1;
    const PARKING = 2;
    const SIGNBOARD = 3;
    const LATEST = 4;

    protected $fillable = [
        'label_en',
        'label_jp'
    ];

    public function properties()
    {
        return $this->belongsToMany(Property::class, 'properties_property_preferences', 'property_preferences_id');
    }

    public function customer_search_preferences()
    {
        return $this->belongsToMany(CustomerSearchPreference::class, 'customer_search_preferences_property_preferences', 'property_preference_id');
    }
}
