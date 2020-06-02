<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TailleProduit extends Model
{
    protected $fillable = [
        'produit_id','nom',
    ];

    public function produit()
    {
        return $this->hasMany('App\Produit');
    }
    
}
