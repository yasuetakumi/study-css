<?php

use App\Models\UserRole;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run(){
        $admin = new UserRole();
        $admin->insert([
            [
                'id'         => UserRole::ROLE_SUPERVISOR,
                'name'       => 'supervisor',
                'label'      => 'Super Visor',
            ],
            [
                'id'         => UserRole::ROLE_OPERATOR,
                'name'       => 'operator',
                'label'      => 'Operator',
            ]
        ]);
    }
}
