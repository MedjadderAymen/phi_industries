<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('user_id');
            $table->string('quote_id')->default('F000');
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
        Schema::table("quotes",function (Blueprint $table){
            $table->dropForeign("quotes_client_id_foreign");
            $table->dropForeign("quotes_user_id_foreign");
        });
        Schema::dropIfExists('quotes');
    }
}
