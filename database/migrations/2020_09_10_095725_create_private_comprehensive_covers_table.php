<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrivateComprehensiveCoversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motor_private_comprehensive_covers', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->unsignedBigInteger('private_cost_id');
            // ! adding the relationship to the insurance cover table. 
            $table->foreign('private_cost_id')->references('id')->on('motor_private_cost_details')->onDelete('cascade')->onUpdate('cascade');

            $table->bigInteger('min_sum_insured');
            $table->bigInteger('sum_insured_from_value');
            $table->bigInteger('sum_insured_to_value');
            $table->bigInteger('rate');
            $table->bigInteger('minimum_premium_amount')->nullable();
            $table->bigInteger('min_age')->nullable();
            $table->bigInteger('max_age')->nullable();           
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
        Schema::dropIfExists('private_comprehensive_covers');
    }
}
