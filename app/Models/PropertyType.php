<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    protected $fillable = [
        'label_en',
        'label_jp'
    ];

    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public function customer_search_preferences()
    {
        return $this->belongsToMany(CustomerSearchPreference::class, 'customer_search_preferences_property_types', 'property_type_id');
    }
}
