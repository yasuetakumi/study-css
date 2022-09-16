<?php

use App\Models\BusinessTerm;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class BusinessTermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        BusinessTerm::truncate();
        Schema::enableForeignKeyConstraints();

        $admin = new BusinessTerm();
        $admin->insert([
            [
                'label_en'       => 'General',
                'label_jp'      => '一般媒介',
            ],
            [
                'label_en'       => 'Full-time',
                'label_jp'      => '専任媒介',
            ],
            [
                'label_en'       => 'Exclusive full-time',
                'label_jp'      => '専任媒介（専属専任）',
            ],

        ]);
    }
}
