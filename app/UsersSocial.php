<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersSocial extends Model
{
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    //protected $table = 'social';
    
    
    protected $fillable = [
        'user_id', 'provider', 'social_id'
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
