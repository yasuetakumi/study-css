<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\CustomerSearchPreference;
use App\Models\CustomerSearchPreferencesFloorAbove;
use App\Models\NumberOfFloorsAboveGround;

$factory->define(CustomerSearchPreferencesFloorAbove::class, function (Faker $faker) {
    return [
        'customer_search_preference_id' => CustomerSearchPreference::all()->pluck('id')->random(),
        'floor_above_id' => NumberOfFloorsAboveGround::all()->pluck('id')->random()
    ];
});
