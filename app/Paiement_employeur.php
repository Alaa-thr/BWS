<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paiement_employeur extends Model
{
	protected $fillable = [
        'id','admin_id','employeur_id','response','paiment_par','created_at','updated_at'
    ];
    public function employeur()
    {
        return $this->belongsTo('App\Employeur');
    }
}
