<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropertyPublicationStatusPeriod extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'property_id',
        'status_start_date',
        'status_end_date',
        'is_current_status',
        'remaining_publication_days',
        'publication_status_id',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function publication_status()
    {
        return $this->belongsTo(PropertyPublicationStatus::class, 'publication_status_id');
    }
}
