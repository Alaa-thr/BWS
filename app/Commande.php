<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
	protected $primaryKey = 'client_id';
    protected $fillable = [
        'client_id','vendeur_id','produit_id','prix_total','address','Réponse_vendeur',
        'qte','type_livraison','email','numero_tlf','code_postale','ville','commande_envoyee',
        'commande_traiter','created_at','updated_at','couleur_id','taille'
    ];

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function vendeur()
    {
        return $this->belongsTo('App\Vendeur');
    }
}
