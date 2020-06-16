<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employeur extends Model
{
	protected $primaryKey = 'user_id';
    protected $fillable = [
        'nom','prenom','num_tel', 'email','user_id','address','nom_societe', 
        'num_compte_banquiare','image',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

     public function demande_emploie()
    {
        return $this->hasMany('App\Demande_emploie');
    }
    public function annonce_emploie()
    {
    	return $this->hasMany('App\Annonce_emploie');
    }
}
