<?php

use App\Models\AdminRole;
use Illuminate\Database\Seeder;

class AdminRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * name: use on control identifier.
     * label: display label.
     *
     * @return void
     */
    public function run(){
        // All delete.
        AdminRole::query()->delete();
        $admin = new AdminRole();
        $admin->insert([
            [
                'id'       => AdminRole::ROLE_SUPER_ADMIN,
                'name'       => 'super_admin',
                'label'      => 'Super Admin',
            ],
            [
                'id'       => AdminRole::ROLE_GENERAL_ADMIN,
                'name'       => 'admin',
                'label'      => 'Admin',
            ],
            [
                'id'       => AdminRole::ROLE_COMPANY_ADMIN,
                'name'       => 'company_admin',
                'label'      => 'Company Admin',
            ]
        ]);
    }
}
