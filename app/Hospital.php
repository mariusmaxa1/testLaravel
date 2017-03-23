<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    //use SoftDeletes;
    
    protected $fillable = [
        'user_id', 
        'name', 
        'country', 
        'city',
        'address',
        'phone1',
        'phone2',
        'phone3',
        'fax',
        'website',
        'mail',
        'photo',
        'active',
    ];
    
    public function user(){
        return $this->belongsTo('App\User');
    }
   
}
