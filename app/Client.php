<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_id','nom','prenom','ville','email','codePostal','numeroTelephone',
        'image','nbr_cmd','created_at','updated_at','deletedc','deleted_at'
    ];

    public function client()
    {
        return $this->belongsTo('App\Client');
    }
    
    public function commande()
    {
        return $this->hasMany('App\Commande');
    }

    public function demande_emploie()
    {
        return $this->hasMany('App\Demande_emploie');
    }

    public function favori()
    {
        return $this->hasMany('App\Favori');
    }

    public function produit()
    {
        return $this->hasMany('App\Produit');
    }
    public function notification()
    {
        return $this->hasMany('App\Notification');
    }
}
