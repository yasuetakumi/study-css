<?php

use App\Models\SurfaceAreaOption;
use Illuminate\Database\Seeder;

class SurfaceAreaOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SurfaceAreaOption::query()->delete();

        for($i = 1; $i <= 25; $i++){
            $value = $i * 10;
            $data = new SurfaceAreaOption();
            $data->insert([
                [
                    'value'     => $value,
                    'label_en'  => $value . ' EN',
                    'label_jp'  => $value . ' JP'
                ],

            ]);
        }

    }
}
