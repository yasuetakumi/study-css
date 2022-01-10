<?php

namespace App\Models;

use App\Plan;
use Illuminate\Database\Eloquent\Model;

class Cuisine extends Model
{
    protected $fillable = [
        'label_en',
        'label_jp'
    ];

    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public function plans()
    {
        return $this->hasMany(Plan::class);
    }
}
