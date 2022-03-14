<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerSearchPreference extends Model
{
    use SoftDeletes;
    const ENABLE_EMAIL = 1;
    const DISABLE_EMAIL = 0;
    protected $fillable = [
        'customer_email',
        'is_email_enabled',
        'city_id',
        'surface_min',
        'surface_max',
        'rent_amount_min',
        'rent_amount_max',
        'name',
        'walking_distance',
        'transfer_price_min',
        'transfer_price_max',
        'floor_under',
        'floor_above',
        'property_preference',
        'property_type',
        'skeleton',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function walking_distance()
    {
        return $this->belongsTo(WalkingDistanceFromStationOption::class, 'walking_distance');
    }
    public function floor_under()
    {
        return $this->belongsTo(NumberOfFloorsUnderGround::class, 'floor_under');
    }
    public function floor_above()
    {
        return $this->belongsTo(NumberOfFloorsAboveGround::class, 'floor_above');
    }

    public function property_preference()
    {
        return $this->belongsTo(PropertyPreference::class, 'property_preference');
    }

    public function property_type()
    {
        return $this->belongsTo(PropertyType::class, 'property_type');
    }

    public function skeleton()
    {
        return $this->belongsTo(CustomerSkeletonPreference::class, 'skeleton');
    }

    public function cities()
    {
        return $this->belongsToMany(City::class, 'customer_search_preference_cities', 'customer_search_preference_id');
    }

    public function abovegrounds()
    {
        return $this->belongsToMany(NumberOfFloorsAboveGround::class, 'customer_search_preferences_floors_above', 'customer_search_preference_id');
    }

    public function undergrounds()
    {
        return $this->belongsToMany(NumberOfFloorsUnderGround::class, 'customer_search_preferences_floor_unders', 'customer_search_preference_id');
    }

    public function property_preferences()
    {
        return $this->belongsToMany(PropertyPreference::class, 'customer_search_preferences_property_preferences', 'customer_search_preference_id');
    }

    public function property_types()
    {
        return $this->belongsToMany(PropertyType::class, 'customer_search_preferences_property_types', 'customer_search_preference_id');
    }

}
