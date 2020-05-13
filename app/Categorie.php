<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable = [
        'libellé',
    ];
    /*public function souscategorie()
    {
        return $this->belongsTo('App\SousCategorie');
    }*/
    
    
    
}
