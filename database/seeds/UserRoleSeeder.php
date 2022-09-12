<?php

use App\Models\UserRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run(){
        Schema::disableForeignKeyConstraints();
        UserRole::truncate();
        Schema::enableForeignKeyConstraints();

        $admin = new UserRole();
        $admin->insert([
            [
                'id'         => UserRole::ROLE_SUPERVISOR,
                'name'       => 'supervisor',
                'label'      => '管理者',
            ],
            [
                'id'         => UserRole::ROLE_OPERATOR,
                'name'       => 'operator',
                'label'      => '通常',
            ]
        ]);
    }
}
