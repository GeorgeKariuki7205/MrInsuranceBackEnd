<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommercialThirdPartyCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motor_commercial_third_party_costs', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->unsignedBigInteger('commercial_class_id');

            // ! adding the relationship to the insurance cover table. 
            $table->foreign('commercial_class_id')->references('id')->on('motor_commercial_classes')->onDelete('cascade')->onUpdate('cascade');
            
            $table->unsignedBigInteger('type_third_party_id');

            // ! adding the relationship to the insurance cover table. 
            $table->foreign('type_third_party_id')->references('id')->on('motor_commercial_type_of_third_party_costs')->onDelete('cascade')->onUpdate('cascade');

            $table->bigInteger('min_value')->nullable();
            $table->bigInteger('max_value')->nullable();

            $table->bigInteger('cost')->nullable();
            $table->longText('type')->nullable();

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
        Schema::dropIfExists('commercial_third_party_costs');
    }
}
