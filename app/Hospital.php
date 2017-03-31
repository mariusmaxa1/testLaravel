<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hospital extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'user_id', 
        'name', 
        'county', 
        'city',
        'classification',
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
    
    public function specialities()
    {
        return $this->belongsToMany('App\Specialities', 'hospital_specialities', 'hospital_id' ,'speciality_id');
    }
    
    public function ambulatories()
    {
        return $this->belongsToMany('App\Ambulatory', 'hospital_ambulatories');
    }
    
    public function news(){
        return $this->hasMany('App\HospitalNews');
    }
    
    public function doctors(){
        return $this->hasMany('App\HospitalDoctors');
    }
    
    public function indicators(){
        return $this->hasMany('App\HospitalIndicators');
    }
   
}
