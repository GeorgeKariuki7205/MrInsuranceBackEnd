<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthAdditionalWaitingPeriodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_additional_waiting_periods', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->unsignedBigInteger('additional_id');

            // ! creating the relationship to the additional Table.
            $table->foreign('additional_id')->references('id')->on('health_additionals')->onDelete('cascade')->onUpdate('cascade');

            $table->longText('situation');
            $table->bigInteger('period_amount');
            $table->text('period_time');
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
        Schema::dropIfExists('additional_waiting_periods');
    }
}
