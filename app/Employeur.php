<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employeur extends Model
{
    protected $fillable = [
        'nom','prenom','num_tel', 'email','user_id','address','nom_societe', 
        'num_compte_banquiare',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
