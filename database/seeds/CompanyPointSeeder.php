<?php

use App\Models\CompanyPoint;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CompanyPointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        CompanyPoint::truncate();
        Schema::enableForeignKeyConstraints();

        factory(CompanyPoint::class, 10)->create();
    }
}
