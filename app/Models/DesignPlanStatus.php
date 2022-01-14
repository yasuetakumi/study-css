<?php

namespace App\Models;

use App\DesignStyle;
use App\Plan;
use Illuminate\Database\Eloquent\Model;

class DesignPlanStatus extends Model
{
    protected $fillable = [
        'label_en',
        'label_jp'
    ];

    public function plans()
    {
        return $this->hasMany(Plan::class);
    }

    public function design_styles()
    {
        return $this->hasMany(DesignStyle::class);
    }


}
