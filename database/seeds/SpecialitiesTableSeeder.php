<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class SpecialitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specialities')->truncate();
        DB::table('specialities')->insert(
            array(
                array('name' => 'Anestezie si terapie intensiva', 'active' => 1,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Boli infectioase', 'active' => 1,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Cardiologie', 'active' => 1,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Dermatovenerologie', 'active' => 1,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Diabet zaharat, nutritie ºi boli metabolice', 'active' => 1,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Endocrinologie', 'active' => 1,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Gastroenterologie', 'active' => 1,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Hematologie', 'active' => 1,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Medicinã interna', 'active' => 1,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Medicina Muncii', 'active' => 1,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Nefrologie', 'active' => 1,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Neonatologie', 'active' => 1,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Neurologie', 'active' => 1,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Oncologie medicala', 'active' => 1,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Pediatrie', 'active' => 1,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Pneumologie', 'active' => 1,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Psihiatrie', 'active' => 1,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Recuperare, medicina fizica ºi balneologie', 'active' => 1,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Reumatologie', 'active' => 1,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Chirurgie cardiovasculara', 'active' => 1,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Chirurgie generala', 'active' => 1,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Chirurgie orala si maxilo-faciala', 'active' => 1,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Chirurgie pediatrica', 'active' => 1,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Chirurgie plastica - microchirurgie reconstructiva', 'active' => 1,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Chirurgie toracica', 'active' => 1,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Chirurgie vasculara', 'active' => 1,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Neurochirurgie', 'active' => 1,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Obstetrica-ginecologie', 'active' => 1,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Oftalmologie', 'active' => 1,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Ortopedie si traumatologie', 'active' => 1,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Otorinolaringologie', 'active' => 1,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Urologie', 'active' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Anatomie patologica', 'active' => 1,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Laborator', 'active' => 1,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Radiologie - imagistica medicala', 'active' => 1,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'RMN-CT- imagistica medicala', 'active' => 1,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'TBC', 'active' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Servicii de ingrijiri paleative sau medico-sociale', 'active' => 1,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
                array('name' => 'Sectie cronici', 'active' => 1,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
        ));
    }
}
