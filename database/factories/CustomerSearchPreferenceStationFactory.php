<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CustomerSearchPreferenceStation;
use App\Models\CustomerSearchPreference;
use App\Models\Station;

use Faker\Generator as Faker;

$factory->define(CustomerSearchPreferenceStation::class, function (Faker $faker) {
    return [
        'customer_search_preference_id' => CustomerSearchPreference::all()->pluck('id')->random(),
        'station_id' => Station::all()->pluck('id')->random()
    ];
});
