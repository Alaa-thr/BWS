<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $fillable = [
        'id','vendeur_id','sous_categorie_id','Libellé','prix','description','Qte_P','Notation','poid','produit_attende','created_at','updated_at',
    ];

 

    public function vendeur()
    {
        return $this->belongsTo('App\Vendeur');
    }

    public function imageproduit()
    {
        return $this->hasMany('App\Imageproduit');
    }

    public function color()
    {
        return $this->hasMany('App\Color');
    }

    public function sous_categorie()
    {
        return $this->belongsTo('App\Sous_categorie');
    }

    public function tailleProduit()
    {
        return $this->hasMany('App\TailleProduit');
    }
    public function client()
    {
        return $this->hasMany('App\Client');
    }   
}
