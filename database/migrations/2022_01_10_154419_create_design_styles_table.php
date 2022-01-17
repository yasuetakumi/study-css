<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignStylesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('design_styles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('display_name', 100);
            $table->unsignedBigInteger('tag_architecture_id')->nullable();
            $table->unsignedBigInteger('tag_color_id')->nullable();
            $table->unsignedBigInteger('tag_mood_id')->nullable();
            $table->unsignedBigInteger('tag_style_id')->nullable();
            $table->unsignedBigInteger('design_plan_status_id')->nullable();
            $table->text('description')->nullable();
            $table->integer('unit_price')->nullable();
            $table->string('thumbnail_image')->nullable();
            $table->string('perse_image_1')->nullable();
            $table->string('perse_image_2')->nullable();
            $table->string('perse_image_3')->nullable();
            $table->string('perse_image_4')->nullable();
            $table->string('perse_image_5')->nullable();
            $table->string('image')->nullable();
            $table->string('internal_id')->nullable();
            $table->integer('sort_order')->nullable();
            $table->string('designer_name')->nullable();
            $table->string('designer_url')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('tag_architecture_id')->references('id')->on('tag_architectures')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('tag_color_id')->references('id')->on('tag_colors')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('tag_mood_id')->references('id')->on('tag_moods')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('tag_style_id')->references('id')->on('tag_styles')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('design_plan_status_id')->references('id')->on('design_plan_statuses')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('design_styles');
    }
}
