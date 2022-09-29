<?php

use App\Models\Member;
use Illuminate\Database\Seeder;
use App\Models\MemberFavoriteProperty;
use Illuminate\Support\Facades\Schema;

class MemberFavoritePropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        MemberFavoriteProperty::truncate();
        Schema::enableForeignKeyConstraints();

        factory(App\Models\MemberFavoriteProperty::class, 50)->create();
    }
}
