<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicationQuote extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medication_quote', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('quote_id');
            $table->unsignedBigInteger('medication_id');
            $table->integer('quantity');
            $table->float('total_price');
            $table->foreign('quote_id')->references('id')->on('quotes')->onDelete('cascade');
            $table->foreign('medication_id')->references('id')->on('medications');
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
        Schema::table("medication_quote",function (Blueprint $table){
            $table->dropForeign("medication_quote_quote_id_foreign");
            $table->dropForeign("medication_quote_medication_id_foreign");
        });

        Schema::dropIfExists('quote_medication');
    }
}
