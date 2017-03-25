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
                array('name' => 'Test Account',
                    'email' => 'admin@calitatespitale.ro',
                    'password' => Hash::make('admin123'), 
                    'role_id' => 1,
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
