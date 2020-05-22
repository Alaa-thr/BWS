<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

	protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_id','nom','prenom','ville','email','codePostal','numeroTelephone','image','nbr_cmd','created_at','updated_at','deletedc',
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
