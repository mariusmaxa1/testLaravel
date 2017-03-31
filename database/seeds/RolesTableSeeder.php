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
        DB::table('roles')->truncate();
        DB::table('roles')->insert(
            array(
                array('name' => 'Spital', 'alias' => 'hospital', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Farmacie', 'alias' => 'default', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Medic de familie', 'alias' => 'default', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Clinica privata', 'alias' => 'default', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Medic specilist', 'alias' => 'default', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Laboratoar de analiza', 'alias' => 'default', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Stomatologie', 'alias' => 'default', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Pacient', 'alias' => 'patient', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Admin', 'alias' => 'admin','created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Ambulanta privata', 'alias' => 'default','created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
        ));
    }
}
        