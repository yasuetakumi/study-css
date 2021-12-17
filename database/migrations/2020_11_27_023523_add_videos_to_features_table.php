<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVideosToFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('features', function (Blueprint $table) {
            $table->renameColumn('video', 'video1');
            $table->string('video2', 100)->nullable()->after('video');
            $table->string('video3', 100)->nullable()->after('video2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('features', function (Blueprint $table) {
            $table->renameColumn('video1', 'video');
            $table->dropColumn('video2');
            $table->dropColumn('video3');
        });
    }
}
