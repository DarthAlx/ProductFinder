<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tendencia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TendenciaController extends Controller
{
        public function store(Request $request)
    {
    	$tendencia = new Tendencia($request->all());
    	$tendencia->nombre=ucfirst($request->nombre);

		//guardar
        if ($tendencia->save()) {
            Session::flash('mensaje', 'Tendencia publicada con exito.');
            Session::flash('class', 'success');
            return redirect()->intended(url('/tendencias'))->withInput();
            
        }
        else{
            Session::flash('mensaje', 'Hubó un error, por favor, verifica la información.');
            Session::flash('class', 'danger');
            return redirect()->intended(url('/tendencias'))->withInput();
        }
    }



    public function destroy(Request $request)
        {
          $tendencia = Tendencia::find($request->eliminar);
          $tendencia->delete();
          Session::flash('mensaje', 'Tendencia eliminada con éxito.');
            Session::flash('class', 'success');
            return redirect()->intended(url('/tendencias/'))->withInput();
        }
}
