<?php

use App\Models\Feature;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        // add 3 data
        for($i = 0; $i < 3; $i++){
            $feature = new Feature();

            // prepare value of pdf_file. I added null because pdf is optional
            $pdf_file = $faker->randomElement([null, 'dummy-pdf1.pdf', 'dummy-pdf2.pdf']);

            // prepare value of image. I added null because image2 and image3 are optional
            $image1 = $faker->randomElement(['dummy2.png', 'dummy3.png', 'dummy4.png', 'dummy5.png']);
            $image2 = $faker->randomElement([null, 'dummy2.png', 'dummy3.png', 'dummy4.png', 'dummy5.png']);
            $image3 = $faker->randomElement([null, 'dummy2.png', 'dummy3.png', 'dummy4.png', 'dummy5.png']);


            // prepare value of video. I added null because video2 and video3 are optional
            $video1 = $faker->randomElement(['dummy-vid1.mp4', 'dummy-vid2.mp4', 'dummy-vid3.mp4']);
            $video2 = $faker->randomElement([null, 'dummy-vid1.mp4', 'dummy-vid2.mp4', 'dummy-vid3.mp4']);
            $video3 = $faker->randomElement([null, 'dummy-vid1.mp4', 'dummy-vid2.mp4', 'dummy-vid3.mp4']);

            $feature->title =$faker->words(rand(3, 5), true);
            $feature->company_id    = rand(1, 10);

            // if the value isn't null, it will add value to that column and copy file from prepared seeder files to uploads dir
            if($pdf_file){
                $feature->pdf_file    = time() . '-'. rand() . '-'. $pdf_file;
                Storage::disk('public')->copy('seeder_sample/' . $pdf_file, 'uploads/'. $feature->pdf_file);
            }

            $feature->body          = $faker->paragraph;
            $feature->publish_date  = Carbon::now()->subMonths(rand(1,3))->subDays(rand(1,30));
            $feature->status        = 'publish';
            $feature->radius        = rand(10, 50);

            $feature->image1        = time() . '-'. rand() . '-'. $image1;
            Storage::disk('public')->copy('seeder_sample/' . $image1, 'uploads/'. $feature->image1);


            // if the value isn't null, it will add value to that column and copy file from prepared seeder files to uploads dir
            if($image2){
                $feature->image2    = time() . '-'. rand() . '-'. $image2;
                Storage::disk('public')->copy('seeder_sample/' . $image2, 'uploads/'. $feature->image2);
            }

            if($image3){
                $feature->image3    = time() . '-'. rand() . '-'. $image3;
                Storage::disk('public')->copy('seeder_sample/' . $image3, 'uploads/'. $feature->image3);
            }

            $feature->video1        = time() . '-'. rand() . '-'. $video1;
            Storage::disk('public')->copy('seeder_sample/' . $video1, 'uploads/'. $feature->video1);


            // if the value isn't null, it will add value to that column and copy file from prepared seeder files to uploads dir
            if($video2){
                $feature->video2    = time() . '-'. rand() . '-'. $video2;
                Storage::disk('public')->copy('seeder_sample/' . $video2, 'uploads/'. $feature->video2);
            }

            if($video3){
                $feature->video3    = time() . '-'. rand() . '-'. $video3;
                Storage::disk('public')->copy('seeder_sample/' . $video3, 'uploads/'. $feature->video3);
            }

            $feature->created_at    = Carbon::now();
            $feature->updated_at    = Carbon::now();
            $feature->save();

        }

    }
}
