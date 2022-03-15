<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerSearchPreferencesPropertyPreference extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'customer_search_preference_id',
        'property_preference_id'
    ];

    public function customer_search_preference()
    {
        return $this->belongsTo(CustomerSearchPreference::class, 'customer_search_preference_id');
    }
}
