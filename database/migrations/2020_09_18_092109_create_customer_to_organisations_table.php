<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerToOrganisationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_to_organisations', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->longText('MerchantRequestID')->nullable();
            $table->longText('CheckoutRequestID')->nullable();
            $table->float('Amount')->nullable();
            $table->longText('MpesaReceiptNumber')->nullable();
            $table->longText('TransactionDate')->nullable();
            $table->longText('PhoneNumber')->nullable();
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
        Schema::dropIfExists('customer_to_organisations');
    }
}
