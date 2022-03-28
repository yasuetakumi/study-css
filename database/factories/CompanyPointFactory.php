<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Company;
use App\Models\CompanyPoint;
use App\Models\PointType;
use Faker\Generator as Faker;
use Intervention\Image\Point;

$factory->define(CompanyPoint::class, function (Faker $faker) {
    return [
        'company_id' => Company::all()->pluck('id')->random(),
        'point_type_id' => PointType::all()->pluck('id')->random(),
    ];
});
