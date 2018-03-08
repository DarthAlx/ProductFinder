<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relacionados extends Model
{
    protected $table = 'poplets';
	protected $fillable = ['producto_id', 'relacionado_id'];

	public function producto(){
	    return $this->belongsTo('App\Producto');
	}
}
