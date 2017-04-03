<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $fillable = [
        'hospital_id', 'role_id', 'name', 'alias'
    ];
    
}
