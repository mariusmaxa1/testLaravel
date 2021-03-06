<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(AmbulatoriesTableSeeder::class);
        $this->call(SpecialitiesTableSeeder::class);
        $this->call(TestsTableSeeder::class);
        $this->call(SurveyTableSeeder::class);
        $this->call(EntitiesTypesSeeder::class);
    }
}
