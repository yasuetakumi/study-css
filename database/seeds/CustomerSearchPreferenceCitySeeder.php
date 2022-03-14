<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\CustomerSearchPreference;
use App\Models\CustomerSearchPreferenceCity;

class CustomerSearchPreferenceCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        CustomerSearchPreferenceCity::truncate();
        Schema::enableForeignKeyConstraints();

        factory(CustomerSearchPreferenceCity::class, 10)->create();
    }
}
