<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Carbon\Carbon;
use App\Models\Property;
use Faker\Generator as Faker;
use App\Models\PropertyPreference;

$factory->define(\App\Models\PropertiesPropertyPreference::class, function (Faker $faker) {
    return [
        'properties_id'             => Property::all()->pluck('id')->random(),
        'property_preferences_id'   => PropertyPreference::all()->pluck('id')->random(),
        'created_at'                => Carbon::now(),
    ];
});
