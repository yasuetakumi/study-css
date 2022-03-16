<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NumberOfFloorsUnderGround extends Model
{
    protected $table = 'number_of_floors_undergrounds';

    protected $fillable = [
        'label_en',
        'label_jp'
    ];

    public function customer_search_preferences()
    {
        return $this->belongsToMany(CustomerSearchPreference::class, 'customer_search_preferences_floor_unders', 'floor_under_id');
    }

}
