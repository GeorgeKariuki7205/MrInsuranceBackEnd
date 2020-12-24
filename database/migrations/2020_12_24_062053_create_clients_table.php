<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->engine = "InnoDB";
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->boolean('has_agent')->nullable()->default(false);

            $table->unsignedBigInteger('agent_id')->nullable();

            $table->foreign('agent_id')->references('id')->on('agents')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('visitorId');

            $table->foreign('visitorId')->references('id')->on('visitors')->onDelete('cascade')->onUpdate('cascade');

            $table->longText('uuidGenerated');
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
        Schema::dropIfExists('clients');
    }
}
