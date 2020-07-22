<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{
    protected $primaryKey = 'user_id';
    
    protected $fillable = [
        'nom','prenom','numTelephone','email','user_id','numCarteBanquaire','image','big_admin','deleteda'
    ];

    use SoftDeletes;
    protected $dates= ['deleted_at'];
    
     public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function article(){
        return $this->hasMany('App\Article');
    }

    public function notification()
    {
        return $this->hasMany('App\Notification');
    }
     

    
}
