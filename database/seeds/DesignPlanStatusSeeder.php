<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\DesignPlanStatus;

class DesignPlanStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DesignPlanStatus::query()->delete();
        $data = new DesignPlanStatus();
        $data->insert([
            [
                'label_en'       => 'unpublished',
                'label_jp'      => '非公開',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'label_en'       => 'published',
                'label_jp'      => '公開',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],

        ]);
    }
}
