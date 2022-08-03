<?php

use App\Models\BusinessTerm;
use Illuminate\Database\Seeder;

class BusinessTermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BusinessTerm::query()->delete();
        $admin = new BusinessTerm();
        $admin->insert([
            [
                'label_en'       => 'General',
                'label_jp'      => ' 一般媒介',
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
