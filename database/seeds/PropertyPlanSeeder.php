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
            Log::info("Property Surface Area" . toTsubo($property->surface_area));
            $plans = Plan::with(['area_group'])->where('design_category_id', 1)->where('area_tsubo', '>=', toTsubo($property->surface_area))->pluck('id')->random();
            Log::info("PPlans" . $plans);
            $data->insert([
                [
                    'plan_id' => Plan::with(['area_group'])->where('design_category_id', 1)->whereHas('area_group', function($query) use ($property){
                        $query->where('maximum', '>=' ,toTsubo($property->surface_area))->where('minimum', '<=', toTsubo($property->surface_area));
                    })->pluck('id')->random(),
                    'property_id' => $property->id,
                    'created_at' => Carbon::now(),
                ],
                [
                    'plan_id' => Plan::with(['area_group'])->where('design_category_id', 2)->whereHas('area_group', function($query) use ($property){
                        $query->where('maximum', '>=' ,toTsubo($property->surface_area))->where('minimum', '<=', toTsubo($property->surface_area));
                    })->pluck('id')->random(),
                    'property_id' => $property->id,
                    'created_at' => Carbon::now(),
                ],
                [
                    'plan_id' => Plan::with(['area_group'])->where('design_category_id', 3)->whereHas('area_group', function($query) use ($property){
                        $query->where('maximum', '>=' ,toTsubo($property->surface_area))->where('minimum', '<=', toTsubo($property->surface_area));
                    })->pluck('id')->random(),
                    'property_id' => $property->id,
                    'created_at' => Carbon::now(),
                ],
                [
                    'plan_id' => Plan::with(['area_group'])->where('design_category_id', 4)->whereHas('area_group', function($query) use ($property){
                        $query->where('maximum', '>=' ,toTsubo($property->surface_area))->where('minimum', '<=', toTsubo($property->surface_area));
                    })->pluck('id')->random(),
                    'property_id' => $property->id,
                    'created_at' => Carbon::now(),
                ],
            ]);
        }
    }
}
