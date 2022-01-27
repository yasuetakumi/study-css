<?php

use App\Models\PropertyType;
use Illuminate\Database\Seeder;

class PropertyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PropertyType::query()->delete();
        $admin = new PropertyType();
        $admin->insert([
            [
                'label_en'       => 'Heavy food and drink',
                'label_jp'      => '重飲食　一般飲食店すべて',
            ],
            [
                'label_en'       => 'Light food and drink cafes, coffee shops, etc.',
                'label_jp'      => '軽飲食　カフェ、喫茶など',
            ],
            [
                'label_en'       => 'Bars, clubs, snacks, karaoke, etc.',
                'label_jp'      => 'バー・クラブ　バー・クラブ・スナック・カラオケなど',
            ],

        ]);
    }
}
