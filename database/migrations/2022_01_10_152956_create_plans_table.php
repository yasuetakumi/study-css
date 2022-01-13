<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('display_name', 100);
            $table->unsignedBigInteger('area_group_id')->nullable();
            $table->unsignedBigInteger('design_plan_status_id')->nullable();
            $table->unsignedBigInteger('design_category_id')->nullable();
            $table->float('area')->nullable();
            $table->float('kitchen_area')->nullable();
            $table->float('hole_area')->nullable();
            $table->float('area_tsubo')->nullable();
            $table->integer('num_of_seats')->nullable();
            $table->integer('additional_price')->nullable();
            $table->integer('max_kitchen_staff')->nullable();
            $table->integer('max_hall_staff')->nullable();
            $table->float('length_out_wall')->nullable();
            $table->float('length_in_wall')->nullable();
            $table->text('description')->nullable();
            $table->text('internal_memo')->nullable();
            $table->string('thumbnail_image')->nullable();
            $table->string('image_1')->nullable();
            $table->string('image_2')->nullable();
            $table->string('image_3')->nullable();
            $table->string('image_4')->nullable();
            $table->string('image_5')->nullable();
            $table->string('image_360')->nullable();
            $table->string('kitchen_perse_image_1')->nullable();
            $table->string('kitchen_perse_image_2')->nullable();
            $table->string('kitchen_perse_image_3')->nullable();
            $table->string('internal_id')->nullable();
            $table->integer('sort_order')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('area_group_id')->references('id')->on('areas')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('design_plan_status_id')->references('id')->on('design_plan_statuses')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('design_category_id')->references('id')->on('cuisines')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plans');
    }
}
