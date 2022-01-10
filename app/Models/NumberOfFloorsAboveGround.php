<?php

namespace App\Models;

use App\Property;
use Illuminate\Database\Eloquent\Model;

class NumberOfFloorsAboveGround extends Model
{
    protected $table = 'number_of_floors_abovegrounds';

    protected $fillable = [
        'label_en',
        'label_jp'
    ];

    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
