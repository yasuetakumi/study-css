<?php

use App\Models\Plan;
use App\Models\Property;
use App\Models\PropertyPlan;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class PropertyPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        PropertyPlan::truncate();
        Schema::enableForeignKeyConstraints();
        $properties = Property::get();
        foreach($properties as $property){
            $data = new PropertyPlan();
            $data->insert([
                [
                    'plan_id' => Plan::where('design_category_id', 1)->pluck('id')->random(),
                    'property_id' => $property->id,
                    'created_at' => Carbon::now(),
                ],
                [
                    'plan_id' => Plan::where('design_category_id', 2)->pluck('id')->random(),
                    'property_id' => $property->id,
                    'created_at' => Carbon::now(),
                ],
                [
                    'plan_id' => Plan::where('design_category_id', 3)->pluck('id')->random(),
                    'property_id' => $property->id,
                    'created_at' => Carbon::now(),
                ],
                [
                    'plan_id' => Plan::where('design_category_id', 4)->pluck('id')->random(),
                    'property_id' => $property->id,
                    'created_at' => Carbon::now(),
                ],
            ]);
        }
    }
}
