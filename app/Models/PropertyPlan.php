<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropertyPlan extends Model
{
    use SoftDeletes;
    protected $table = 'properties_plans';
    public $timestamps = true;
    protected $fillable = ['plan_id', 'property_id'];

    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }

}
