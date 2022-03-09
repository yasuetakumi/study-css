<?php

use App\Models\Property;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Property::truncate();
        Schema::enableForeignKeyConstraints();

        factory(Property::class, 500)->create();
    }
}
