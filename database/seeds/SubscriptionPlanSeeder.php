<?php

use App\Models\SubscriptionPlan;
use Illuminate\Database\Seeder;

class SubscriptionPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubscriptionPlan::query()->delete();
        $data = new SubscriptionPlan();
        $data->insert([
            [
                'label_en'      => 'Silver',
                'label_jp'      => '銀',
                'stripe_plan'   => 'silver_1',
                'cost'          => 100,
                'description'   => 'Package Silver'
            ],
            [
                'label_en'      => 'Gold',
                'label_jp'      => 'ゴールド',
                'stripe_plan'   => 'gold_1',
                'cost'          => 500,
                'description'   => 'Package Gold'
            ],
            [
                'label_en'      => 'Platinum',
                'label_jp'      => '白金',
                'stripe_plan'   => 'platinum_1',
                'cost'          => 1000,
                'description'   => 'Package Platinum'
            ],

        ]);
    }
}
