<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthNotCoveredsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_not_covereds', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->longText('name');
            $table->unsignedBigInteger('insurance_covers_id');

            // ! creating the relationship to the insurance providers. 
            $table->foreign('insurance_covers_id')->references('id')->on('insurance_covers')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('not_covereds');
    }
}
