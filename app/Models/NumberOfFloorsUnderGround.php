<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NumberOfFloorsUnderGround extends Model
{
    protected $table = 'number_of_floors_undergrounds';

    protected $fillable = [
        'label_en',
        'label_jp'
    ];

}
