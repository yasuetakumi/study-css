<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDesignCategoryIdToDesignStylesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('design_styles', function (Blueprint $table) {
            $table->unsignedBigInteger('design_category_id')->nullable()->after('design_plan_status_id');

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
        Schema::table('design_styles', function (Blueprint $table) {
            $table->dropForeign(['design_category_id']);
            $table->dropColumn('design_category_id');
        });
    }
}
