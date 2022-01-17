<?php

namespace App\Models;

use App\Property;
use Illuminate\Database\Eloquent\Model;

class BusinessTerm extends Model
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
