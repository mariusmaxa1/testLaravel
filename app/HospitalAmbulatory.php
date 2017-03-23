<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HospitalAmbulatory extends Model
{
    protected $fillable = [
        'hospital_id', 'ambulatory_id'
    ];
}
