<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surveys extends Model
{
    protected $fillable = [
        'name', 'description', 'active', 'role_id'
    ];
    
    public function role() {
        return $this->hasOne('App\Role', 'id', 'role_id');
    }
    
    public function sections()
    {
        return $this->hasMany('App\SurveysSections', 'survey_id', 'id');
    }
}
