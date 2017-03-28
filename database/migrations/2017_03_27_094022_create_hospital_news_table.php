<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital_news', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hospital_id')->index()->unsigned()->nullable();
            $table->string('name');
            $table->text('description');
            $table->string('photo');
            $table->integer('active')->default(1);
            $table->timestamps();
            
            // $table->foreign('hospital_id')->references('id')->on('hospitals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       /* Schema::table('hospital_news', function (Blueprint $table) {
            $table->dropForeign('hospital_id');
    	});*/
        Schema::dropIfExists('hospital_news');
    }
}
