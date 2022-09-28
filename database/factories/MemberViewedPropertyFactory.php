<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Member;
use App\Models\Property;
use Faker\Generator as Faker;
use App\Models\MemberViewedProperty;

$factory->define(MemberViewedProperty::class, function (Faker $faker) {
    return [
        'member_id' => Member::all()->random()->id,
        'property_id' => Property::all()->random()->id,
    ];
});
