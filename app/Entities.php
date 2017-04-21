<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entities extends Model
{
    use SoftDeletes;
    
    const HOSPITAL_TYPE_ID = 1;
    const PHARMACY_TYPE_ID = 2;

    protected $fillable = [
        'entity_type_id', 
        'name', 
        'county', 
        'city',
        'address',
        'phone1',
        'phone2',
        'phone3',
        'fax',
        'website',
        'mail',
        'active',
    ];
    
    public function type(){
        return $this->hasOne('App\EntitiesTypes', 'id', 'entity_type_id');
    }
    
    public function users()
    {
        return $this->belongsToMany('App\Users', 'users_entities', 'entity_id', 'user_id');
    }
    
    public static function getEntities($entityTypeId){
    	$response = self::where('entity_type_id','=',$entityTypeId);
        return $response;
    }
}
