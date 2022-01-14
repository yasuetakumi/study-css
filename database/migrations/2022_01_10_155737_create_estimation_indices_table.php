<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstimationIndicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimation_indexes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('design_style_id')->nullable();
            $table->unsignedBigInteger('plan_id')->nullable();
            $table->string('design_name');
            $table->integer('tsubo_area')->nullable();
            $table->double('grand_total')->nullable();
            $table->boolean('has_kitchen')->nullable();
            $table->integer('design_category_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('design_style_id')->references('id')->on('design_styles')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('plan_id')->references('id')->on('plans')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estimation_indexes');
    }
}
