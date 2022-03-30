<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\PropertyPublicationStatusPeriod;

class PropertyPublicationStatusPeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        PropertyPublicationStatusPeriod::truncate();
        Schema::enableForeignKeyConstraints();
        factory(PropertyPublicationStatusPeriod::class, 20)->create();
    }
}
