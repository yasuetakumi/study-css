<?php

use App\Models\Cuisine;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CuisineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Cuisine::truncate();
        Schema::enableForeignKeyConstraints();

        $admin = new Cuisine();
        $admin->insert([
            [
                'label_en'       => 'Ramen',
                'label_jp'      => 'ラーメン ',
            ],
            [
                'label_en'       => 'Soba and Udon ',
                'label_jp'      => 'そば・うどん',
            ],
            [
                'label_en'       => 'Asian Food ',
                'label_jp'      => 'アジア料理',
            ],
            [
                'label_en'       => 'Karaoke Pubs and Snacks ',
                'label_jp'      => 'カラオケ・パブ・スナック ',
            ],
            [
                'label_en'       => 'Japanese Meal',
                'label_jp'      => '和食',
            ],
            [
                'label_en'       => 'French Cuisine',
                'label_jp'      => 'フランス料理',
            ],

            [
                'label_en'       => 'Sushi',
                'label_jp'      => '寿司 ',
            ],
            [
                'label_en'       => 'Cafe',
                'label_jp'      => 'カフェ',
            ],
            [
                'label_en'       => 'Bar',
                'label_jp'      => 'バー',
            ],
            [
                'label_en'       => 'Western Food',
                'label_jp'      => '洋食 ',
            ],
            [
                'label_en'       => 'Italian Food',
                'label_jp'      => 'イタリア料理',
            ],
            [
                'label_en'       => 'Grilled Meat',
                'label_jp'      => '焼肉',
            ],
            [
                'label_en'       => 'Take Out',
                'label_jp'      => 'テイクアウト ',
            ],
            [
                'label_en'       => 'Izakaya / Dining Bar',
                'label_jp'      => '居酒屋・ダイニングバー',
            ],
            [
                'label_en'       => 'Chinese Food',
                'label_jp'      => '中華',
            ],
            [
                'label_en'       => 'Teppanyaki / Okonomiyaki',
                'label_jp'      => '鉄板焼き・お好み焼 ',
            ],
            [
                'label_en'       => 'Lunch box, Side Dish, Deliver',
                'label_jp'      => 'お弁当・惣菜・デリ',
            ],
            [
                'label_en'       => 'Specialty Food',
                'label_jp'      => '専門料理',
            ],
            [
                'label_en'       => 'Others',
                'label_jp'      => 'その他',
            ],
        ]);
    }
}
