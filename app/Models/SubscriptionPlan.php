<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model
{
    protected $fillable = [
		'label_en',
		'label_jp',
		'stripe_plan',
		'cost',
		'description',
	];

    public function company_payment_details()
    {
        return $this->hasMany(CompanyPaymentDetail::class);
    }
}
