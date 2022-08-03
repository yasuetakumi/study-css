<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Carbon\Carbon;
use App\Models\Property;
use App\Models\PropertyPublicationStatus;
use Faker\Generator as Faker;
use App\Models\PropertyPublicationStatusPeriod;

$factory->define(PropertyPublicationStatusPeriod::class, function (Faker $faker) {
    // $property = Property::pluck('id')->all();
    return [
        'property_id' => Property::all()->pluck('id')->random(),
        'status_start_date' => Carbon::now()->format("Y-m-d"),
        'status_end_date' => Carbon::now()->format("Y-m-d"),
        'is_current_status' => rand(0,1),
        'remaining_publication_days' => rand(1,120),
        'publication_status_id' => PropertyPublicationStatus::all()->pluck('id')->random(),
    ];
});
