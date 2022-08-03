<?php

use Carbon\Carbon;
use App\Models\ContactUsType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ContactUsTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        ContactUsType::truncate();
        Schema::enableForeignKeyConstraints();
        $ContactUsType = new ContactUsType();
        $ContactUsType->insert([
            [
                'id'        =>  1,
                'label_en'  =>  'Ask Property Detail',
			    'label_jp'  =>  '詳細条件について',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id'        =>  2,
                'label_en'  =>  'Ask Property Environment',
			    'label_jp'  =>  '物件周囲の環境について',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id'        =>  3,
                'label_en'  =>  'Ask Visit Property',
			    'label_jp'  =>  '内見希望',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id'        =>  4,
                'label_en'  =>  'Other',
			    'label_jp'  =>  'その他',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
