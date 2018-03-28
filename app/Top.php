<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Top extends Model
{
    protected $table = 'tops';
	protected $fillable = ['url', 'tienda', 'orden'];

}
