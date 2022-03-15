<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerSearchPreferencesFloorAbovesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_search_preferences_floor_aboves', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_search_preference_id');
            $table->unsignedBigInteger('floor_above_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('customer_search_preference_id', 'fk_csp_floor_above1')->references('id')->on('customer_search_preferences')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('floor_above_id', 'fk_csp_floor_above2')->references('id')->on('number_of_floors_abovegrounds')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_search_preferences_floor_aboves');
    }
}
