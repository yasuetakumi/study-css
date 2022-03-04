<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\PropertiesStations;

class PropertyStationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PropertiesStations::query()->delete();
        factory(PropertiesStations::class, 2000)->create();
    }
}
