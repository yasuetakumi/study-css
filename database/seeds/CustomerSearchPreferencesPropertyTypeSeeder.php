<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\CustomerSearchPreferencesPropertyType;

class CustomerSearchPreferencesPropertyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        CustomerSearchPreferencesPropertyType::truncate();
        Schema::enableForeignKeyConstraints();

        factory(CustomerSearchPreferencesPropertyType::class, 50)->create();
    }
}
