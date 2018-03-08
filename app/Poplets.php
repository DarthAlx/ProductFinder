<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poplets extends Model
{
    protected $table = 'poplets';
	protected $fillable = ['producto_id', 'imagen'];

	public function producto(){
	    return $this->belongsTo('App\Producto');
	}
}
