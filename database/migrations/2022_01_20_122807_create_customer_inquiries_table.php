<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerInquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_inquiries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('property_id')->nullable();
            $table->unsignedBigInteger('contact_us_type_id')->nullable();
            $table->string('subject', 100)->nullable();
            $table->text('text')->nullable();
			$table->boolean('flag')->nullable();
			$table->boolean('is_finish')->nullable();
			$table->string('person_in_charge', 45)->nullable();
			$table->text('note')->nullable();
			$table->string('name', 45)->nullable();
			$table->string('email', 191)->nullable();
			$table->string('company_name', 50)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('property_id')->references('id')->on('properties')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('contact_us_type_id')->references('id')->on('contact_us_types')->onUpdate('cascade')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_inquiries');
    }
}
