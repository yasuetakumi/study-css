<?php

use App\Models\Admin;
use App\Models\AdminRole;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run(){
        $admin = new Admin();
        $admin->insert([
            [
                'display_name'      => 'Super Admin',
                'email'             => 'admin@admin.com',
                'admin_role_id'     => AdminRole::ROLE_SUPER_ADMIN,
                'email_verified_at' => Carbon::now(),
                'password'          => bcrypt('12345678'),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'display_name'      => 'General Admin',
                'email'             => 'general@admin.com',
                'admin_role_id'     => AdminRole::ROLE_GENERAL_ADMIN,
                'email_verified_at' => Carbon::now(),
                'password'          => bcrypt('12345678'),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'display_name'      => 'Grune Company Admin',
                'email'             => 'company@admin.com',
                'admin_role_id'     => AdminRole::ROLE_COMPANY_ADMIN,
                'email_verified_at' => Carbon::now(),
                'password'          => bcrypt('12345678'),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ]
        ]);

        factory(Admin::class, 97)->create();

    }
}
