<?php

use Carbon\Carbon;
use App\Models\AreaGroup;
use Illuminate\Database\Seeder;

class AreaGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AreaGroup::query()->delete();
        $data = new AreaGroup();
        $data->insert([
            [
                'minimum'       => 15,
                'maximum'       => 19,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')

            ],
            [
                'minimum'       => 20,
                'maximum'       => 29,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')

            ],
            [
                'minimum'       => 30,
                'maximum'       => 39,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')

            ],
            [
                'minimum'       => 40,
                'maximum'       => 49,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')

            ],
            [
                'minimum'       => 50,
                'maximum'       => 59,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')

            ],
            [
                'minimum'       => 10,
                'maximum'       => 14,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ]);
    }
}
