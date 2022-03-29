<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerSearchPreferenceStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_search_preference_stations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_search_preference_id');
            $table->unsignedBigInteger('station_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('customer_search_preference_id', 'customer_search_preference_station_fk')->references('id')->on('customer_search_preferences')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('station_id', 'station_id_fk')->references('id')->on('stations')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_search_preference_stations');
    }
}
