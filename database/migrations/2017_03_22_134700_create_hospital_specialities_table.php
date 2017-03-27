<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalSpecialitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital_specialities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hospital_id')->index()->unsigned()->nullable();
            $table->integer('speciality_id')->index()->unsigned()->nullable();
            $table->timestamps();
            
            $table->foreign('hospital_id')->references('id')->on('hospitals');
            $table->foreign('speciality_id')->references('id')->on('specialities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hospital_specialities', function (Blueprint $table) {
            $table->dropForeign('hospital_id');
    	});
        Schema::table('hospital_specialities', function (Blueprint $table) {
            $table->dropForeign('speciality_id');
    	});
        Schema::dropIfExists('hospital_specialities');
    }
}
