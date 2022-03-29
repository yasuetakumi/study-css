<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerSkeletonPreference extends Model
{
    use SoftDeletes;
    const FURNISHED = 1;
    const SKELETON = 2;
    const FURNISHED_AND_SKELETON = 3;

    protected $fillable = [
        'label_en',
        'label_jp'
    ];

    public function customer_search_preferences()
    {
        return $this->hasMany(CustomerSearchPreference::class, 'skeleton');
    }
}
