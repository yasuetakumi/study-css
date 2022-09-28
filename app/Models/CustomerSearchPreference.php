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
        'member_id',
        'customer_email',
        'is_email_enabled',
        'surface_min',
        'surface_max',
        'rent_amount_min',
        'rent_amount_max',
        'name',
        'walking_distance',
        'transfer_price_min',
        'transfer_price_max',
        'skeleton_id',
    ];

    public function walking_distance_option()
    {
        return $this->belongsTo(WalkingDistanceFromStationOption::class, 'walking_distance');
    }

    public function skeleton()
    {
        return $this->belongsTo(CustomerSkeletonPreference::class, 'skeleton');
    }

    public function cities()
    {
        return $this->belongsToMany(City::class, 'customer_search_preference_cities');
    }

    public function stations()
    {
        return $this->belongsToMany(Station::class, 'customer_search_preference_stations');
    }

    public function abovegrounds()
    {
        return $this->belongsToMany(NumberOfFloorsAboveGround::class, 'customer_search_preferences_floor_aboves', 'customer_search_preference_id', 'floor_above_id');
    }

    public function undergrounds()
    {
        return $this->belongsToMany(NumberOfFloorsUnderGround::class, 'customer_search_preferences_floor_unders', 'customer_search_preference_id', 'floor_under_id');
    }

    public function property_preferences()
    {
        return $this->belongsToMany(PropertyPreference::class, 'customer_search_preferences_property_preferences');
    }

    public function property_types()
    {
        return $this->belongsToMany(PropertyType::class, 'customer_search_preferences_property_types');
    }

    public function cuisines()
    {
        return $this->belongsToMany(Cuisine::class, 'customer_search_preference_cuisines');
    }

}
