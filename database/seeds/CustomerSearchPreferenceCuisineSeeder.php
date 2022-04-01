<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Schema;
use App\Models\CustomerSearchPreferenceCuisine;

class CustomerSearchPreferenceCuisineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        CustomerSearchPreferenceCuisine::truncate();
        Schema::enableForeignKeyConstraints();

        factory(CustomerSearchPreferenceCuisine::class, 10)->create();
    }
}
