<?php

use Carbon\Carbon;
use App\Models\City;
use App\Models\Cuisine;

use App\Models\Property;
use App\Models\PropertyType;
use Faker\Generator as Faker;
use App\Models\RentPriceOption;
use Illuminate\Database\Seeder;
use App\Models\SurfaceAreaOption;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

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
        // copy example image to uploads directory
        for($i = 1; $i <= 5; $i++){
            if(!Storage::disk('public')->exists('uploads/example_image360_' . $i . '.jpg')){
                Storage::disk('public')->copy('img/example_image360_' . $i . '.jpg', 'uploads/example_image360_' . $i . '.jpg');

            }
            if(!Storage::disk('public')->exists('uploads/image' . $i . '.jpg')){
                Storage::disk('public')->copy('img/image' . $i . '.jpg', 'uploads/image' . $i . '.jpg');
            }
        }
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
                    'deposit_amount' => fromMan($deposit_amount[array_rand($deposit_amount)]),
                    'monthly_maintainance_fee' => fromMan($deposit_amount[array_rand($deposit_amount)]),
                    'repayment' => $faker->numerify('Repayment ###'),
                    'date_built' => Carbon::now()->subMonths(rand(1,3))->subDays(rand(1,30)),
                    'renewal_fee' => fromMan($deposit_amount[array_rand($deposit_amount)]),
                    'contract_length_in_months' => rand(1,12),
                    'special_moving_fee' => fromMan($deposit_amount[array_rand($deposit_amount)]),
                    'business_terms_id' => rand(1,3),
                    'comment' => $faker->paragraph,
                    'is_skeleton' => rand(0,1),
                    'cuisine_id' => Cuisine::all()->pluck('id')->random(),
                    'interior_transfer_price' => fromMan($deposit_amount[array_rand($deposit_amount)]),
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
                ],
            ]);
        }

        factory(Property::class, 500)->create();
    }
}
