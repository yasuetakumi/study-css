<?php

use App\Models\Cuisine;
use Illuminate\Database\Seeder;

class CuisineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cuisine::query()->delete();
        $admin = new Cuisine();
        $admin->insert([
            [
                'label_en'       => 'Ramen',
                'label_jp'      => ' ラーメン ',
            ],
            [
                'label_en'       => 'Soba and udon ',
                'label_jp'      => 'そば・うどん',
            ],
            [
                'label_en'       => 'Asian food ',
                'label_jp'      => 'アジア料理',
            ],

        ]);
    }
}
