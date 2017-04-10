<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveysAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveys_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('question_id')->index()->unsigned()->nullable();
            $table->string('name');
            $table->integer('order');
            $table->timestamps();
            
            // $table->foreign('question_id')->references('id')->on('surveys_questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /* Schema::table('surveys_questions', function (Blueprint $table) {
            $table->dropForeign('question_id');
    	});*/
        Schema::dropIfExists('surveys_answers');
    }
}
