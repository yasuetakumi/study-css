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
            $table->integer('surface_min')->nullable();
            $table->integer('surface_max')->nullable();
            $table->integer('rent_amount_min')->nullable();
            $table->integer('rent_amount_max')->nullable();
            $table->string('freetext')->nullable();
            $table->unsignedBigInteger('walking_distance')->nullable();
            $table->integer('transfer_price_min')->nullable();
            $table->integer('transfer_price_max')->nullable();
            $table->unsignedBigInteger('skeleton_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('skeleton_id')->references('id')->on('customer_skeleton_preferences')->onUpdate('NO ACTION')->onDelete('NO ACTION');
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
