<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthBenefitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_benefits', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->unsignedBigInteger('covered_amount_id');

            // ! creating the relationship to the covered Amounts. 
            $table->foreign('covered_amount_id')->references('id')->on('health_cover_amounts')->onDelete('cascade')->onUpdate('cascade');

            $table->longText('name');
            $table->integer('type_of_benefit');
            $table->bigInteger('amount')->nullable();
            
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
        Schema::dropIfExists('benefits');
    }
}
