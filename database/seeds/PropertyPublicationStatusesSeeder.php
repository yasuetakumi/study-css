<?php

use App\Models\PropertyPublicationStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class PropertyPublicationStatusesSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Schema::disableForeignKeyConstraints();
        PropertyPublicationStatus::truncate();
        Schema::enableForeignKeyConstraints();

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
            [
                'label_en' => PropertyPublicationStatus::LIMITED_PUBLISHED_LABEL_EN,
                'label_jp' => PropertyPublicationStatus::LIMITED_PUBLISHED_LABEL_JP,
            ],
        ]);
    }
}
