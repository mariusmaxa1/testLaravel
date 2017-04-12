<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class TestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('users')->insert(
            array(
                array('name' => 'Cont spital',
                    'email' => 'spital@calitatespitale.ro',
                    'password' => Hash::make('admin123'), 
                    'role_id' => 1,
                    'active' => 1,
                    'created_at' => Carbon::now(), 
                    'updated_at' => Carbon::now()),
        ));
        
        DB::table('users')->insert(
            array(
                array('name' => 'Cont farmacie',
                    'email' => 'farmacie@calitatespitale.ro',
                    'password' => Hash::make('admin123'), 
                    'role_id' => 2,
                    'active' => 1,
                    'created_at' => Carbon::now(), 
                    'updated_at' => Carbon::now()),
        ));
        DB::table('users')->insert(
            array(
                array('name' => 'Cont medic de familie',
                    'email' => 'medicdefamilie@calitatespitale.ro',
                    'password' => Hash::make('admin123'), 
                    'role_id' => 3,
                    'active' => 1,
                    'created_at' => Carbon::now(), 
                    'updated_at' => Carbon::now()),
        ));
        DB::table('users')->insert(
            array(
                array('name' => 'Cont clinica privata',
                    'email' => 'clinica@calitatespitale.ro',
                    'password' => Hash::make('admin123'), 
                    'role_id' => 4,
                    'active' => 1,
                    'created_at' => Carbon::now(), 
                    'updated_at' => Carbon::now()),
        ));
        DB::table('users')->insert(
            array(
                array('name' => 'Cont medic specialist',
                    'email' => 'medicspecialist@calitatespitale.ro',
                    'password' => Hash::make('admin123'), 
                    'role_id' => 5,
                    'active' => 1,
                    'created_at' => Carbon::now(), 
                    'updated_at' => Carbon::now()),
        ));
        DB::table('users')->insert(
            array(
                array('name' => 'Cont Laborator de analiza',
                    'email' => 'laborator@calitatespitale.ro',
                    'password' => Hash::make('admin123'), 
                    'role_id' => 6,
                    'active' => 1,
                    'created_at' => Carbon::now(), 
                    'updated_at' => Carbon::now()),
        ));
        DB::table('users')->insert(
            array(
                array('name' => 'Cont stomatologie',
                    'email' => 'stomatologie@calitatespitale.ro',
                    'password' => Hash::make('admin123'), 
                    'role_id' => 7,
                    'active' => 1,
                    'created_at' => Carbon::now(), 
                    'updated_at' => Carbon::now()),
        ));
        DB::table('users')->insert(
            array(
                array('name' => 'Cont pacient',
                    'email' => 'pacient@calitatespitale.ro',
                    'password' => Hash::make('admin123'), 
                    'role_id' => 8,
                    'active' => 1,
                    'created_at' => Carbon::now(), 
                    'updated_at' => Carbon::now()),
        ));
        DB::table('users')->insert(
            array(
                array('name' => 'Cont Admin',
                    'email' => 'admin@calitatespitale.ro',
                    'password' => Hash::make('admin123'), 
                    'role_id' => 9,
                    'active' => 1,
                    'created_at' => Carbon::now(), 
                    'updated_at' => Carbon::now()),
        ));
        DB::table('users')->insert(
            array(
                array('name' => 'Cont Ambulanta privata',
                    'email' => 'ambulanta@calitatespitale.ro',
                    'password' => Hash::make('admin123'), 
                    'role_id' => 10,
                    'active' => 1,
                    'created_at' => Carbon::now(), 
                    'updated_at' => Carbon::now()),
        ));
        
        DB::table('hospitals')->truncate();
        DB::table('hospitals')->insert(
            array(
                array('name' => 'Test Hospital',
                    'mail' => 'admin@calitatespitale.ro',
                    'city' => 'Alba',
                    'county' => 'Alba',
                    'address' => 'Alba',
                    'phone1' => '1231232113',
                    'active' => 1, 
                    'user_id' => 1,
                    'created_at' => Carbon::now(), 
                    'updated_at' => Carbon::now()),
        ));
        
        DB::table('hospital_descriptions')->truncate();
        DB::table('hospital_descriptions')->insert(
            array(
                array('hospital_id' => 1, 
                    'description' => 'test hospital description',
                    'photo' => '',
                    'created_at' => Carbon::now(), 
                    'updated_at' => Carbon::now()),
        ));
        
        DB::table('hospital_managers')->truncate();
        DB::table('hospital_managers')->insert(
            array(
                array('hospital_id' => 1, 
                    'name' => 'Hospital manager',
                    'description' => 'test hospital description',
                    'photo' => '',
                    'created_at' => Carbon::now(), 
                    'updated_at' => Carbon::now()),
        ));
    }
}
