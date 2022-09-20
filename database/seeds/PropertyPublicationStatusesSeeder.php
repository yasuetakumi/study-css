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
                'id' => PropertyPublicationStatus::ID_NOT_PUBLISHED,
                'label_en' => PropertyPublicationStatus::NOT_PUBLISHED_LABEL_EN,
                'label_jp' => PropertyPublicationStatus::NOT_PUBLISHED_LABEL_JP,
            ],
            [
                'id' => PropertyPublicationStatus::ID_PUBLISHED,
                'label_en' => PropertyPublicationStatus::PUBLISHED_LABEL_EN,
                'label_jp' => PropertyPublicationStatus::PUBLISHED_LABEL_JP,
            ],
            [
                'id' => PropertyPublicationStatus::ID_LIMITED_PUBLISHED,
                'label_en' => PropertyPublicationStatus::LIMITED_PUBLISHED_LABEL_EN,
                'label_jp' => PropertyPublicationStatus::LIMITED_PUBLISHED_LABEL_JP,
            ],
            [
                'id' => PropertyPublicationStatus::ID_MANUALLY_DELETED,
                'label_en' => PropertyPublicationStatus::MANUALLY_DELETED_LABEL_EN,
                'label_jp' => PropertyPublicationStatus::MANUALLY_DELETED_LABEL_JP,
            ],
            [
                'id' => PropertyPublicationStatus::ID_EXPIRED,
                'label_en' => PropertyPublicationStatus::EXPIRED_LABEL_EN,
                'label_jp' => PropertyPublicationStatus::EXPIRED_LABEL_JP,
            ],
        ]);
    }
}
