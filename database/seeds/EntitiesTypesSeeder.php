<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class EntitiesTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('entities_types')->truncate();
        DB::table('entities_types')->insert(
            array(
                array('name' => 'hospital',  'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'pharmacies', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'familyDoctors',  'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'privateClinics',  'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'doctors',  'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'laboratories', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'dentists',  'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'privateAmbulances', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
        ));
    }
}
