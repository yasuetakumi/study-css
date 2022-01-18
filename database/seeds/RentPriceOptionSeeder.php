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
                    'label_en'  => $value . ' EN',
                    'label_jp'  => $value . ' JP',
                    'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
                ],

            ]);
        }
        $data = new RentPriceOption();
        $data->insert([
            [
                'value'     =>  150,
                'label_en'  =>  '150 EN',
                'label_jp'  =>  '150 JP',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'value'     =>  200,
                'label_en'  =>  '200 EN',
                'label_jp'  =>  '200 JP',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'value'     =>  250,
                'label_en'  =>  '250 EN',
                'label_jp'  =>  '250 JP',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'value'     =>  300,
                'label_en'  =>  '300 EN',
                'label_jp'  =>  '300 JP',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'value'     =>  350,
                'label_en'  =>  '350 EN',
                'label_jp'  =>  '350 JP',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'value'     =>  400,
                'label_en'  =>  '400 EN',
                'label_jp'  =>  '400 JP',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'value'     =>  450,
                'label_en'  =>  '450 EN',
                'label_jp'  =>  '450 JP',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'value'     =>  500,
                'label_en'  =>  '500 EN',
                'label_jp'  =>  '500 JP',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],

        ]);
    }
}
