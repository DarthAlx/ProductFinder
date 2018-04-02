<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Busqueda;
use App\Categoria;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function admin(Request $request)
    {
        
        $from_n = strtotime ( $request->from )  ;
      $to_n = strtotime ( $request->to )  ;
      $from = date ( 'Y-m-d' , $from_n );
      $to = date ( 'Y-m-d' , $to_n );
        $busquedastotales=Busqueda::whereBetween('created_at', array($from, $to))->sum('contador');
        $categoria=Categoria::whereBetween('created_at', array($from, $to))->max('contador');
        $usuarios=User::whereBetween('created_at', array($from, $to))->where('is_admin',0)->where('status','Activo')->count();
        $mujeres=User::whereBetween('created_at', array($from, $to))->where('is_admin',0)->where('status','Activo')->where('genero','Femenino')->count();
        $hombres=User::whereBetween('created_at', array($from, $to))->where('is_admin',0)->where('status','Activo')->where('genero','Masculino')->count();
        $busquedas=Busqueda::whereBetween('created_at', array($from, $to))->orderBy('contador','desc')->get();
        
    
        return view('admin', ['usuarios'=>$usuarios,'mujeres'=>$mujeres,'hombres'=>$hombres,'from'=>$from,'to'=>$to,'categoria'=>$categoria,'busquedas'=>$busquedas,'busquedastotales'=>$busquedastotales]);
    }


    public function readc(Request $request){
        $cookie_leida = $request->cookie('nombre');
        dd($cookie_leida);
    }
}
