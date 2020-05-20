<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
	protected $primaryKey = 'user_id';
    protected $fillable = [
        'nom','prenom','numeroTelephone', 'email', 'ville','user_id','image','codePostal',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function commande()
    {
        return $this->hasMany('App\Commande');
    }
}
