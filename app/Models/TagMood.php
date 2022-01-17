<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TagMood extends Model
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
