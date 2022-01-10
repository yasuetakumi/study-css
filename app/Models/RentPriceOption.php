<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RentPriceOption extends Model
{
    protected $table = 'rent_price_options';

    protected $fillable = [
        'value',
        'label_en',
        'label_jp'
    ];

    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
