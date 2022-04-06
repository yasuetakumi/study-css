<?php

use App\Models\Property;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

use Carbon\Carbon;
use App\Models\City;
use App\Models\Cuisine;
use App\Models\PropertyType;
use Faker\Generator as Faker;
use App\Models\RentPriceOption;
use App\Models\SurfaceAreaOption;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Schema::disableForeignKeyConstraints();
        Property::truncate();
        Schema::enableForeignKeyConstraints();

        $deposit_amount = [100,200,300,400,500,600,700,800,900,1000];
        $prefecture_id = rand(1,20);
        $surfaceArea = [48,51,55];
        //added dummy data to properties table for testing related properties on detail page
        $data = new Property();
        for ($i = 0; $i < 5; $i++) {
            $data->insert([
                [
                    'user_id' => rand(1,10),
                    'postcode_id' => rand(1, 100),
                    'prefecture_id' => $prefecture_id,
                    'city_id' => 12254,
                    'location' => $faker->city,
                    'surface_area'=> $i==0 ? 50 : $surfaceArea[array_rand($surfaceArea)],
                    'rent_amount' => fromMan(RentPriceOption::all()->pluck('value')->random()),
                    'number_of_floors_under_ground' => rand(0,7),
                    'number_of_floors_above_ground' => rand(0,7),
                    'property_type_id' => rand(1,3),
                    'structure_id' => rand(1,5),
                    'deposit_amount' => $deposit_amount[array_rand($deposit_amount)],
                    'monthly_maintainance_fee' => $deposit_amount[array_rand($deposit_amount)],
                    'repayment' => $faker->numerify('Repayment ###'),
                    'date_built' => Carbon::now()->subMonths(rand(1,3))->subDays(rand(1,30)),
                    'renewal_fee' => $faker->sentence,
                    'contract_length_in_months' => rand(1,12),
                    'special_moving_fee' => $deposit_amount[array_rand($deposit_amount)],
                    'business_terms_id' => rand(1,3),
                    'comment' => $faker->paragraph,
                    'is_skeleton' => rand(0,1),
                    'cuisine_id' => Cuisine::all()->pluck('id')->random(),
                    'interior_transfer_price' => $deposit_amount[array_rand($deposit_amount)],
                    'thumbnail_image_main' => $faker->numerify('Thumbnail Image Main ###'),
                    'thumbnail_image_1' => $faker->numerify('thumbnail_image_1 ###'),
                    'thumbnail_image_2' => $faker->numerify('thumbnail_image_2 ###'),
                    'thumbnail_image_3' => $faker->numerify('thumbnail_image_3 ###'),
                    'thumbnail_image_4' => $faker->numerify('thumbnail_image_4 ###'),
                    'thumbnail_image_5' => $faker->numerify('thumbnail_image_5 ###'),
                    'thumbnail_image_6' => $faker->numerify('thumbnail_image_6 ###'),
                    'image_1' => $faker->numerify('image_1 ###'),
                    'image_2' => $faker->numerify('image_2 ###'),
                    'image_360_1' => $faker->numerify('image_360_1 ###'),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
            ]);
        }

        factory(Property::class, 500)->create();
    }
}
