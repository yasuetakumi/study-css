<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    protected $fillable = [
        'label_en',
        'label_jp'
    ];

    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
