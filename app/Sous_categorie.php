<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sous_categorie extends Model
{
     protected $fillable = [
        'libelle','categorie_id'
    ];
    
    public function categorie()
    {
        return $this->belongsTo('App\Categorie');
    }

    public function produit()
    {
        return $this->hasMany('App\Produit');
    }
      

}