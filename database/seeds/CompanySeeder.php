<?php

use App\Models\Admin;
use App\Models\AdminRole;
use App\Models\Company;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    public function run(){
        // Insert main test data.
        $company = new Company();
        $company->insert([
            'company_admin_id'      => AdminRole::ROLE_COMPANY_ADMIN,
            'company_name'  => 'Grune',
            'post_code'     => '1000000',
            'address'       => 'Tokyo, Japan',
            'phone'         => '0987654321',
            'status'        => 'active',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ]);
        // Insert other test data.
        factory(Admin::class, 10)->create(['admin_role_id' => AdminRole::ROLE_COMPANY_ADMIN])->each(function ($admin) {
            $company = factory(Company::class)->make();
            $admin->company()->save($company);
        });
    }
}
