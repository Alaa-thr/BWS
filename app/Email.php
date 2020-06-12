<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
     protected $fillable = [
        'admin_id','adresse_email','message','reponse',
    ];
}
