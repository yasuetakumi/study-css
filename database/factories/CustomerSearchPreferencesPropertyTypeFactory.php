<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\CustomerSearchPreference;
use App\Models\CustomerSearchPreferencesPropertyType;
use App\Models\PropertyType;

$factory->define(CustomerSearchPreferencesPropertyType::class, function (Faker $faker) {
    return [
        'customer_search_preference_id' => CustomerSearchPreference::all()->pluck('id')->random(),
        'property_type_id' => PropertyType::all()->pluck('id')->random()
    ];
});
