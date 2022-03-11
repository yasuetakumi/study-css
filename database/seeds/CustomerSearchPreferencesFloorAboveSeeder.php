<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\CustomerSearchPreferencesFloorAbove;

class CustomerSearchPreferencesFloorAboveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        CustomerSearchPreferencesFloorAbove::truncate();
        Schema::enableForeignKeyConstraints();

        factory(CustomerSearchPreferencesFloorAbove::class, 50)->create();
    }
}
