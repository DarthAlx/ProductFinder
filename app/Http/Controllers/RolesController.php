<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class RolesController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $usuario=User::find(Auth::user()->id);
        if ($usuario->is_admin) {
          	return redirect()->intended(url('/admin'));
        }
        else{
         	return redirect()->intended(url('/perfil'));
        }
    }
}
