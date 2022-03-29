<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('postcode_id')->nullable();
            $table->unsignedBigInteger('prefecture_id')->nullable();
            $table->string('location')->nullable();
            $table->unsignedBigInteger('publication_status_id')->default(1);
            $table->timestamp('publication_date')->nullable();
            $table->integer('surface_area')->nullable();
            $table->integer('rent_amount')->nullable();
            $table->integer('number_of_floors_under_ground')->nullable();
            $table->integer('number_of_floors_above_ground')->nullable();
            $table->unsignedBigInteger('property_type_id')->nullable();
            $table->unsignedBigInteger('structure_id')->nullable();
            $table->integer('deposit_amount')->nullable();
            $table->integer('monthly_maintainance_fee')->nullable();
            $table->string('repayment')->nullable();
            $table->date('date_built')->nullable();
            $table->string('renewal_fee')->nullable();
            $table->integer('contract_length_in_months')->nullable();
            $table->integer('special_moving_fee')->nullable();
            $table->unsignedBigInteger('business_terms_id')->nullable();
            $table->text('comment')->nullable();
            $table->boolean('is_skeleton')->nullable();
            $table->unsignedBigInteger('cuisine_id')->nullable();
            $table->integer('interior_transfer_price')->nullable();
            $table->string('thumbnail_image_main')->nullable();
            $table->string('thumbnail_image_1')->nullable();
            $table->string('thumbnail_image_2')->nullable();
            $table->string('thumbnail_image_3')->nullable();
            $table->string('thumbnail_image_4')->nullable();
            $table->string('thumbnail_image_5')->nullable();
            $table->string('thumbnail_image_6')->nullable();
            $table->string('image_1')->nullable();
            $table->string('image_2')->nullable();
            $table->string('image_3')->nullable();
            $table->string('image_4')->nullable();
            $table->string('image_5')->nullable();
            $table->string('image_6')->nullable();
            $table->string('image_7')->nullable();
            $table->string('image_8')->nullable();
            $table->string('image_9')->nullable();
            $table->string('image_10')->nullable();
            $table->string('image_360_1')->nullable();
            $table->string('image_360_2')->nullable();
            $table->string('image_360_3')->nullable();
            $table->string('image_360_4')->nullable();
            $table->string('image_360_5')->nullable();
            $table->timestamps();
            $table->softDeletes();

            //add relation
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('postcode_id')->references('id')->on('postcodes')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('prefecture_id')->references('id')->on('prefectures')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('property_type_id')->references('id')->on('property_types')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('structure_id')->references('id')->on('structures')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('business_terms_id')->references('id')->on('business_terms')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('cuisine_id')->references('id')->on('cuisines')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('publication_status_id')->references('id')->on('property_publication_statuses')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
