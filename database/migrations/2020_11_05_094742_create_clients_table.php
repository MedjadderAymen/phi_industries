<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger('user_id');
            $table->string('company_name')->unique();
            $table->string('phone_number');
            $table->string('code');
            $table->string('social_reason');
            $table->string('rc');
            $table->string('nif');
            $table->string('nis');
            $table->string('ai');
            $table->string('address');
            $table->foreign("user_id")->references("id")->on("users");
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
        Schema::table("clients",function (Blueprint $table){
            $table->dropForeign("clients_user_id_foreign");
        });

        Schema::dropIfExists('clients');
    }
}
