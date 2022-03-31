<?php

namespace App\Models;

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
use Illuminate\Database\Eloquent\SoftDeletes;
use TsuboHelper;

class Property extends Model
{
    use SoftDeletes;
    const FURNISHED = 0;
    const SKELETON = 1;

    const FURNISHED_JP_LABEL = 'スケルトン物件';
    const SKELETON_JP_LABEL = '居抜き物件';

    protected $appends = [
        'tsubo', 'man', 'man_per_tsubo'
    ];
    protected $fillable = [
        'user_id',
        'postcode_id',
        'prefecture_id',
        'city_id',
        'location',
        'publication_status_id',
        'publication_date',
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

    public function prefecture()
    {
        return $this->belongsTo(Prefecture::class);
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

    public function stations()
    {
        return $this->belongsToMany(Station::class, 'properties_stations');
    }

    public function property_preferences()
    {
        return $this->belongsToMany(PropertyPreference::class, 'properties_property_preferences', 'properties_id', 'property_preferences_id');
    }

    public function permitted_activities()
    {
        return $this->belongsToMany(PermittedActivity::class, 'properties_permitted_activities', 'properties_id');
    }

    public function property_stations()
    {
        return $this->hasMany(PropertiesStations::class, 'property_id');
    }

    public function properties_property_preferences()
    {
        return $this->hasMany(PropertiesPropertyPreference::class, 'properties_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function plans()
    {
        return $this->belongsToMany(Plan::class, 'properties_plans');
    }

    public function property_plans()
    {
        return $this->hasMany(PropertyPlan::class, 'property_id');
    }

    public function scopeRangeArea($query, $min, $max, $column){
         // ------------------------------------------------------------------
        // Minimum property
        // ------------------------------------------------------------------
        if (!empty($min) && empty($max)) {
            $query->where($column, '>=', $min);
        }
        // ------------------------------------------------------------------
        // Maximum property
        // ------------------------------------------------------------------
        if (!empty($max) && empty($min)) {
            $query->where($column, '<=', $max);
        }
        // ------------------------------------------------------------------
        // Between property
        // ------------------------------------------------------------------
        if (!empty($min) && !empty($max)) {
            if ($min > $max) {
                $query->where('id', "-1");
                return $query;
            }
            $query->whereBetween($column, [$min, $max]);
        }
        return $query;
    }
    public function getTsuboAttribute()
    {
        if($this->surface_area !=null){
            $result = toTsubo($this->surface_area);
            return $result . '坪';
        } else {
            return 0;
        }
    }

    public function getManAttribute()
    {
        if($this->rent_amount != null){
            $result = toMan($this->rent_amount);
            return $result . '万円';
        } else {
            return 0;
        }
    }

    public function getManPerTsuboAttribute()
    {
        if($this->rent_amount != null && $this->surface_area != null){
            $result = round(toMan($this->rent_amount) / toTsubo($this->surface_area));
            return $result;
        } else {
            return 0;
        }

    }
}
