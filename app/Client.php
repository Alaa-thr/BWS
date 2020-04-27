<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
	protected $primaryKey = 'user_id';
    protected $fillable = [
        'nom','prenom','numeroTelephone', 'email', 'ville','user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
}
