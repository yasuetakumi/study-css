<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Property;
use App\Models\Station;
use App\Models\WalkingDistanceFromStationOption;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(\App\Models\PropertiesStations::class, function (Faker $faker) {
    return [
        'station_id'       => Station::all()->pluck('id')->random(),
        'property_id'      => Property::all()->pluck('id')->random(),
        'distance_from_station' => WalkingDistanceFromStationOption::all()->pluck('id')->random(),
        'created_at'        => Carbon::now(),
    ];
});
