<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerSearchPreferenceCuisine extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'customer_search_preference_id',
        'cuisine_id'
    ];
}
