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
}
