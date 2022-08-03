<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\CustomerSearchPreference;
use App\Models\CustomerSearchPreferencesFloorUnder;
use App\Models\NumberOfFloorsUnderGround;

$factory->define(CustomerSearchPreferencesFloorUnder::class, function (Faker $faker) {
    return [
        'customer_search_preference_id' => CustomerSearchPreference::all()->pluck('id')->random(),
        'floor_under_id' => NumberOfFloorsUnderGround::all()->pluck('id')->random()
    ];
});
