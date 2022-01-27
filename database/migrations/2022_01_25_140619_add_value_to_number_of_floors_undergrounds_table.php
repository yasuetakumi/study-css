<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddValueToNumberOfFloorsUndergroundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('number_of_floors_undergrounds', function (Blueprint $table) {
            $table->string('value')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('number_of_floors_undergrounds', function (Blueprint $table) {
            $table->dropColumn('value');
        });
    }
}
