<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(
            array(
                array('name' => 'Spital', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Farmacie', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Medic de familie', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Clinica privata', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Medic specilist', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Laboratoar de analiza', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Stomatologie', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Pacient', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Admin', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
        ));
    }
}
