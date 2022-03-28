<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyPoint extends Model
{
    use SoftDeletes;
    protected $fillable = [
		'company_id',
		'point_type_id',
	];

    public function company()
    {
        $this->belongsTo(Company::class);
    }

    public function point_type()
    {
        $this->belongsTo(PointType::class);
    }
}
