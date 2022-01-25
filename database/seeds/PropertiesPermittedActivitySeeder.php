<?php

use App\Models\PropertiesPermittedActivities;
use Illuminate\Database\Seeder;

class PropertiesPermittedActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PropertiesPermittedActivities::query()->delete();
        factory(PropertiesPermittedActivities::class, 20)->create();
    }
}
