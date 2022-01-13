<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermittedActivity extends Model
{
    protected $fillable = [
        'label_en',
        'label_jp'
    ];

    public function properties()
    {
        return $this->belongsToMany(Property::class, 'properties_permitted_activities');
    }
}
