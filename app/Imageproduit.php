<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imageproduit extends Model
{
    protected $fillable = [
        'produit_id','image','created_at','updated_at','profile',
    ];

    public function produit()
    {
        return $this->belongsTo('App\Produit');
    }
}
