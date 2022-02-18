<?php

use App\Models\PropertyPlan;
use Illuminate\Database\Seeder;

class PropertyPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PropertyPlan::query()->delete();
        factory(PropertyPlan::class, 100)->create();
    }
}
