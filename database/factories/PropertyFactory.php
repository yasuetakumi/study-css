<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Carbon\Carbon;
use App\Models\City;
use App\Models\Cuisine;
use App\Models\Prefecture;
use App\Models\PropertyPublicationStatus;
use App\Models\PropertyType;
use Faker\Generator as Faker;
use App\Models\RentPriceOption;
use App\Models\SurfaceAreaOption;

$factory->define(\App\Models\Property::class, function (Faker $faker) {
    $deposit_amount = [100,200,300,400,500,600,700,800,900,1000]; // man
    $prefecture_id = Prefecture::all()->pluck('id')->random();

    return [
        'user_id' => rand(1,10),
        'postcode_id' => rand(1, 100),
        'prefecture_id' => $prefecture_id,
        'city_id' => City::where('prefecture_id', $prefecture_id)->pluck('id')->random(),
        'location' => $faker->city,
        'publication_status_id' => PropertyPublicationStatus::ID_PUBLISHED,
        'surface_area'=> fromTsubo(rand(15,29)), //base on plan.design_category_id 1,2,3,4 has area tsubo 15 - 29, for matching between property.surface_area and property_plans.plan_id
        'rent_amount' => fromMan(RentPriceOption::all()->pluck('value')->random()),
        'number_of_floors_under_ground' => rand(0,7),
        'number_of_floors_above_ground' => rand(0,7),
        'property_type_id' => rand(1,3),
        'structure_id' => rand(1,5),
        'deposit_amount' => fromMan(array_rand($deposit_amount, 1)),
        'monthly_maintainance_fee' => fromMan(array_rand($deposit_amount, 1)),
        'repayment' => $faker->numerify('Repayment ###'),
        'date_built' => Carbon::now()->subMonths(rand(1,3))->subDays(rand(1,30)),
        'renewal_fee' => rand(100000,1000000),
        'contract_length_in_months' => rand(1,12),
        'special_moving_fee' => fromMan(array_rand($deposit_amount)),
        'business_terms_id' => rand(1,3),
        'comment' => $faker->paragraph,
        'is_skeleton' => rand(0,1),
        'cuisine_id' => Cuisine::all()->pluck('id')->random(),
        'interior_transfer_price' => fromMan(array_rand($deposit_amount, 1)),
        'thumbnail_image_main' => 'image1.jpg',
        'thumbnail_image_1' => 'image1.jpg',
        'thumbnail_image_2' => 'image2.jpg',
        'thumbnail_image_3' => 'image3.jpg',
        'thumbnail_image_4' => 'image4.jpg',
        'thumbnail_image_5' => 'image5.jpg',
        'thumbnail_image_6' => 'image1.jpg',
        'image_1' => 'image1.jpg',
        'image_2' => 'image2.jpg',
        'image_3' => 'image3.jpg',
        'image_4' => 'image4.jpg',
        'image_5' => 'image5.jpg',
        'image_6' => 'image1.jpg',
        'image_7' => 'image2.jpg',
        'image_8' => 'image3.jpg',
        'image_9' => 'image4.jpg',
        'image_10' => 'image5.jpg',
        'image_360_1' => 'example_image360_1.jpg',
        'image_360_2' => 'example_image360_2.jpg',
        'image_360_3' => 'example_image360_3.jpg',
        'image_360_4' => 'example_image360_4.jpg',
        'image_360_5' => 'example_image360_5.jpg',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ];
});
