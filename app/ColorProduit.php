<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ColorProduit extends Model
{

	protected $fillable = [
    	'id','produit_id','color_id',
	];
}
