<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feature extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'company_id',
        'pdf_file',
        'body',
        'publish_date',
        'status',
        'radius',
        'image1',
        'image2',
        'image3',
        'video1',
        'video2',
        'video3',
    ];

    public function company(){
        return $this->belongsTo('App\Models\Company');
    }
}
