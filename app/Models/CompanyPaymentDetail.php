<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyPaymentDetail extends Model
{
    use SoftDeletes;
    protected $dates = [
        'card_expires_at'
    ];
    protected $fillable = [
		'company_id',
		'subscription_plan_id',
		'card_number',
		'card_security_number',
		'cardholder_name',
		'card_brand',
		'card_expires_at',
		'stripe_checkout_token',
        'subscription_expires_at',
        'stripe_customer_id',
	];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function subscription_plan()
    {
        return $this->belongsTo(SubscriptionPlan::class);
    }
}
