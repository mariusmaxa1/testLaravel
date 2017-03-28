<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital_doctors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hospital_id')->index()->unsigned()->nullable();
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
        /* Schema::table('hospital_doctors', function (Blueprint $table) {
            $table->dropForeign('hospital_id');
    	});*/
        Schema::dropIfExists('hospital_doctors');
    }
}
