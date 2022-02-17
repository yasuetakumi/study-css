<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Carbon\Carbon;
use App\Models\Plan;
use App\Models\Property;
use Faker\Generator as Faker;

$factory->define(\App\Models\PropertyPlan::class, function (Faker $faker) {
    return [
        'plan_id'       => Plan::all()->pluck('id')->random(),
        'property_id'   => Property::all()->pluck('id')->random(),
        'created_at'    => Carbon::now(),
    ];
});
