<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitor_records', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->unsignedBigInteger('visitorId');

            $table->foreign('visitorId')->references('id')->on('visitors')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('cover_id');

            $table->foreign('cover_id')->references('id')->on('covers')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('subCategory_id');

            $table->foreign('subCategory_id')->references('id')->on('sub_category_covers')->onDelete('cascade')->onUpdate('cascade');
            
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
        Schema::dropIfExists('visitor_records');
    }
}
