<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'numTelephone', 'email', 'password','type_compte','number_confirm'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

   
    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function vendeur()
    {
        return $this->belongsTo('App\Vendeur');
    }
    public function employeur()
    {
        return $this->belongsTo('App\Employeur');
    }

    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }



}
