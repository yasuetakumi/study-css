<?php

use App\Models\WalkingDistanceFromStationOption;
use Illuminate\Database\Seeder;

class WalkingDistanceFromStationOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WalkingDistanceFromStationOption::query()->delete();
        $admin = new WalkingDistanceFromStationOption();
        $admin->insert([
            [
                'value'         => 1,
                'label_en'       => '1 Minutes',
                'label_jp'      => ' 1分',
            ],
            [
                'value'         => 3,
                'label_en'       => 'Within 3 minutes',
                'label_jp'      => '3分以内',
            ],
            [
                'value'         => 5,
                'label_en'       => 'Within 5 minutes',
                'label_jp'      => '5分以内 ',
            ],
            [
                'value'         => 10,
                'label_en'       => 'Within 10 minutes',
                'label_jp'      => '10分以内',
            ],
            [
                'value'         => 15,
                'label_en'       => 'Within 15 minutes',
                'label_jp'      => '15分以内 ',
            ],
            [
                'value'         => 16,
                'label_en'       => '16 Minutes or more',
                'label_jp'      => '16分以上 ',
            ],

        ]);
    }
}
