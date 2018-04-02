<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Busquedauser extends Model
{
    protected $table = 'busquedausers';
	protected $fillable = ['keywords', 'contador','user_id'];

	public function user(){
        return $this->belongsTo('App\User');
    }
}
