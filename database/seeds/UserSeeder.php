<?php

use Carbon\Carbon;
use App\Models\User;
use App\Models\AdminRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run(){
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        $user = new User();
        $user->insert([
            [
                'belong_company_id'        => 1,
                'user_role_id'      => AdminRole::ROLE_GENERAL_ADMIN,
                'display_name'      => 'User Company',
                'email'             => 'user@company.com',
                'password'          => bcrypt('12345678'),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ]
        ]);

        factory(User::class, 299)->create();

    }
}
