<?php

use App\Models\CustomerSkeletonPreference;
use Illuminate\Database\Seeder;

class CustomerSkeletonPreferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CustomerSkeletonPreference::query()->delete();
        $data = new CustomerSkeletonPreference();
        $data->insert([
            [
                'label_en'       => 'Furnished/with kitchen',
                'label_jp'      => '居抜き物件',
            ],
            [
                'label_en'       => 'skeleton',
                'label_jp'      => 'スケルトン',
            ],
            [
                'label_en'       => 'Furnished/with kitchen and skeleton',
                'label_jp'      => '居抜き物件・スケルトン',
            ],
        ]);
    }
}
