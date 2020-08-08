<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthWaitingPeriodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_waiting_periods', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->unsignedBigInteger('insurance_providers_id');

            // ! creating the relationship to the insurance providers. 
            $table->foreign('insurance_providers_id')->references('id')->on('insurance_providers')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('waiting_periods');
    }
}
