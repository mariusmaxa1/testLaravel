<?php 

namespace App\Helpers;
use App\EntitiesTypes;


class Helper {
  
    public static function getEntityTypeAndId($routeName) {
        
        $modelName =  explode(".", $routeName); 
        $response[] = $modelName[0];
        
        $type = EntitiesTypes::where('name', 'like', $modelName)->first();
        
        if ($type) {
             $response[] =  $type['id'];
             
             return $response;
        }
        
        return false;
       
    }
    
} 