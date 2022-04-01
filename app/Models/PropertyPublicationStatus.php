<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyPublicationStatus extends Model {
    const NOT_PUBLISHED_LABEL_JP = '非掲載';
    const PUBLISHED_LABEL_JP = '掲載';

    const NOT_PUBLISHED_LABEL_EN = 'NOT_PUBLISHED';
    const PUBLISHED_LABEL_EN = 'PUBLISHED';

    protected $fillable = [
        'label_en',
        'label_jp'
    ];

    public function property_publication_status_period()
    {
        return $this->hasMany(PropertyPublicationStatusPeriod::class, 'publication_status_id');
    }
}
