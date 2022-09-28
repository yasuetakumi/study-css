<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Carbon\Carbon;
use App\Models\City;
use App\Models\Member;
use App\Models\PropertyType;
use Faker\Generator as Faker;
use App\Models\RentPriceOption;
use App\Models\SurfaceAreaOption;
use App\Models\PropertyPreference;
use App\Models\TransferPriceOption;
use App\Models\CustomerSearchPreference;
use App\Models\NumberOfFloorsAboveGround;
use App\Models\NumberOfFloorsUnderGround;
use App\Models\CustomerSkeletonPreference;
use App\Models\WalkingDistanceFromStationOption;

$factory->define(CustomerSearchPreference::class, function (Faker $faker) {
    $getSurfaceMax = SurfaceAreaOption::all()->pluck('value')->random();
    $getSurfaceMin = SurfaceAreaOption::where('value', '<=', $getSurfaceMax)->pluck('value')->random();

    $getRentMin = RentPriceOption::all()->pluck('value')->random();
    $getRentMax = RentPriceOption::where('value','>=', $getRentMin)->pluck('value')->random();

    $getTransferMin = TransferPriceOption::all()->pluck('value')->random();
    $getTransferMax = TransferPriceOption::where('value', '>=', toTsubo($getTransferMin))->pluck('value')->random();

    $getFloorUnder = NumberOfFloorsUnderGround::all()->pluck('id')->random();
    $getFloorAbove = NumberOfFloorsAboveGround::where('id', '>=', $getFloorUnder)->pluck('id')->random();

    $getMember = Member::all()->pluck('id')->random();

    $arrMember = [$getMember, null];

    return [
        'member_id' => $arrMember[array_rand($arrMember)],
        'customer_email' => $faker->email,
        'is_email_enabled' => rand(0,1),
        'surface_min' => fromTsubo($getSurfaceMin),
        'surface_max' => fromTsubo($getSurfaceMax),
        'rent_amount_min' => fromMan($getRentMin),
        'rent_amount_max' => fromMan($getRentMax),
        'freetext' => $faker->name,
        'walking_distance' => WalkingDistanceFromStationOption::all()->pluck('id')->random(),
        'transfer_price_min' => fromMan($getTransferMin),
        'transfer_price_max' => fromMan($getTransferMax),
        'skeleton_id' => CustomerSkeletonPreference::all()->pluck('id')->random(),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});
