<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerSkeletonPreference extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'label_en',
        'label_jp'
    ];

    public function customer_search_preferences()
    {
        return $this->hasMany(CustomerSearchPreference::class, 'skeleton');
    }
}
