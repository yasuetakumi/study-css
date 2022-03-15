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

    public function customer_search_preferences()
    {
        return $this->belongsToMany(CustomerSearchPreference::class, 'customer_search_preferences_floor_aboves', 'floor_above_id');
    }
}
