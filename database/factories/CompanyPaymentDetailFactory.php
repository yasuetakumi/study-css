<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Carbon\Carbon;
use App\Models\Company;
use Faker\Generator as Faker;
use App\Models\SubscriptionPlan;
use App\Models\CompanyPaymentDetail;

$factory->define(CompanyPaymentDetail::class, function (Faker $faker) {
    $dateMax = strtotime('31 December 2024');
    $dateMin = strtotime('31 December 2022');
    $dateRandom = mt_rand($dateMin, $dateMax);
    $date = date("Y-m-d", $dateRandom);
    $timestamp = date("Y-m-d H:i:s", mt_rand(strtotime('1 January 2022'), strtotime('31 December 2022')));
    return [
        'company_id' => Company::all()->pluck('id')->random(),
        'subscription_plan_id' => SubscriptionPlan::all()->pluck('id')->random(),
        'card_number' => $faker->creditCardNumber,
        'card_security_number' => rand(10000, 99999),
        'cardholder_name' => $faker->name,
        'card_brand' => $faker->creditCardType,
        'card_expires_at' => $date,
        'stripe_checkout_token' => null,
        'subscription_expires_at' => $timestamp

    ];
});
