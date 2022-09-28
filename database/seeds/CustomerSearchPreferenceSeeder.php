<?php

use App\Models\CustomerSearchPreference;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CustomerSearchPreferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        CustomerSearchPreference::truncate();
        Schema::enableForeignKeyConstraints();

        factory(CustomerSearchPreference::class, 100)->create();
    }
}
