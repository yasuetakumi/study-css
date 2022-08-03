<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\CustomerSearchPreferencesFloorUnder;

class CustomerSearchPreferencesFloorUnderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        CustomerSearchPreferencesFloorUnder::truncate();
        Schema::enableForeignKeyConstraints();

        factory(CustomerSearchPreferencesFloorUnder::class, 50)->create();
    }
}
