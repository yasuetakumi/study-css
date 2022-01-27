<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prefecture extends Model
{
    protected $fillable = [
        'area_id',
        'name',
        'display_name'
    ];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
