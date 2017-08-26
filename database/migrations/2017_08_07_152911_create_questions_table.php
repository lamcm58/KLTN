<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('question_code', 20);
            $table->tinyInteger('question_type', false, true);
            $table->string('question_category', 500)->nullable();
            $table->text('question_content');
            $table->text('answer')->nullable();
            $table->integer('survey_id', false, true);
            $table->foreign('survey_id')->references('id')->on('surveys')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('questions');
    }
}
