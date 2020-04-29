<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarif_livraison extends Model
{
    protected $fillable = [
        'ville_id','vendeur_id','prix',
    ];
}
