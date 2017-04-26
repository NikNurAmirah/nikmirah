<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question', function (Blueprint $table){
            $table->increments('id')->onDelete('cascade');
            $table->longText('title');
            $table->integer('creator_id')->unsigned()->default(0);
            $table->integer('pre_question_id')->nullable()->unsigned();
            $table->integer('survey_id')->unsigned();
            $table->string('question_type');
            $table->boolean('require')->default(false);
            $table->timestamps();
        });

        Schema::table('question', function($table) {
            $table->foreign('pre_question_id')->references('id')->on('question');
            $table->foreign('survey_id')->references('id')->on('survey')->onDelete('cascade');
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('cascade');
        });

    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('question');
    }
}
