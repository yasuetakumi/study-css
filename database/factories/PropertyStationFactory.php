<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Property;
use App\Models\Station;
use App\Models\WalkingDistanceFromStationOption;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(\App\Models\PropertiesStations::class, function (Faker $faker) {
    $targetPrefectureId = Property::select("prefecture_id")->inRandomOrder()->first()->prefecture_id;
    return [
        'station_id'       => Station::select("id")->where("prefecture_id",$targetPrefectureId)->inRandomOrder()->first()->id,
        'property_id'      => Property::select("id")->where("prefecture_id",$targetPrefectureId)->inRandomOrder()->first()->id,
        'distance_from_station' => WalkingDistanceFromStationOption::select("id")->pluck('id')->random(),
        'created_at'        => Carbon::now(),
    ];
});
