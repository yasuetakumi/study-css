<?php

namespace App;

use App\Models\DesignPlanStatus;
use App\Models\TagArchitecture;
use App\Models\TagColor;
use App\Models\TagMood;
use App\Models\TagStyle;
use Illuminate\Database\Eloquent\Model;

class DesignStyle extends Model
{
    protected $fillable = [
        'display_name',
        'tag_architecture_id',
        'tag_color_id',
        'tag_mood_id',
        'tag_style_id',
        'design_plan_status_id',
        'description',
        'unit_price',
        'thumbnail_image',
        'perse_image_1',
        'perse_image_2',
        'perse_image_3',
        'perse_image_4',
        'perse_image_5',
        'image',
        'internal_id',
        'sort_order',
        'designer_name',
        'designer_url'
    ];

    public function tag_architecture()
    {
        return $this->belongsTo(TagArchitecture::class);
    }

    public function tag_color()
    {
        return $this->belongsTo(TagColor::class);
    }

    public function tag_mood()
    {
        return $this->belongsTo(TagMood::class);
    }

    public function tag_style()
    {
        return $this->belongsTo(TagStyle::class);
    }
    public function design_plan_status()
    {
        return $this->belongsTo(DesignPlanStatus::class);
    }

}
