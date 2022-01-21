<?php

use App\Models\Structure;
use Illuminate\Database\Seeder;

class StructureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Structure::query()->delete();
        $admin = new Structure();
        $admin->insert([
            [
                'label_en'       => 'Steel Frame',
                'label_jp'      => ' 鉄骨造',
            ],
            [
                'label_en'       => 'RC Construction',
                'label_jp'      => 'RC造',
            ],
            [
                'label_en'       => 'Reinforced Concrete Construction',
                'label_jp'      => '鉄筋コンクリート造 ',
            ],
            [
                'label_en'       => 'Wooden',
                'label_jp'      => '木造',
            ],
            [
                'label_en'       => 'SRC Structure',
                'label_jp'      => 'SRC造 ',
            ],

        ]);
    }
}
