<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SousCategorie extends Model
{
     protected $fillable = [
        'libelle',
    ];
    /*public function categorie()
    {
        return $this->belongsTo('App\Categorie');
    }*/
      

}
