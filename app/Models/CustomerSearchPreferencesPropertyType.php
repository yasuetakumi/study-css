<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerSearchPreferencesPropertyType extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'customer_search_preference_id',
        'property_type_id'
    ];

    public function customer_search_preference()
    {
        return $this->belongsTo(CustomerSearchPreference::class, 'customer_search_preference_id');
    }

    public function property_type()
    {
        return $this->belongsTo(PropertyType::class, 'property_type_id');
    }
}
