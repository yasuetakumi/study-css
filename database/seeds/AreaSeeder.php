<?php

use Carbon\Carbon;
use App\Models\Area;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Area::query()->delete();
        $data = new Area();
        $data->insert([
            [
                'name'          => 'hokkaido',
                'display_name'  => '北海道',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')

            ],
            [
                'name'          => 'tohoku',
                'display_name'  => '東北',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')

            ],
            [
                'name'          => 'kanto',
                'display_name'  => '関東',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')

            ],
            [
                'name'          => 'chubu',
                'display_name'  => '中部',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')

            ],
            [
                'name'          => 'kinki',
                'display_name'  => '近畿',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')

            ],
            [
                'name'          => 'chugoku',
                'display_name'  => '中国',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')

            ],

            [
                'name'          => 'shikoku',
                'display_name'  => '四国',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')

            ],
            [
                'name'          => 'kyusyu',
                'display_name'  => '九州',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')

            ],
            [
                'name'          => 'okinawa',
                'display_name'  => '沖縄',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')

            ],
        ]);
    }
}
