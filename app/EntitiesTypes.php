<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntitiesTypes extends Model
{
    
    
    protected $fillable = [
        'name', 
    ];
    
    public function entities()
    {
        return $this->hasMany('App\Entities', 'entity_type_id', 'id');
    }
}
