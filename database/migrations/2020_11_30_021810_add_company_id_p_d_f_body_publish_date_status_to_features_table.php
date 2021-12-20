<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCompanyIdPDFBodyPublishDateStatusToFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('features', function (Blueprint $table) {
            $table->unsignedBigInteger('company_id')->nullable()->after('title');
            $table->foreign('company_id')->references('id')->on('companies')->onUpdate('cascade')->onDelete('set null');

            $table->string('pdf_file', 100)->nullable()->after('company_id');
            $table->mediumText('body')->after('pdf_file');

            $table->date('publish_date')->after('body');
            $table->string('status', 100)->after('publish_date');
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
            $table->dropForeign(['company_id']);
            $table->dropColumn('company_id');
            $table->dropColumn('pdf_file');
            $table->dropColumn('body');
            $table->dropColumn('publish_date');
            $table->dropColumn('status');
        });
    }
}
