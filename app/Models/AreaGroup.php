<?php

namespace App\Models;

use App\Models\Plan;
use Illuminate\Database\Eloquent\Model;

class AreaGroup extends Model
{
    protected $fillable = [
        'display_name',
    ];

    public function plans()
    {
        return $this->hasMany(Plan::class);
    }
}
