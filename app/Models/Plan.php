<?php

namespace App\Models;

use App\Models\AreaGroup;
use App\Models\Cuisine;
use App\Models\DesignPlanStatus;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'display_name',
        'area_group_id',
        'design_plan_status_id',
        'design_category_id',
        'area',
        'kitchen_area',
        'hole_area',
        'area_tsubo',
        'num_of_seats',
        'additional_price',
        'max_kitchen_staff',
        'max_hall_staff',
        'length_out_wall',
        'length_in_wall',
        'description',
        'internal_memo',
        'thumbnail_image',
        'image_1',
        'image_2',
        'image_3',
        'image_4',
        'image_5',
        'image_360',
        'kitchen_perse_image_1',
        'kitchen_perse_image_2',
        'kitchen_perse_image_3',
        'internal_id',
        'sort_order',

    ];

    public function area_group()
    {
        return $this->belongsTo(AreaGroup::class, 'area_group_id');
    }

    public function design_plan_status()
    {
        return $this->belongsTo(DesignPlanStatus::class);
    }

    public function design_category()
    {
        return $this->belongsTo(Cuisine::class);
    }

    public function properties()
    {
        return $this->belongsToMany(Property::class, 'properties_plans');
    }

    public function property_plans()
    {
        return $this->hasMany(PropertyPlan::class, 'plan_id');
    }
}
