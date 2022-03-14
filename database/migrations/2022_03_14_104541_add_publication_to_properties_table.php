<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPublicationToPropertiesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('properties', function (Blueprint $table) {
            $table->unsignedBigInteger('publication_status_id')->default(1)->after('location');
            $table->timestamp('publication_date')->nullable()->after('publication_status_id');

            $table->foreign('publication_status_id')->references('id')->on('property_publication_statuses')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropForeign('publication_status_id');
            $table->dropColumn('publication_status_id');
            $table->dropColumn('publication_date');
        });
    }
}
