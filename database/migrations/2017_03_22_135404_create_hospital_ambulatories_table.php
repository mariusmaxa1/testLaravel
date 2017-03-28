<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalAmbulatoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital_ambulatories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hospital_id')->index()->unsigned()->nullable();
            $table->integer('ambulatory_id')->index()->unsigned()->nullable();
            $table->timestamps();
            
           /* $table->foreign('hospital_id')->references('id')->on('hospitals');
            $table->foreign('ambulatory_id')->references('id')->on('ambulatories');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       /* Schema::table('hospital_ambulatories', function (Blueprint $table) {
            $table->dropForeign('hospital_id');
    	});
        Schema::table('hospital_ambulatories', function (Blueprint $table) {
            $table->dropForeign('ambulatory_id');
    	});*/
        Schema::dropIfExists('hospital_ambulatories');
    }
}
