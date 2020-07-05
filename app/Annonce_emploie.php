<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annonce_emploie extends Model
{

    protected $fillable =[
    	'libellé','discription','image','nombre_condidat','annonceE_attende','employeur_id','sous_categorie_id'
    ];

   public function employeur()
   {
   	return $this->belongsTo('App\Employeur');
   }

   public function sous_categorie()
   {
   	return $this->belongsTo('App\Sous_categorie');
   }
   public function demande()
   {
   	return $this->hasMany('App\Demande_emploie');
   }
   public function client()
    {
        return $this->belongsTo('App\Client');
    }

}

