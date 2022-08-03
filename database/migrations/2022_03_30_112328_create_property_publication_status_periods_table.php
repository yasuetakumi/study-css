<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyPublicationStatusPeriodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_publication_status_periods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('property_id');
            $table->date('status_start_date');
            $table->date('status_end_date')->nullable();
            $table->boolean('is_current_status');
            $table->integer('remaining_publication_days');
            $table->unsignedBigInteger('publication_status_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('property_id')->references('id')->on('properties')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('publication_status_id', 'property_publication_fk1')->references('id')->on('property_publication_statuses')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('property_publication_status_periods');
    }
}
