<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paiement_vendeur extends Model
{
	protected $fillable = [
        'id','admin_id','vendeur_id','response','created_at','updated_at'
    ];
    public function vendeur()
    {
        return $this->belongsTo('App\Vendeur');
    }
}
