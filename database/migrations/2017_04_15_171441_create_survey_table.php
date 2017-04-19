<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('creator_id')->unsigned()->default(0);
           $table->foreign('creator_id')->references('id')->on('users')->onDelete('cascade');
           $table->string('slug')->unique();
           $table->longText('title')->nullable();
           $table->longText('description')->nullable();
           $table->boolean('active')->default(false);
           $table->boolean('anonymous')->default(false);
           $table->timestamps();
           $table->timestamp('published_at')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('survey');
    }
}
