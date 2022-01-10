<?php

namespace App;

use App\Models\BusinessTerm;
use App\Models\Cuisine;
use App\Models\NumberOfFloorsAboveGround;
use App\Models\NumberOfFloorsUnderGround;
use App\Models\Postcode;
use App\Models\Prefecture;
use App\Models\PropertyPreference;
use App\Models\PropertyType;
use App\Models\RentPriceOption;
use App\Models\Station;
use App\Models\Structure;
use App\Models\SurfaceAreaOption;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'users_id',
        'postcode_id',
        'prefecture_id',
        'location',
        'surface_area',
        'rent_amount',
        'number_of_floors_under_ground',
        'number_of_floors_above_ground',
        'property_type_id',
        'structure_id',
        'deposit_amount',
        'monthly_maintainance_fee',
        'repayment',
        'date_built',
        'renewal_fee',
        'contract_length_in_months',
        'special_moving_fee',
        'business_terms_id',
        'comment',
        'is_skeleton',
        'cuisine_id',
        'interior_transfer_price',
        'thumbnail_image_main',
        'thumbnail_image_1',
        'thumbnail_image_2',
        'thumbnail_image_3',
        'thumbnail_image_4',
        'thumbnail_image_5',
        'thumbnail_image_6',
        'image_1',
        'image_2',
        'image_3',
        'image_4',
        'image_5',
        'image_6',
        'image_7',
        'image_8',
        'image_9',
        'image_10',
        'image_360_1',
        'image_360_2',
        'image_360_3',
        'image_360_4',
        'image_360_5'
    ];

    public function postcode()
    {
        return $this->belongsTo(Postcode::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function prefectures()
    {
        return $this->belongsTo(Prefecture::class);
    }

    public function rent_amount()
    {
        return $this->belongsTo(RentPriceOption::class);
    }

    public function floor_underground()
    {
        return $this->belongsTo(NumberOfFloorsUnderGround::class);
    }

    public function floor_aboveground()
    {
        return $this->belongsTo(NumberOfFloorsAboveGround::class);
    }

    public function property_type()
    {
        return $this->belongsTo(PropertyType::class);
    }

    public function structure()
    {
        return $this->belongsTo(Structure::class);
    }

    public function business_term()
    {
        return $this->belongsTo(BusinessTerm::class);
    }

    public function cuisine()
    {
        return $this->belongsTo(Cuisine::class);
    }

    public function surface_area()
    {
        return $this->belongsTo(SurfaceAreaOption::class);
    }

    public function stations()
    {
        return $this->belongsToMany(Station::class, 'properties_stations');
    }

    public function property_preferences()
    {
        return $this->belongsToMany(PropertyPreference::class, 'properties_property_preferences');
    }

    public function permitted_activities()
    {
        return $this->belongsToMany(PermittedActivity::class, 'properties_permitted_activities');
    }
}
