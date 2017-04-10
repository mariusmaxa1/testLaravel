<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveysSections extends Model
{
    protected $fillable = [
        'survey_id', 'name', 'order', 'active'
    ];
    
    public function questions()
    {
        return $this->hasMany('App\SurveysQuestions', 'section_id', 'id');
    }
}
