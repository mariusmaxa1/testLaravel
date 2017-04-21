<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function role(){
        return $this->hasOne('App\Role', 'id', 'role_id');
    }

    public function isAdmin(){
        if($this->role->name  == "Admin"){
            return true;
        }
        return false;
    }
    
    public function hospital()
    {
        return $this->hasOne('App\Hospital');
    }
    
    public function social()
    {
        return $this->hasMany('App\UsersSocial');
    }
    
    public function entities()
    {
        return $this->belongsToMany('App\Entities', 'users_entities', 'user_id', 'entity_id');
    }
}
