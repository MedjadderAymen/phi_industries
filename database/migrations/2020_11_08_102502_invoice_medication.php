<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InvoiceMedication extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_medication', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('invoice_id');
            $table->unsignedBigInteger('medication_id');
            $table->integer('quantity');
            $table->integer('total_price');
            $table->foreign('invoice_id')->references('id')->on('invoices');
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
    
        Schema::table("invoice_medication",function (Blueprint $table){
            $table->dropForeign("invoice_medication_invoice_id_foreign");
            $table->dropForeign("invoice_medication_invoice_id_foreign");
        });

        Schema::dropIfExists('invoice_medication');

    }
}
