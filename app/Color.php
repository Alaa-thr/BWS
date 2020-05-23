<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable = [
    		'nom',
    ];

    public function produit()
    {
        return $this->hasMany('App\Produit');
    }
}
