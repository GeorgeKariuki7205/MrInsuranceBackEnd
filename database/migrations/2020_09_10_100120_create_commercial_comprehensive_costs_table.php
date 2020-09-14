<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommercialComprehensiveCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motor_commercial_comprehensive_costs', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->bigInteger('sum_insured_from_value');
            $table->bigInteger('sum_insured_to_value');

            $table->unsignedBigInteger('commercial_class_id');

            // ! adding the relationship to the insurance cover table. 
            $table->foreign('commercial_class_id')->references('id')->on('motor_commercial_classes')->onDelete('cascade')->onUpdate('cascade');

            $table->bigInteger('rate');
            
            
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
        Schema::dropIfExists('commercial_comprehensive_costs');
    }
}
