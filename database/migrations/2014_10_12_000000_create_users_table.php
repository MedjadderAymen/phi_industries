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
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamp('last_time_in')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('company');
            $table->string('description');
            $table->string('address');
            $table->string('phone_number');
            $table->string('rc');
            $table->string('nif');
            $table->string('ai');
            $table->string('nis');
            $table->rememberToken();
            $table->timestamps();
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
