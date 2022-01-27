<?php

use App\Models\PermittedActivity;
use Illuminate\Database\Seeder;

class PermittedActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PermittedActivity::query()->delete();
        $data = new PermittedActivity();
        $data->insert([
            [
                'label_en'       => 'Light food and drink ',
                'label_jp'      => ' 軽飲食',
            ],
            [
                'label_en'       => 'Heavy eating and drinking ',
                'label_jp'      => '重飲食',
            ],
            [
                'label_en'       => 'Suitable for all restaurants such as bars and clubs',
                'label_jp'      => 'バー･クラブ等すべての飲食店向き  ',
            ],

        ]);
    }
}
