<?php

use App\Models\TransferPriceOption;
use Illuminate\Database\Seeder;

class TransferPriceOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TransferPriceOption::query()->delete();
        $data = new TransferPriceOption();
        $data->insert([
            [
                'value'         => 50,
                'label_en'       => '50 en',
                'label_jp'      => ' 50 jp',
            ],
            [
                'value'         => 100,
                'label_en'       => '100 en',
                'label_jp'      => '100 jp',
            ],
            [
                'value'         => 200,
                'label_en'       => '200 en',
                'label_jp'      => '200 jp ',
            ],
            [
                'value'         => 300,
                'label_en'       => '300 en',
                'label_jp'      => '300 jp',
            ],
            [
                'value'         => 400,
                'label_en'       => '400 en',
                'label_jp'      => '400 jp ',
            ],
            [
                'value'         => 500,
                'label_en'       => '500 en',
                'label_jp'      => '500 jp ',
            ],

        ]);
    }
}
