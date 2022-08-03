<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerSearchPreferenceCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_search_preference_cities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_search_preference_id');
            $table->unsignedBigInteger('city_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('customer_search_preference_id', 'fk_csp_cities1')->references('id')->on('customer_search_preferences')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('city_id')->references('id')->on('cities')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_search_preference_cities');
    }
}
