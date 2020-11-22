<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('user_id');
            $table->string('invoice_id')->default('F000');
            $table->string('to');
            $table->string('phone_number');
            $table->string('email');
            $table->float('total_ht')->nullable();
            $table->float('total_ppc')->nullable();
            $table->float('tva')->nullable();
            $table->float('total_ttc')->nullable();
            $table->float('discount');
            $table->float('total_to_pay')->nullable();
            $table->timestamps();
            $table->foreign("client_id")->references("id")->on("clients");
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
        Schema::table("invoices",function (Blueprint $table){
            $table->dropForeign("invoices_client_id_foreign");
            $table->dropForeign("invoices_user_id_foreign");
        });
        Schema::dropIfExists('invoices');
    }
}
