<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUsType extends Model
{
    const ASK_PROPERTY_DETAILS = 1;
	const ASK_PROPERTY_ENVIRONMENT = 2;
	const ASK_VISIT_PROPERTY = 3;
    const OTHER = 4;

	protected $table = 'contact_us_types';
	public $incrementing = false;

	protected $casts = [
		'id' => 'int'
	];

	protected $fillable = [
		'label_en',
        'label_jp'
	];

	public function customer_inquiries()
	{
		return $this->hasMany(CustomerInquiry::class, 'contact_us_type_id');
	}
}
