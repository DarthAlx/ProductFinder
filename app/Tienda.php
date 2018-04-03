<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tienda extends Model
{
    protected $table = 'tiendas';
	protected $fillable = ['nombre', 'url', 'urlbusqueda', 'selectenlace', 'selectitem', 'selectnombre','selectimagen', 'attrimagen', 'selectprecio_especial', 'selectprecio', 'selectvaloracion', 'selectdesc', 'productnombre','productprecio','productprecioespecial', 'productimagen','productgaleria','productpoplet', 'productdesc', 'clicks'];
	public function destacados(){
        return $this->hasMany('App\Top');
    }

}
