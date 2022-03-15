<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerSearchPreferencesPropertyTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_search_preferences_property_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_search_preference_id');
            $table->unsignedBigInteger('property_type_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('customer_search_preference_id', 'fk_csp_property_types1')->references('id')->on('customer_search_preferences')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('property_type_id', 'fk_csp_property_types2')->references('id')->on('property_types')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_search_preferences_property_types');
    }
}
