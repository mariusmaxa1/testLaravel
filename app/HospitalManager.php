<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HospitalManager extends Model
{
    protected $fillable = [
        'hospital_id', 'description', 'name', 'photo',
    ];
}
