<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsNeededsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents_neededs', function (Blueprint $table) {
            $table->id();
            $table->engine = "InnoDB";
            $table->unsignedBigInteger('cover_id');

            // ! adding the relationship to the covers table. 
            $table->foreign('cover_id')->references('id')->on('covers')->onDelete('cascade')->onUpdate('cascade');

            $table->boolean('required')->nullable()->default(false);
            $table->longText('name');
            $table->longText('description');
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
        Schema::dropIfExists('documents_neededs');
    }
}
