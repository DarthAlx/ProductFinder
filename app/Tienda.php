<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tienda extends Model
{
    protected $table = 'tiendas';
	protected $fillable = ['nombre', 'url', 'urlbusqueda', 'selectenlace', 'selectitem', 'selectnombre','selectimagen', 'attrimagen', 'selectprecio', 'selectvaloracion', 'clicks'];


}