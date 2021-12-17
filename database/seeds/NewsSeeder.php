<?php

use App\Models\News;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run(){
        factory(News::class, 10)->create();
    }
}
