<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerSearchPreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_search_preferences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('customer_email');
            $table->boolean('is_email_enabled');
            $table->unsignedBigInteger('city_id')->nullable();
            $table->integer('surface_min')->nullable();
            $table->integer('surface_max')->nullable();
            $table->integer('rent_amount_min')->nullable();
            $table->integer('rent_amount_max')->nullable();
            $table->string('freetext')->nullable();
            $table->unsignedBigInteger('walking_distance')->nullable();
            $table->integer('transfer_price_min')->nullable();
            $table->integer('transfer_price_max')->nullable();
            $table->unsignedBigInteger('floor_under')->nullable();
            $table->unsignedBigInteger('floor_above')->nullable();
            $table->unsignedBigInteger('property_preference')->nullable();
            $table->unsignedBigInteger('property_type')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('city_id')->references('id')->on('cities')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('walking_distance')->references('id')->on('walking_distance_from_station_options')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('floor_under')->references('id')->on('number_of_floors_undergrounds')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('floor_above')->references('id')->on('number_of_floors_abovegrounds')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('property_preference')->references('id')->on('property_preferences')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('property_type')->references('id')->on('property_types')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_search_preferences');
    }
}
