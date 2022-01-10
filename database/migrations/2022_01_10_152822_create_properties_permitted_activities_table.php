<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesPermittedActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties_permitted_activities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('properties_id')->nullable();
            $table->unsignedBigInteger('permitted_activities_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('properties_id')->references('id')->on('properties')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('permitted_activities_id')->references('id')->on('permitted_activities')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties_permitted_activities');
    }
}
