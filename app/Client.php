<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

	protected $primaryKey = 'user_id';

    protected $fillable = [

        'nom','prenom','numeroTelephone', 'email', 'ville','user_id','image','codePostal',

    ];

    public function client()
    {
        return $this->belongsTo('App\Client');
    }
    
    public function commande()
    {
        return $this->hasMany('App\Commande');
    }

}
