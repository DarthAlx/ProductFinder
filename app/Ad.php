<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $table = 'ads';
	protected $fillable = ['imagen','enlace', 'habilitado'];
}
