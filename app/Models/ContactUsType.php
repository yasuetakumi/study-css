<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUsType extends Model
{
    const HOW_TO = 1;
	const FORGOT_EMAIL = 101;
	const PROPERTY_INQUIRY = 901;

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
