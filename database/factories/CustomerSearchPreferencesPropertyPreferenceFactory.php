<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\PropertyPreference;
use App\Models\CustomerSearchPreference;
use App\Models\CustomerSearchPreferencesPropertyPreference;

$factory->define(CustomerSearchPreferencesPropertyPreference::class, function (Faker $faker) {
    return [
        'customer_search_preference_id' => CustomerSearchPreference::all()->pluck('id')->random(),
        'property_preference_id' => PropertyPreference::all()->pluck('id')->random()
    ];
});
