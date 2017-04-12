<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SurveyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('surveys')->truncate();
        DB::table('surveys')->insert(
            array(
                array('name' => 'Chestionar calitate spitale',
                    'description' => 'Chestionar calitate spitale',
                    'active' => 1,
                    'role_id' => 1,
                    'created_at' => Carbon::now(), 
                    'updated_at' => Carbon::now()),
        ));
        
        DB::table('surveys_sections')->truncate();
        DB::table('surveys_sections')->insert(
            array(
                array('survey_id' => 1,
                    'name' => 'Profil pacinet',
                    'order' => 1,                    
                    'active' => 1,
                    'created_at' => Carbon::now(), 
                    'updated_at' => Carbon::now()),
        ));
        DB::table('surveys_sections')->insert(
            array(
                array('survey_id' => 1,
                    'name' => 'Calitate Confort',
                    'order' => 2,                    
                    'active' => 1,
                    'created_at' => Carbon::now(), 
                    'updated_at' => Carbon::now()),
        ));
        DB::table('surveys_sections')->insert(
            array(
                array('survey_id' => 1,
                    'name' => 'Calitate Servicii',
                    'order' => 3,                    
                    'active' => 1,
                    'created_at' => Carbon::now(), 
                    'updated_at' => Carbon::now()),
        ));
        DB::table('surveys_sections')->insert(
            array(
                array('survey_id' => 1,
                    'name' => 'Calitate Personal',
                    'order' => 4,                    
                    'active' => 1,
                    'created_at' => Carbon::now(), 
                    'updated_at' => Carbon::now()),
        ));
        DB::table('surveys_sections')->insert(
            array(
                array('survey_id' => 1,
                    'name' => 'Final',
                    'order' => 5,                    
                    'active' => 1,
                    'created_at' => Carbon::now(), 
                    'updated_at' => Carbon::now()),
        ));
        
        DB::table('surveys_questions')->insert(
            array(
                array('section_id' => 1,
                    'name' => 'Sex',
                    'order' => 1,                    
                    'active' => 1,
                    'displayMode' => 'radioBox',
                    'created_at' => Carbon::now(), 
                    'updated_at' => Carbon::now()),
        ));
        DB::table('surveys_questions')->insert(
            array(
                array('section_id' => 1,
                    'name' => 'Varsta',
                    'order' => 2,                    
                    'active' => 1,
                    'displayMode' => 'radioBox',
                    'created_at' => Carbon::now(), 
                    'updated_at' => Carbon::now()),
        ));
        DB::table('surveys_questions')->insert(
            array(
                array('section_id' => 1,
                    'name' => 'Mediul de provenienta',
                    'order' => 3,                    
                    'active' => 1,
                    'displayMode' => 'radioBox',
                    'created_at' => Carbon::now(), 
                    'updated_at' => Carbon::now()),
        ));
        DB::table('surveys_questions')->insert(
            array(
                array('section_id' => 1,
                    'name' => 'Profilul pacientului',
                    'order' => 4,                    
                    'active' => 1,
                    'displayMode' => 'radioBox',
                    'created_at' => Carbon::now(), 
                    'updated_at' => Carbon::now()),
        ));
        DB::table('surveys_questions')->insert(
            array(
                array('section_id' => 1,
                    'name' => 'Venituri',
                    'order' => 5,                    
                    'active' => 1,
                    'displayMode' => 'radioBox',
                    'created_at' => Carbon::now(), 
                    'updated_at' => Carbon::now()),
        ));
        DB::table('surveys_questions')->insert(
            array(
                array('section_id' => 1,
                    'name' => 'Tip serviciu',
                    'order' => 6,                    
                    'active' => 1,
                    'displayMode' => 'radioBox',
                    'created_at' => Carbon::now(), 
                    'updated_at' => Carbon::now()),
        ));
        /// TODO
        DB::table('surveys_questions')->insert(
            array(
                array('section_id' => 2,
                    'name' => 'Confortul in general',
                    'order' => 1,                    
                    'active' => 1,
                    'displayMode' => 'radioBox',
                    'created_at' => Carbon::now(), 
                    'updated_at' => Carbon::now()),
        ));
        DB::table('surveys_questions')->insert(
            array(
                array('section_id' => 2,
                    'name' => 'Curatenia spitalului in general',
                    'order' => 2,                    
                    'active' => 1,
                    'displayMode' => 'radioBox',
                    'created_at' => Carbon::now(), 
                    'updated_at' => Carbon::now()),
        ));
        DB::table('surveys_questions')->insert(
            array(
                array('section_id' => 2,
                    'name' => 'Accesibilitatea la servicii si facilitati (rampe, parcari, cabinete medicale, etc.)',
                    'order' => 3,                    
                    'active' => 1,
                    'displayMode' => 'radioBox',
                    'created_at' => Carbon::now(), 
                    'updated_at' => Carbon::now()),
        ));
        DB::table('surveys_questions')->insert(
            array(
                array('section_id' => 2,
                    'name' => 'Comunicarea cu personalul spitalului in general',
                    'order' => 4,                    
                    'active' => 1,
                    'displayMode' => 'radioBox',
                    'created_at' => Carbon::now(), 
                    'updated_at' => Carbon::now()),
        ));
        DB::table('surveys_questions')->insert(
            array(
                array('section_id' => 2,
                    'name' => 'Serviciile si ingrijirile primite',
                    'order' => 5,                    
                    'active' => 1,
                    'displayMode' => 'radioBox',
                    'created_at' => Carbon::now(), 
                    'updated_at' => Carbon::now()),
        ));
        DB::table('surveys_questions')->insert(
            array(
                array('section_id' => 3,
                    'name' => 'Diagnosticul',
                    'order' => 1,                    
                    'active' => 1,
                    'displayMode' => 'radioBox',
                    'created_at' => Carbon::now(), 
                    'updated_at' => Carbon::now()),
        ));
        DB::table('surveys_questions')->insert(
            array(
                array('section_id' => 3,
                    'name' => 'Tratamentul',
                    'order' => 2,                    
                    'active' => 1,
                    'displayMode' => 'radioBox',
                    'created_at' => Carbon::now(), 
                    'updated_at' => Carbon::now()),
        ));
        DB::table('surveys_questions')->insert(
            array(
                array('section_id' => 3,
                    'name' => 'Timpul de asteptare',
                    'order' => 3,                    
                    'active' => 1,
                    'displayMode' => 'radioBox',
                    'created_at' => Carbon::now(), 
                    'updated_at' => Carbon::now()),
        ));
        DB::table('surveys_questions')->insert(
            array(
                array('section_id' => 3,
                    'name' => 'Confidentialitate / Intimitate',
                    'order' => 4,                    
                    'active' => 1,
                    'displayMode' => 'radioBox',
                    'created_at' => Carbon::now(), 
                    'updated_at' => Carbon::now()),
        ));
        DB::table('surveys_questions')->insert(
            array(
                array('section_id' => 3,
                    'name' => 'Ati recomanda cu incredere serviciile acestei unitati sanitare altor persoane(Familie, Prieteni, etc)?',
                    'order' => 5,                    
                    'active' => 1,
                    'displayMode' => 'radioBox',
                    'created_at' => Carbon::now(), 
                    'updated_at' => Carbon::now()),
        ));
        DB::table('surveys_questions')->insert(
            array(
                array('section_id' => 4,
                    'name' => 'Profesionalismul personalului administrativ',
                    'order' => 1,                    
                    'active' => 1,
                    'displayMode' => 'radioBox',
                    'created_at' => Carbon::now(), 
                    'updated_at' => Carbon::now()),
        ));
        DB::table('surveys_questions')->insert(
            array(
                array('section_id' => 4,
                    'name' => 'Profesionalismul medicului',
                    'order' => 2,                    
                    'active' => 1,
                    'displayMode' => 'radioBox',
                    'created_at' => Carbon::now(), 
                    'updated_at' => Carbon::now()),
        ));
        DB::table('surveys_questions')->insert(
            array(
                array('section_id' => 4,
                    'name' => 'Profesionalismul asistentei medicale',
                    'order' => 3,                    
                    'active' => 1,
                    'displayMode' => 'radioBox',
                    'created_at' => Carbon::now(), 
                    'updated_at' => Carbon::now()),
        ));
        DB::table('surveys_questions')->insert(
            array(
                array('section_id' => 4,
                    'name' => 'Managerul unitatii sanitare face o treaba',
                    'order' => 4,                    
                    'active' => 1,
                    'displayMode' => 'radioBox',
                    'created_at' => Carbon::now(), 
                    'updated_at' => Carbon::now()),
        ));
        DB::table('surveys_questions')->insert(
            array(
                array('section_id' => 4,
                    'name' => 'Comportamentul personalului fata de dumneavoastra',
                    'order' => 5,                    
                    'active' => 1,
                    'displayMode' => 'radioBox',
                    'created_at' => Carbon::now(), 
                    'updated_at' => Carbon::now()),
        ));
        DB::table('surveys_questions')->insert(
            array(
                array('section_id' => 5,
                    'name' => 'Ati avut toata medicatia si materiale sanitare necesare pe perioada internarii?',
                    'order' => 1,                    
                    'active' => 1,
                    'displayMode' => 'radioBox',
                    'created_at' => Carbon::now(), 
                    'updated_at' => Carbon::now()),
        ));
        DB::table('surveys_questions')->insert(
            array(
                array('section_id' => 5,
                    'name' => 'Ati platit pentru serviciile oferite in spital?',
                    'order' => 2,                    
                    'active' => 1,
                    'displayMode' => 'radioBox',
                    'created_at' => Carbon::now(), 
                    'updated_at' => Carbon::now()),
        ));
        //TODO
        DB::table('surveys_questions')->insert(
            array(
                array('section_id' => 5,
                    'name' => 'Am completat in calitate de:',
                    'order' => 3,                    
                    'active' => 1,
                    'displayMode' => 'radioBox',
                    'created_at' => Carbon::now(), 
                    'updated_at' => Carbon::now()),
        ));
        DB::table('surveys_questions')->insert(
            array(
                array('section_id' => 5,
                    'name' => 'Gradul de scoalarizare',
                    'order' => 4,                    
                    'active' => 1,
                    'displayMode' => 'radioBox',
                    'created_at' => Carbon::now(), 
                    'updated_at' => Carbon::now()),
        ));
        DB::table('surveys_questions')->insert(
            array(
                array('section_id' => 5,
                    'name' => 'Un mesaj pentru conducerea spitalului (Publicat anonim)',
                    'order' => 5,                    
                    'active' => 1,
                    'displayMode' => 'radioBox',
                    'created_at' => Carbon::now(), 
                    'updated_at' => Carbon::now()),
        ));
        DB::table('surveys_questions')->insert(
            array(
                array('section_id' => 5,
                    'name' => 'Adresa de e-mail',
                    'order' => 6,                    
                    'active' => 1,
                    'displayMode' => 'radioBox',
                    'created_at' => Carbon::now(), 
                    'updated_at' => Carbon::now()),
        ));
        DB::table('surveys_questions')->insert(
            array(
                array('section_id' => 5,
                    'name' => 'Numar telefon (optional))',
                    'order' => 7,                    
                    'active' => 1,
                    'displayMode' => 'radioBox',
                    'created_at' => Carbon::now(), 
                    'updated_at' => Carbon::now()),
        ));
        
    }
}
