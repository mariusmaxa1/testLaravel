<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HospitalDescription extends Model
{
    protected $fillable = [
        'hospital_id', 'description', 'photo'
    ];
    
}
