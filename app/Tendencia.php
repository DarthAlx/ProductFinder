<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tendencia extends Model
{
    protected $table = 'tendencias';
	protected $fillable = ['nombre'];
}
