<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransferPriceOption extends Model
{
    protected $fillable = [
        'value',
        'label_en',
        'label_jp'
    ];


}
