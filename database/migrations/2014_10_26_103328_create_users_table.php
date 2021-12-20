<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('belong_company_id')->nullable();
            $table->foreign('belong_company_id')->references('id')->on('companies')->onUpdate('cascade')->onDelete('set null');

            $table->unsignedBigInteger('user_role_id')->nullable();
            $table->foreign('user_role_id')->references('id')->on('user_roles')->onUpdate('cascade')->onDelete('set null');

            $table->string('display_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
