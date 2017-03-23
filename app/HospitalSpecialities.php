<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HospitalSpecialities extends Model
{
    protected $fillable = [
        'hospital_id', 'speciality_id'
    ];
}
