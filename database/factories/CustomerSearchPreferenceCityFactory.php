<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CustomerSearchPreferenceCity;
use App\Models\City;
use App\Models\CustomerSearchPreference;
use Faker\Generator as Faker;

$factory->define(CustomerSearchPreferenceCity::class, function (Faker $faker) {
    return [
        'customer_search_preference_id' => CustomerSearchPreference::all()->pluck('id')->random(),
        'city_id' => City::all()->pluck('id')->random()
    ];
});
