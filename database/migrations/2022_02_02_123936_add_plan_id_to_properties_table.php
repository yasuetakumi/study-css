<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPlanIdToPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->unsignedBigInteger('plan_id')->nullable()->after('city_id');

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
        if (Schema::hasColumn('properties', 'plan_id')){
            Schema::table('properties', function (Blueprint $table)
            {
                $table->dropForeign(['plan_id']);
                $table->dropColumn('plan_id');
            });
        }

    }
}
