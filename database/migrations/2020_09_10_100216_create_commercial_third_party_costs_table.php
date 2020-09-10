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
        Schema::create('commercial_third_party_costs', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->unsignedBigInteger('type_of_third_party_id');

            // ! adding the relationship to the insurance cover table. 
            $table->foreign('type_of_third_party_id')->references('id')->on('commercial_type_of_third_party_costs')->onDelete('cascade')->onUpdate('cascade');

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
