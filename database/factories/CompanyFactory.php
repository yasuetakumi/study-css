<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(App\Models\Company::class, function(Faker $faker){

    $hkFaker = \Faker\Factory::create('en_HK');
    $companyName = $faker->company;
    $statuses = collect(['active', 'pending']);

    return [
        'company_name'      => $companyName,
        'company_name_kana' => $companyName,
        'agent_license_name' => "{$faker->city} 知事免許",
        'agent_license_renewals' => $faker->numerify('##'),
        'agent_license_number' => $faker->numerify('######'),
        'post_code' => rand(1000000, 9999999),
        'address' => $faker->address,
        'phone' => $faker->e164PhoneNumber,
        'fax' => $faker->url,
        'url' => $hkFaker->faxNumber,
        'status' => $statuses->random(),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ];
});
