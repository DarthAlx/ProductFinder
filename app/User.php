<?php

namespace App;
use App\Notifications\RecuperaciónDeContraseña;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use ChristianKuri\LaravelFavorite\Traits\Favoriteability;


class User extends Authenticatable
{
    use Notifiable;
    use Favoriteability;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'dob', 'tel', 'genero', 'avatar', 'is_admin', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function socialProvider(){
        return $this->hasMany('App\SocialProvider');
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new RecuperaciónDeContraseña($token));
    }
}
