<?php

use Illuminate\Database\Seeder;

class MemberFavoritePropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\MemberFavoriteProperty::class, 100)->create();
    }
}
