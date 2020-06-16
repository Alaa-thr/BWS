<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendeur extends Model
{

    
	protected $primaryKey = 'user_id';
    protected $fillable = [
        'nom','prenom','numTelephone', 'email','user_id','Addresse','Nom_boutique',  
        'Num_Compte_Banquaire','type_livraison','Nbre_abbon','prix_livraison','image','deletedv',
    ];

 

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function typechoisirvendeur()
    {
        return $this->hasMany('App\Typechoisirvendeur');
    }

    public function ville()
    {
        return $this->hasMany('App\Ville');
    }
    public function produit()
    {
        return $this->hasMany('App\Produit');
    }

    public function commande()
    {
        return $this->hasMany('App\Commande');
    }
}
