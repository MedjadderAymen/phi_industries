<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('quantity');
            $table->string('description');
            $table->string('image');
            $table->unsignedBigInteger('user_id');
            $table->integer('modified_by');
            $table->timestamps();
            $table->foreign("user_id")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("medications",function (Blueprint $table){
            $table->dropForeign("medications_user_id_foreign");
        });
        Schema::dropIfExists('medications');
    }
}
