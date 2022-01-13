<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesPropertyPreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties_property_preferences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('properties_id')->nullable();
            $table->unsignedBigInteger('property_preferences_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('properties_id')->references('id')->on('properties')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('property_preferences_id')->references('id')->on('property_preferences')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties_property_preferences');
    }
}
