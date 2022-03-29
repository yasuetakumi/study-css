<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PointType extends Model
{
    protected $fillable = [
		'label_en',
		'label_jp',
	];
}
