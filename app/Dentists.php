<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dentists extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'user_id', 
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
    
    public function user(){
        return $this->belongsTo('App\User');
    }
}
