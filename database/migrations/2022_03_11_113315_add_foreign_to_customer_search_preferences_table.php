<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToCustomerSearchPreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customer_search_preferences', function (Blueprint $table) {
            $table->unsignedBigInteger('skeleton_id')->nullable()->after('property_type');

            $table->foreign('skeleton_id')->references('id')->on('customer_skeleton_preferences')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customer_search_preferences', function (Blueprint $table) {
            $table->dropForeign(['skeleton_id']);
            $table->dropColumn('skeleton_id');
        });
    }
}
