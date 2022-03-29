<?php

use App\Models\PropertyPublicationStatus;
use Illuminate\Database\Seeder;

class PropertyPublicationStatusesSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        PropertyPublicationStatus::query()->delete();
        $data = new PropertyPublicationStatus();
        $data->insert([
            [
                'label_en' => PropertyPublicationStatus::NOT_PUBLISHED_LABEL_EN,
                'label_jp' => PropertyPublicationStatus::NOT_PUBLISHED_LABEL_JP,
            ],
            [
                'label_en' => PropertyPublicationStatus::PUBLISHED_LABEL_EN,
                'label_jp' => PropertyPublicationStatus::PUBLISHED_LABEL_JP,
            ],
        ]);
    }
}
