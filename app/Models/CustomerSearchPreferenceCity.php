<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerSearchPreferenceCity extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'customer_search_preference_id',
        'city_id'
    ];

    public function customer_search_preference()
    {
        return $this->belongsTo(CustomerSearchPreference::class, 'customer_search_preference_id');
    }
}
