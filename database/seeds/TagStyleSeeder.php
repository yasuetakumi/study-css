<?php

use App\Models\TagStyle;
use Illuminate\Database\Seeder;

class TagStyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TagStyle::query()->delete();
        $data = new TagStyle();

        $data->insert(array (
            0 =>
            array (
                'id' => 1,
                'label_en' => 'classic',
                'label_jp' => 'クラシック',
            ),
            1 =>
            array (
                'id' => 2,
                'label_en' => 'modern',
                'label_jp' => 'モダン',
            ),
            2 =>
            array (
                'id' => 3,
                'label_en' => 'simple',
                'label_jp' => 'シンプル',
            ),
            3 =>
            array (
                'id' => 4,
                'label_en' => 'retro',
                'label_jp' => 'レトロ',
            ),
            4 =>
            array (
                'id' => 5,
                'label_en' => 'urban',
                'label_jp' => 'アーバン',
            ),
            5 =>
            array (
                'id' => 6,
                'label_en' => 'native',
                'label_jp' => '郷土',
            ),
            6 =>
            array (
                'id' => 7,
                'label_en' => 'natural',
                'label_jp' => 'ナチュラル',
            ),
            7 =>
            array (
                'id' => 8,
                'label_en' => 'casual',
                'label_jp' => 'カジュアル',
            ),
            8 =>
            array (
                'id' => 9,
                'label_en' => 'general',
                'label_jp' => '大衆',
            ),
            9 =>
            array (
                'id' => 10,
                'label_en' => 'gorgeous',
                'label_jp' => 'ゴージャス',
            ),
            10 =>
            array (
                'id' => 11,
                'label_en' => 'pop',
                'label_jp' => 'ポップ',
            ),
            11 =>
            array (
                'id' => 12,
                'label_en' => 'stylish',
                'label_jp' => 'スタイリッシュ',
            ),
            12 =>
            array (
                'id' => 13,
                'label_en' => 'others',
                'label_jp' => 'その他',
            ),
        ));
    }
}
