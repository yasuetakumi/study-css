<?php

use App\Models\CompanyPaymentDetail;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CompanyPaymentDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        CompanyPaymentDetail::truncate();
        Schema::enableForeignKeyConstraints();

        factory(CompanyPaymentDetail::class, 100)->create();
    }
}
