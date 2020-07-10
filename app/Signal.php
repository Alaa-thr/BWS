<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Signal extends Model
{
    protected $fillable = [
        'id','client_id','employeur_id','vendeur_id','produit_id','nomProduit',
        'annonce_emploi_id','created_at','updated_at',
    ];
    use SoftDeletes;
    protected $dates= ['deleted_at'];


    public function client()
    {
        return $this->belongsTo('App\Client');
    }
}