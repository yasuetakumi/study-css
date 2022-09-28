<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Member;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Member::class, function (Faker $faker) {
    $fakerJp = \Faker\Factory::create('ja_JP');
    return [
        'company_name' => $faker->company,
        'name' => $faker->name,
        'name_kana' => $fakerJp->kanaName(),
        'phone_number' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'line_id' => $faker->unique()->userName,
        'remember_token' => Str::random(10),
    ];
});
