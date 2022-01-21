<?php

use App\Models\TagMood;
use Illuminate\Database\Seeder;

class TagMoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TagMood::query()->delete();
        $data = new TagMood();

        $data->insert(array (
            0 =>
            array (
                'id' => 1,
                'label_en' => 'calming',
                'label_jp' => '落ち着く',
            ),
            1 =>
            array (
                'id' => 2,
                'label_en' => 'bright',
                'label_jp' => '賑やか',
            ),
        ));

    }
}
