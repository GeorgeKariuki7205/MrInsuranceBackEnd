<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoverQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cover_questions', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->unsignedBigInteger('cover_id');            

            // ! adding the relationship to the covers table. 
            $table->foreign('cover_id')->references('id')->on('covers')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger("sub_category_id")->nullable();

            // ! adding the relationship to the subCategory. 
            $table->foreign('sub_category_id')->references('id')->on('sub_category_covers')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger("cover_requirement_id");

            $table->foreign('cover_requirement_id')->references('id')->on('cover_requirements')->onDelete('cascade')->onUpdate('cascade');

            $table->text("question");
            $table->text("type");
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
        Schema::dropIfExists('cover_questions');
    }
}
