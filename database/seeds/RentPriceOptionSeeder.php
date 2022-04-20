<?php

use Carbon\Carbon;
use App\Models\RentPriceOption;
use Illuminate\Database\Seeder;

class RentPriceOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RentPriceOption::query()->delete();

        for($i = 1; $i <= 10; $i++){
            $value = $i * 10;
            $data = new RentPriceOption();
            $data->insert([
                [
                    'value'     => $value,
                    'label_en'  => $value . ' JPY',
                    'label_jp'  => $value . '万円',
                    'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
                ],

            ]);
        }
        $data = new RentPriceOption();
        $data->insert([
            [
                'value'     =>  150,
                'label_en'  =>  '150 JPY',
                'label_jp'  =>  '150万円',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'value'     =>  200,
                'label_en'  =>  '200 JPY',
                'label_jp'  =>  '200万円',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'value'     =>  250,
                'label_en'  =>  '250 JPY',
                'label_jp'  =>  '250万円',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'value'     =>  300,
                'label_en'  =>  '300 JPY',
                'label_jp'  =>  '300万円',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'value'     =>  350,
                'label_en'  =>  '350 JPY',
                'label_jp'  =>  '350万円',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'value'     =>  400,
                'label_en'  =>  '400 JPY',
                'label_jp'  =>  '400万円',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'value'     =>  450,
                'label_en'  =>  '450 JPY',
                'label_jp'  =>  '450万円',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'value'     =>  500,
                'label_en'  =>  '500 JPY',
                'label_jp'  =>  '500万円',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],

        ]);
    }
}
