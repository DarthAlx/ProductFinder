<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    protected $table = 'favoritos';
	protected $fillable = ['nombre','precio','imagen','enlace','tienda','url','user_id','rowId'];

	public function user(){
        return $this->belongsTo('App\User');
    }
}
