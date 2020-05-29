<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable = [
        'libelle',
    ];

    public function sous_categorie()
    {
        return $this->hasMany('App\Sous_categorie');
    }


    
    
    
}
