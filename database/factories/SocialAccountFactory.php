<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Member;
use Illuminate\Support\Str;
use App\Models\SocialAccount;
use Faker\Generator as Faker;

$factory->define(SocialAccount::class, function (Faker $faker) {
    return [
        'member_id' => Member::all()->random()->id,
        'provider_name' => $faker->randomElement(['facebook', 'twitter', 'line']),
        'provider_id' => Str::random(21),
    ];
});
