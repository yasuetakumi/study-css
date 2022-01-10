<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurfaceAreaOption extends Model
{
    protected $fillable = [
        'value',
        'label_en',
        'label_jp'
    ];

    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
