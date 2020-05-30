<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'id','vendeur_id','categorie_libelle','admin_id','client_id','employeur_id','signal_id','paiement_vendeur_id','paiement_employeur_id','created_at','updated_at','sous_categorie_libelle','typeCategoSousCatego',
    ];

 

    public function admin()
    {
        return $this->hasMany('App\Admin');
    }
}
