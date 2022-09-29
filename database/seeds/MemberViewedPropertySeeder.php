<?php

use App\Models\MemberViewedProperty;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class MemberViewedPropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        MemberViewedProperty::truncate();
        Schema::enableForeignKeyConstraints();

        factory(App\Models\MemberViewedProperty::class, 50)->create();
    }
}
