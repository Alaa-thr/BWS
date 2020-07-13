<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paiement_employeur extends Model
{
    public function employeur()
    {
        return $this->belongsTo('App\Employeur');
    }
}
