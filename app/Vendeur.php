<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendeur extends Model
{
    protected $fillable = [
        'nom','prenom','numTelephone', 'email','user_id','Addresse','Nom_boutique',  
        'Num_Compte_Banquaire','type_livraison','Nbre_abbon','prix_livraison',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
