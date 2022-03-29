<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CustomerSearchPreferenceCuisine;
use App\Models\CustomerSearchPreference;
use App\Models\Cuisine;

use Faker\Generator as Faker;

$factory->define(CustomerSearchPreferenceCuisine::class, function (Faker $faker) {
    return [
        'customer_search_preference_id' => CustomerSearchPreference::all()->pluck('id')->random(),
        'cuisine_id' => Cuisine::all()->pluck('id')->random()
    ];
});
