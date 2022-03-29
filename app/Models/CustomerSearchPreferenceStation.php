<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerSearchPreferenceStation extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'customer_search_preference_id',
        'station_id'
    ];
}
