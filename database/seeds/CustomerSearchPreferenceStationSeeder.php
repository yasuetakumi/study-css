<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Schema;
use App\Models\CustomerSearchPreferenceStation;

class CustomerSearchPreferenceStationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        CustomerSearchPreferenceStation::truncate();
        Schema::enableForeignKeyConstraints();

        factory(CustomerSearchPreferenceStation::class, 10)->create();
    }
}
