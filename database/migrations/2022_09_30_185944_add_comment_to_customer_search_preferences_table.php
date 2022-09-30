<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCommentToCustomerSearchPreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customer_search_preferences', function (Blueprint $table) {
            $table->text('comment')->nullable()->after('skeleton_id');
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
            $table->dropColumn('comment');
        });
    }
}
