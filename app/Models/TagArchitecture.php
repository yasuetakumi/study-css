<?php

namespace App\Models;

use App\DesignStyle;
use Illuminate\Database\Eloquent\Model;

class TagArchitecture extends Model
{
    protected $fillable = [
        'label_en',
        'label_jp'
    ];

    public function design_styles()
    {
        return $this->hasMany(DesignStyle::class);
    }
}
