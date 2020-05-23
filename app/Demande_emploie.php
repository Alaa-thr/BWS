<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demande_emploie extends Model
{
    protected $fillable = [
        'client_id','employeur_id','annonceE_id','reponse_employeur','cv_client','demmande_envoyer',
        'demmande_traiter','created_at','updated_at',
    ];

    public function client()
    {
        return $this->belongsTo('App\Client');
    }
}
