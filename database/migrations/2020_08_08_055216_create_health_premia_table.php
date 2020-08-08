<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthPremiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_premia', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->integer('min_age');
            $table->integer('max_age');
            $table->unsignedBigInteger('covered_amount_id');

            // ! adding the relationship to the cover amounts table. 
            $table->foreign('covered_amount_id')->references('id')->on('health_cover_amounts')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('number_of_children');
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
        Schema::dropIfExists('premia');
    }
}
