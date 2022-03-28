<?php

use App\Models\PointType;
use Illuminate\Database\Seeder;

class PointTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PointType::query()->delete();
        $data = new PointType();
        $data->insert([
            [
                'label_en'      => 'Point A',
                'label_jp'      => 'ポイントA',
            ],
            [
                'label_en'      => 'Point B',
                'label_jp'      => 'ポイントB',
            ],
            [
                'label_en'      => 'Point C',
                'label_jp'      => 'ポイントC',
            ],

        ]);
    }
}
