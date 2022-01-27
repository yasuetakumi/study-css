<?php

use App\Models\TagArchitecture;
use Illuminate\Database\Seeder;

class TagArchitectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TagArchitecture::query()->delete();
        $data = new TagArchitecture();

        $data->insert(array (
            0 =>
            array (
                'id' => 1,
                'label_en' => 'japanese',
                'label_jp' => '和',
            ),
            1 =>
            array (
                'id' => 2,
                'label_en' => 'western',
                'label_jp' => '洋',
            ),
            2 =>
            array (
                'id' => 3,
                'label_en' => 'asian',
                'label_jp' => 'アジアン',
            ),
        ));

    }
}
