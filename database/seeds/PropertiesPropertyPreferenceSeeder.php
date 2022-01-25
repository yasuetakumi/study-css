<?php

use App\Models\PropertiesPropertyPreference;
use Illuminate\Database\Seeder;

class PropertiesPropertyPreferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PropertiesPropertyPreference::query()->delete();
        factory(PropertiesPropertyPreference::class, 20)->create();
    }
}
