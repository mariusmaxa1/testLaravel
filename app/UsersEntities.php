<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersEntities extends Model
{
    protected $fillable = [
        'entity_id', 
        'user_id', 
    ];
    
    public function entities()
    {
        return $this->belongsToMany('App\Entities');
    }
}
