<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyPreference extends Model
{
    protected $fillable = [
        'label_en',
        'label_jp'
    ];

    public function properties()
    {
        return $this->belongsToMany(Property::class, 'properties_property_preferences', 'property_preferences_id');
    }
}
