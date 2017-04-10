<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveysQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveys_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('section_id')->index()->unsigned()->nullable();
            $table->string('name');
            $table->integer('order');
            $table->integer('active')->default(1);
            $table->string('displayMode');
            $table->timestamps();
            
            // $table->foreign('section_id')->references('id')->on('surveys_sections');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /* Schema::table('surveys_sections', function (Blueprint $table) {
            $table->dropForeign('section_id');
    	});*/
        Schema::dropIfExists('surveys_questions');
    }
}
