<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HospitalNews extends Model
{
    protected $fillable = [
        'hospital_id', 'name', 'description', 'annex', 'photo', 'active'
    ];
}
