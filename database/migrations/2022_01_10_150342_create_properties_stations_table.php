<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties_stations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('station_id')->nullable();
            $table->unsignedBigInteger('property_id')->nullable();
            $table->unsignedBigInteger('distance_from_station')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('station_id')->references('id')->on('stations')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('property_id')->references('id')->on('properties')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('distance_from_station')->references('id')->on('walking_distance_from_station_options')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties_stations');
    }
}
