<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_admin_id')->nullable();
            $table->foreign('company_admin_id')->references('id')->on('admins')->onUpdate('cascade')->onDelete('set null');
            $table->string('company_name',50);
            $table->string('company_name_kana')->nullable();
            $table->string('agent_license_name')->nullable();
            $table->string('agent_license_renewals')->nullable();
            $table->string('agent_license_number')->nullable();
            $table->string('post_code',7);
            $table->string('address',100);
            $table->string('phone',20);
            $table->string('fax')->nullable();
            $table->string('url')->nullable();
            $table->string('status', 50);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
