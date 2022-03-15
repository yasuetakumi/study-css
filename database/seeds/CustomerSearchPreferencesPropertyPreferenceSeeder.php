<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\CustomerSearchPreferencesPropertyPreference;

class CustomerSearchPreferencesPropertyPreferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        CustomerSearchPreferencesPropertyPreference::truncate();
        Schema::enableForeignKeyConstraints();

        factory(CustomerSearchPreferencesPropertyPreference::class, 50)->create();
    }
}
