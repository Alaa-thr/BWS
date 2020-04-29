<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    
    protected $fillable = [
        'nom',
    ];

    public function vendeur()
    {
        return $this->hasMany('App\Vendeur');
    }
}
