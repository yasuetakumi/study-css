<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Carbon\Carbon;
use App\Models\City;
use App\Models\PropertyType;
use Faker\Generator as Faker;
use App\Models\RentPriceOption;
use App\Models\CustomerSearchPreference;
use App\Models\SurfaceAreaOption;
use App\Models\PropertyPreference;
use App\Models\TransferPriceOption;
use App\Models\NumberOfFloorsAboveGround;
use App\Models\NumberOfFloorsUnderGround;
use App\Models\CustomerSkeletonPreference;
use App\Models\WalkingDistanceFromStationOption;

$factory->define(CustomerSearchPreference::class, function (Faker $faker) {
    $getSurfaceMax = fromTsubo(SurfaceAreaOption::all()->pluck('value')->random());
    $getSurfaceMin = fromTsubo(SurfaceAreaOption::where('value', '<=', toTsubo($getSurfaceMax))->pluck('value')->random());

    $getRentMin = fromMan(RentPriceOption::all()->pluck('value')->random());
    $rent_amount = [100,150,200,250,300,350,400,450,500];

    $getRentMax = fromMan(RentPriceOption::where('value','>=', toTsubo($getRentMin))->pluck('value')->random());

    $getTransferMin = TransferPriceOption::all()->pluck('value')->random();
    $getTransferMax = TransferPriceOption::where('value', '>=', toTsubo($getTransferMin))->pluck('value')->random();

    $getFloorUnder = NumberOfFloorsUnderGround::all()->pluck('id')->random();
    $getFloorAbove = NumberOfFloorsAboveGround::where('id', '>=', $getFloorUnder)->pluck('id')->random();

    return [
        'customer_email' => $faker->email,
        'is_email_enabled' => rand(0,1),
        'city_id' => City::all()->pluck('id')->random(),
        'surface_min' => $getSurfaceMin,
        'surface_max' => $getSurfaceMax,
        'rent_amount_min' => $getRentMin,
        'rent_amount_max' => $getRentMax,
        'freetext' => $faker->name,
        'walking_distance' => WalkingDistanceFromStationOption::all()->pluck('id')->random(),
        'transfer_price_min' => $getTransferMin,
        'transfer_price_max' => $getTransferMax,
        'floor_under' => $getFloorUnder,
        'floor_above' => $getFloorAbove,
        'property_preference' => PropertyPreference::all()->pluck('id')->random(),
        'property_type' => PropertyType::all()->pluck('id')->random(),
        'skeleton_id' => CustomerSkeletonPreference::all()->pluck('id')->random(),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});
