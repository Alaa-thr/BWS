<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typechoisirvendeur extends Model
{
    protected $fillable = [
        'vendeur_id','type_livraison',
    ];

    public function vendeur()
    {
        return $this->hasMany('App\Vendeur');
    }
}
