<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('covers', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->timestamps();            
            $table->text('name');
            $table->text('route_name');
            $table->longText('description');
            $table->text('icon');
            $table->boolean('has_sub_categories');
            $table->integer('cover_perdiod');
            $table->text('period');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('covers');
    }
}
