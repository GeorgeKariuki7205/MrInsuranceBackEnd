<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubCategoryCoversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_category_covers', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();  
            $table->text('name');
            $table->longText('description');
            $table->unsignedBigInteger('cover_id');

            // ! adding the relationship to the covers table. 
            $table->foreign('cover_id')->references('id')->on('covers')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('sub_category_covers');
    }
}
