<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerSearchPreference extends Model
{
    use SoftDeletes;
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
}
