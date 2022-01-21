<?php

use App\Models\TagColor;
use Illuminate\Database\Seeder;

class TagColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TagColor::query()->delete();
        $data = new TagColor();

        $data->insert(array (
            0 =>
            array (
                'id' => 1,
                'label_en' => 'red',
                'label_jp' => '赤',
            ),
            1 =>
            array (
                'id' => 2,
                'label_en' => 'black',
                'label_jp' => '黒',
            ),
            2 =>
            array (
                'id' => 3,
                'label_en' => 'green',
                'label_jp' => '緑',
            ),
            3 =>
            array (
                'id' => 4,
                'label_en' => 'white',
                'label_jp' => '白',
            ),
            4 =>
            array (
                'id' => 5,
                'label_en' => 'yellow',
                'label_jp' => '黄',
            ),
            5 =>
            array (
                'id' => 6,
                'label_en' => 'gold',
                'label_jp' => '金',
            ),
            6 =>
            array (
                'id' => 7,
                'label_en' => 'brown',
                'label_jp' => '茶',
            ),
            7 =>
            array (
                'id' => 8,
                'label_en' => 'blue',
                'label_jp' => '青',
            ),
            8 =>
            array (
                'id' => 9,
                'label_en' => 'purple',
                'label_jp' => '紫',
            ),
            9 =>
            array (
                'id' => 10,
                'label_en' => 'silver',
                'label_jp' => '銀',
            ),
        ));
    }
}
