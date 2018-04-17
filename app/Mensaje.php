<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    protected $table = 'mensajes';
	protected $fillable = ['user_id', 'sender_id','asunto', 'msg', 'fecha', 'leido'];

	public function user(){
	    return $this->belongsTo('App\User');
	}
}
