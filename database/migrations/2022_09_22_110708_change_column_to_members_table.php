<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnToMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('members', function (Blueprint $table) {
            $table->string('name_kana')->nullable()->after('name_furigana');
            $table->boolean('is_line_notification_enabled')->nullable()->after('line_id')->default(true);
            $table->boolean('is_email_notification_enabled')->nullable()->after('is_line_notification_enabled')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('members', function (Blueprint $table) {
            $table->dropColumn('name_kana');
            $table->dropColumn('is_line_notification_enabled');
            $table->dropColumn('is_email_notification_enabled');
        });
    }
}
