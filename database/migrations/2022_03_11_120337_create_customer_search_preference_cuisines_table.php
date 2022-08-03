<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerSearchPreferenceCuisinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_search_preference_cuisines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_search_preference_id');
            $table->unsignedBigInteger('cuisine_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('customer_search_preference_id', 'customer_search_preference_cuisine_fk')->references('id')->on('customer_search_preferences')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('cuisine_id', 'cuisine_id_fk')->references('id')->on('cuisines')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_search_preference_cuisines');
    }
}
