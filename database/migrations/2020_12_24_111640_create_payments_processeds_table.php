<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsProcessedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments_processeds', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->unsignedBigInteger('purchase_id');

            // ! adding the relationship to the insurance cover table. 
            $table->foreign('purchase_id')->references('id')->on('purchases')->onDelete('cascade')->onUpdate('cascade');

            $table->text('payment_gateway');
            $table->integer('amount_paid');
            $table->unsignedBigInteger('payment_gateway_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments_processeds');
    }
}
