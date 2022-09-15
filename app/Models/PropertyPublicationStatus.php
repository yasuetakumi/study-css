<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyPublicationStatus extends Model {
    const NOT_PUBLISHED_LABEL_JP = '非公開';
    const PUBLISHED_LABEL_JP = '公開';
    const LIMITED_PUBLISHED_LABEL_JP = '会員限定公開';

    const NOT_PUBLISHED_LABEL_EN = 'NOT_PUBLISHED';
    const PUBLISHED_LABEL_EN = 'PUBLISHED';
    const LIMITED_PUBLISHED_LABEL_EN = 'LIMITED_PUBLISHED';

    const ID_NOT_PUBLISHED = 1;
    const ID_PUBLISHED = 2;
    const ID_LIMITED_PUBLISHED = 3;


    protected $fillable = [
        'label_en',
        'label_jp'
    ];

    public function property_publication_status_period()
    {
        return $this->hasMany(PropertyPublicationStatusPeriod::class, 'publication_status_id');
    }
}
