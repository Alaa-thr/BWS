<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
	protected $primaryKey = 'user_id';
	
    protected $fillable = [
        'nom','prenom','numTelephone', 'email','user_id','numCarteBanquaire','image',
    ];

     public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function article(){
    	return $this->hasMany('App\Article');
    }
     

    
}
