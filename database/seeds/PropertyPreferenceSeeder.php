<?php

use App\Models\PropertyPreference;
use Illuminate\Database\Seeder;

class PropertyPreferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PropertyPreference::query()->delete();
        $data = new PropertyPreference();
        $data->insert([
            [
                'label_en'       => 'Roadside',
                'label_jp'      => ' ロードサイド',
            ],
            [
                'label_en'       => 'Parking Lot',
                'label_jp'      => '駐車場',
            ],
            [
                'label_en'       => 'Signboard can be attached',
                'label_jp'      => '看板取り付け可  ',
            ],
            [
                'label_en'       => 'Latest property (registered property within 48 hours)',
                'label_jp'      => ' 最新の物件（48時間以内の登録物件）',
            ],
            [
                'label_en'       => 'Drawings can be printed (premium service only)',
                'label_jp'      => '図面印刷可能（プレミアムサービス専用）',
            ],

        ]);
    }
}
