<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Busqueda extends Model
{
    protected $table = 'busquedas';
	protected $fillable = ['keywords', 'contador'];
}
