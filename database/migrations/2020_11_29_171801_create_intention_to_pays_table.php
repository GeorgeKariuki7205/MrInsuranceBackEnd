<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntentionToPaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intention_to_pays', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->longText('uuid')->nullable();
            $table->longText('MerchantRequestID')->nullable();
            $table->longText('CheckoutRequestID')->nullable();
            $table->boolean('confirmed')->nullable()->default(false);
            $table->bigInteger('amountPayable')->nullable();
            $table->unsignedBigInteger('visitorId');

            $table->foreign('visitorId')->references('id')->on('visitors')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('InsuranceCoverId')->nullable();

            $table->foreign('InsuranceCoverId')->references('id')->on('insurance_covers')->onDelete('cascade')->onUpdate('cascade');
            
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
        Schema::dropIfExists('intention_to_pays');
    }
}
