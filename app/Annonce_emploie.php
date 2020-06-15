<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annonce_emploie extends Model
{
    public function employeur()
    {
        return $this->belongsTo('App\Employeur');
    }
}
