<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveysQuestions extends Model
{
    protected $fillable = [
        'section_id', 'name', 'order', 'active', 'displayMode'
    ];
}
