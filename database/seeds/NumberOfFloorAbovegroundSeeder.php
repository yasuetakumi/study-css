<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\NumberOfFloorsAboveGround;

class NumberOfFloorAbovegroundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NumberOfFloorsAboveGround::query()->delete();
        $data = new NumberOfFloorsAboveGround();
        $data->insert([
            [
                'value'         => 0,
                'label_en'       => 'Ground',
                'label_jp'      => ' 地上',
            ],
            [
                'value'         => 1,
                'label_en'       => '1st floor',
                'label_jp'      => '1階',
            ],
            [
                'value'         => 2,
                'label_en'       => '2nd floor',
                'label_jp'      => '2階 ',
            ],
            [
                'value'         => 3,
                'label_en'       => '3rd floor',
                'label_jp'      => '3階',
            ],
            [
                'value'         => 4,
                'label_en'       => '4th floor',
                'label_jp'      => '4階 ',
            ],
            [
                'value'         => 5,
                'label_en'       => '5th floor',
                'label_jp'      => '5階 ',
            ],
            [
                'value'         => 6,
                'label_en'       => '6th floor',
                'label_jp'      => '5階 ',
            ],
            [
                'value'         => 7,
                'label_en'       => '7th floor',
                'label_jp'      => '7階 ',
            ],

        ]);
    }
}
