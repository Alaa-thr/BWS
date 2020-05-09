<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	
     protected $fillable = [
        'admin_id','titre','description', 'image',
    ];
    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }
}
