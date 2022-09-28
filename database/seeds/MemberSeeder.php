<?php

use App\Models\Member;
use App\Models\SocialAccount;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // truncate social_accounts table
        SocialAccount::truncate();

        Schema::disableForeignKeyConstraints();
        Member::truncate();
        Schema::enableForeignKeyConstraints();

        // dummy member login
        $member = new Member();
        $member->company_name = 'Grune';
        $member->name = 'Member';
        $member->name_kana = 'テストタロウ';
        $member->phone_number = '123-456-7890';
        $member->email = 'member@taberuba.com';
        $member->password = bcrypt('password');
        $member->save();

        factory(Member::class, 5)->create();
    }
}
