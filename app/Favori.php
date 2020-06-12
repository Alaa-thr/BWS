<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favori extends Model
{
    protected $fillable = [
        'produit_id','client_id','annonce_emploi_id','created_at','updated_at',
    ];

    public function client()
    {
        return $this->belongsTo('App\Client');
    }
}
