<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerSearchPreferencesFloorUnder extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'customer_search_preference_id',
        'floor_under_id'
    ];

    public function customer_search_preference()
    {
        return $this->belongsTo(CustomerSearchPreference::class, 'customer_search_preference_id');
    }

    public function floor_under()
    {
        return $this->belongsTo(NumberOfFloorsUnderGround::class, 'floor_under_id');
    }
}
