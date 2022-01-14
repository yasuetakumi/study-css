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
                'label_en'       => 'Steel frame',
                'label_jp'      => ' 鉄骨造',
            ],
            [
                'label_en'       => 'RC construction',
                'label_jp'      => 'RC造',
            ],
            [
                'label_en'       => 'Reinforced concrete construction',
                'label_jp'      => '鉄筋コンクリート造 ',
            ],
            [
                'label_en'       => 'wooden',
                'label_jp'      => '木造',
            ],
            [
                'label_en'       => 'SRC structure',
                'label_jp'      => 'SRC造 ',
            ],

        ]);
    }
}
