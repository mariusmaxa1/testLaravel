<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveysSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveys_sections', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('survey_id')->index()->unsigned()->nullable();
            $table->string('name');
            $table->integer('order');
            $table->integer('active')->default(1); 
            $table->timestamps();
            
            // $table->foreign('survey_id')->references('id')->on('surveys');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /* Schema::table('surveys', function (Blueprint $table) {
            $table->dropForeign('survey_id');
    	});*/
        Schema::dropIfExists('surveys_sections');
    }
}
