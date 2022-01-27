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
                'label_en'  => 'How to use',
			    'label_jp'  =>  '使い方に関して',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id'        =>  101,
                'label_en'  => 'If you forget your email address ',
			    'label_jp'  =>  'メールアドレスを忘れた場合',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id'        =>  901,
                'label_en'  => 'Property inquiry ',
			    'label_jp'  =>  '物件問い合わせ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
