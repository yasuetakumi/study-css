<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Carbon\Carbon;
use App\Models\Property;
use Faker\Generator as Faker;
use App\Models\PermittedActivity;

$factory->define(\App\Models\PropertiesPermittedActivities::class, function (Faker $faker) {
    return [
        'properties_id'             => Property::all()->pluck('id')->random(),
        'permitted_activities_id'   => PermittedActivity::all()->pluck('id')->random(),
        'created_at'                => Carbon::now(),
    ];
});
