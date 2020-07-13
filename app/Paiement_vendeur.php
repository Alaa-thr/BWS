<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paiement_vendeur extends Model
{
    public function vendeur()
    {
        return $this->belongsTo('App\Vendeur');
    }
}
