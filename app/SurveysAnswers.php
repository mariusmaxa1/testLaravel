<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveysAnswers extends Model
{
    protected $fillable = [
        'question_id', 'name', 'order'
    ];
}
