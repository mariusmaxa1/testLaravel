<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->integer('active')->default(1); 
            $table->integer('role_id')->index()->unsigned()->nullable();
            $table->timestamps();
            
            // $table->foreign('role_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /* Schema::table('roles', function (Blueprint $table) {
            $table->dropForeign('role_id');
    	});*/
        Schema::dropIfExists('surveys');
    }
}
