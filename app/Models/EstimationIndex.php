<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EstimationIndex extends Model
{
    use SoftDeletes;

    protected $table = 'estimation_indexes';

    protected $fillable = [
        'design_style_id',
        'plan_id',
        'design_name',
        'tsubo_area',
        'grand_total',
        'has_kitchen',
        'design_category_id'
    ];

    public function design_style()
    {
        return $this->belongsTo(DesignStyle::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
