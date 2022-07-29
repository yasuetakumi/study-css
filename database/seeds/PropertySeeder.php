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
use App\Models\PropertyPublicationStatus;

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
                Storage::disk('public')->copy('img/restaurant_dummy.jpg', 'uploads/image' . $i . '.jpg');
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
                    'publication_status_id' => PropertyPublicationStatus::ID_PUBLISHED,
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
        // $arrImage = ['image1.jpg', 'image2.jpg', 'image3.jpg', 'image4.jpg', 'image5.jpg'];
        $arrImage360 = ['example_image360_1.jpg', 'example_image360_2.jpg', 'example_image360_3.jpg', 'example_image360_4.jpg', 'example_image360_5.jpg'];

        for($i=0; $i < 95; $i++){
            $lastPropertyId = Property::latest()->first()->id;
            $id = $lastPropertyId + 1;

            // name image
            $nameImage1 = 'image_1' . $id . '.jpg';
            $nameImage2 = 'image_2' . $id . '.jpg';
            $nameImage3 = 'image_3' . $id . '.jpg';
            $nameImage4 = 'image_4' . $id . '.jpg';
            $nameImage5 = 'image_5' . $id . '.jpg';
            $nameImage6 = 'image_6' . $id . '.jpg';
            $nameImage7 = 'image_7' . $id . '.jpg';
            $nameImage8 = 'image_8' . $id . '.jpg';
            $nameImage9 = 'image_9' . $id . '.jpg';
            $nameImage10 = 'image_10' . $id . '.jpg';

            $nameImage3601 = 'example_image360_1_' . $id . '.jpg';
            $nameImage3602 = 'example_image360_2_' . $id . '.jpg';
            $nameImage3603 = 'example_image360_3_' . $id . '.jpg';
            $nameImage3604 = 'example_image360_4_' . $id . '.jpg';
            $nameImage3605 = 'example_image360_5_' . $id . '.jpg';

            $nameThumbnailImageMain = 'thumbnail_image_main_' . $id . '.jpg';
            $nameThumbnailImage1 = 'thumbnail_image_1_' . $id . '.jpg';
            $nameThumbnailImage2 = 'thumbnail_image_2_' . $id . '.jpg';
            $nameThumbnailImage3 = 'thumbnail_image_3_' . $id . '.jpg';
            $nameThumbnailImage4 = 'thumbnail_image_4_' . $id . '.jpg';
            $nameThumbnailImage5 = 'thumbnail_image_5_' . $id . '.jpg';
            $nameThumbnailImage6 = 'thumbnail_image_6_' . $id . '.jpg';

            // image 1
            if(!Storage::disk('public')->exists('uploads/' . $nameImage1)){
                Storage::disk('public')->copy('img/restaurant_dummy.jpg', 'uploads/' . $nameImage1);

            }
            // image 2
            if(!Storage::disk('public')->exists('uploads/' . $nameImage2)){
                Storage::disk('public')->copy('img/restaurant_dummy.jpg', 'uploads/' . $nameImage2);

            }
            // image 3
            if(!Storage::disk('public')->exists('uploads/' . $nameImage3)){
                Storage::disk('public')->copy('img/restaurant_dummy.jpg', 'uploads/' . $nameImage3);

            }
            // image 4
            if(!Storage::disk('public')->exists('uploads/' . $nameImage4)){
                Storage::disk('public')->copy('img/restaurant_dummy.jpg', 'uploads/' . $nameImage4);

            }
            // image 5
            if(!Storage::disk('public')->exists('uploads/' . $nameImage5)){
                Storage::disk('public')->copy('img/restaurant_dummy.jpg', 'uploads/' . $nameImage5);

            }
            // image 6
            if(!Storage::disk('public')->exists('uploads/' . $nameImage6)){
                Storage::disk('public')->copy('img/restaurant_dummy.jpg', 'uploads/' . $nameImage6);

            }
            // image 7
            if(!Storage::disk('public')->exists('uploads/' . $nameImage7)){
                Storage::disk('public')->copy('img/restaurant_dummy.jpg', 'uploads/' . $nameImage7);

            }
            // image 8
            if(!Storage::disk('public')->exists('uploads/' . $nameImage8)){
                Storage::disk('public')->copy('img/restaurant_dummy.jpg', 'uploads/' . $nameImage8);

            }
            // image 9
            if(!Storage::disk('public')->exists('uploads/' . $nameImage9)){
                Storage::disk('public')->copy('img/restaurant_dummy.jpg', 'uploads/' . $nameImage9);

            }
            // image 10
            if(!Storage::disk('public')->exists('uploads/' . $nameImage10)){
                Storage::disk('public')->copy('img/restaurant_dummy.jpg', 'uploads/' . $nameImage10);

            }
            // --------------------------------------------------

            //image 360 1
            if(!Storage::disk('public')->exists('uploads/' . $nameImage3601)){
                Storage::disk('public')->copy('img/' . $arrImage360[array_rand($arrImage360)], 'uploads/' . $nameImage3601);

            }
            //image 360 2
            if(!Storage::disk('public')->exists('uploads/' . $nameImage3602)){
                Storage::disk('public')->copy('img/' . $arrImage360[array_rand($arrImage360)], 'uploads/' . $nameImage3602);
            }
            //image 360 3
            if(!Storage::disk('public')->exists('uploads/' . $nameImage3603)){
                Storage::disk('public')->copy('img/' . $arrImage360[array_rand($arrImage360)], 'uploads/' . $nameImage3603);
            }
            //image 360 4
            if(!Storage::disk('public')->exists('uploads/' . $nameImage3604)){
                Storage::disk('public')->copy('img/' . $arrImage360[array_rand($arrImage360)], 'uploads/' . $nameImage3604);
            }
            //image 360 5
            if(!Storage::disk('public')->exists('uploads/' . $nameImage3605)){
                Storage::disk('public')->copy('img/' . $arrImage360[array_rand($arrImage360)], 'uploads/' . $nameImage3605);
            }
            // --------------------------------------------------


            //thumbnail image main
            if(!Storage::disk('public')->exists('uploads/' . $nameThumbnailImageMain)){
                Storage::disk('public')->copy('img/restaurant_dummy.jpg', 'uploads/' . $nameThumbnailImageMain);

            }
            //thumbnail image_1
            if(!Storage::disk('public')->exists('uploads/' . $nameThumbnailImage1)){
                Storage::disk('public')->copy('img/restaurant_dummy.jpg', 'uploads/' . $nameThumbnailImage1);

            }
            //thumbnail image_2
            if(!Storage::disk('public')->exists('uploads/' . $nameThumbnailImage2)){
                Storage::disk('public')->copy('img/restaurant_dummy.jpg', 'uploads/' . $nameThumbnailImage2);

            }
            //thumbnail image_3
            if(!Storage::disk('public')->exists('uploads/' . $nameThumbnailImage3)){
                Storage::disk('public')->copy('img/restaurant_dummy.jpg', 'uploads/' . $nameThumbnailImage3);

            }
            //thumbnail image_4
            if(!Storage::disk('public')->exists('uploads/' . $nameThumbnailImage4)){
                Storage::disk('public')->copy('img/restaurant_dummy.jpg', 'uploads/' . $nameThumbnailImage4);

            }
            //thumbnail image_5
            if(!Storage::disk('public')->exists('uploads/' . $nameThumbnailImage5)){
                Storage::disk('public')->copy('img/restaurant_dummy.jpg', 'uploads/' . $nameThumbnailImage5);

            }
            //thumbnail image_6
            if(!Storage::disk('public')->exists('uploads/' . $nameThumbnailImage6)){
                Storage::disk('public')->copy('img/restaurant_dummy.jpg', 'uploads/' . $nameThumbnailImage6);

            }

            factory(Property::class, 1)->create([
                'thumbnail_image_main' => $nameThumbnailImageMain,
                'thumbnail_image_1' => $nameThumbnailImage1,
                'thumbnail_image_2' => $nameThumbnailImage2,
                'thumbnail_image_3' => $nameThumbnailImage3,
                'thumbnail_image_4' => $nameThumbnailImage4,
                'thumbnail_image_5' => $nameThumbnailImage5,
                'thumbnail_image_6' => $nameThumbnailImage6,
                'image_1' => $nameImage1,
                'image_2' => $nameImage2,
                'image_3' => $nameImage3,
                'image_4' => $nameImage4,
                'image_5' => $nameImage5,
                'image_6' => $nameImage6,
                'image_7' => $nameImage7,
                'image_8' => $nameImage8,
                'image_9' => $nameImage9,
                'image_10' => $nameImage10,
                'image_360_1' => $nameImage3601,
                'image_360_2' => $nameImage3602,
                'image_360_3' => $nameImage3603,
                'image_360_4' => $nameImage3604,
                'image_360_5' => $nameImage3605,
            ]);
        }
        // factory(Property::class, 500)->create();
    }
}
