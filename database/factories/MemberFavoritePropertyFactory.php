<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Member;
use App\Models\Property;
use Faker\Generator as Faker;
use App\Models\MemberFavoriteProperty;

$factory->define(MemberFavoriteProperty::class, function (Faker $faker) {
    return [
        'member_id' => Member::all()->random()->id,
        'property_id' => Property::all()->random()->id,
    ];
});
