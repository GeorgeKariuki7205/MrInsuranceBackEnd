<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->longText('purchase_invoice_id');
            $table->unsignedBigInteger('insurance_cover_id');            

            // ! adding the relationship to the insurance cover table. 
            $table->foreign('insurance_cover_id')->references('id')->on('insurance_covers')->onDelete('cascade')->onUpdate('cascade');
            
            $table->unsignedBigInteger('client_id');

            // ! adding the relationship to the insurance cover table. 
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade')->onUpdate('cascade');

            $table->dateTime('date_of_purchase');
            $table->date('start_date_of_contract')->nullable();
            $table->date('end_date_of_contract')->nullable();            
            $table->float('percentage_of_payment',10,9);
            $table->unsignedInteger('cost');
            $table->unsignedInteger('amount_paid');            
            $table->date('next_payment_period')->nullable();
            $table->boolean('details_disparched')->nullable()->default(false);
            $table->boolean('accompanying_documents_uploaded')->nullable()->default(false);
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
        Schema::dropIfExists('purchases');
    }
}
