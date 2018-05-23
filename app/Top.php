<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Top extends Model
{
    protected $table = 'tops';
	protected $fillable = ['nombre','descripcion', 'imagen', 'precio', 'enlace', 'tienda_id', 'orden','tipo'];

	public function tienda(){
        return $this->belongsTo('App\Tienda');
    }

}
