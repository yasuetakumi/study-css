<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('prefecture_id')->nullable();
            $table->unsignedBigInteger('station_line_id')->nullable();
            $table->string('code', 10);
            $table->string('display_name', 100);
            $table->string('station_g_cd', 100)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('prefecture_id')->references('id')->on('prefectures')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('station_line_id')->references('id')->on('stations_lines')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stations');
    }
}
