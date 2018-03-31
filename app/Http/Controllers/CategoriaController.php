<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CategoriaController extends Controller
{
    public function store(Request $request)
    {
    	$categoria = new Categoria($request->all());
    	$categoria->nombre=ucfirst($request->nombre);
        $categoria->slug = str_slug($request->nombre, '-');

		//guardar
        if ($categoria->save()) {
            Session::flash('mensaje', 'Categoría publicada con exito.');
            Session::flash('class', 'success');
            return redirect()->intended(url('/categorias'))->withInput();
            
        }
        else{
            Session::flash('mensaje', 'Hubó un error, por favor, verifica la información.');
            Session::flash('class', 'danger');
            return redirect()->intended(url('/categorias'))->withInput();
        }
    }



    public function destroy(Request $request)
        {
          $categoria = Categoria::find($request->eliminar);
          $categoria->delete();
          Session::flash('mensaje', 'Categoría eliminada con éxito.');
            Session::flash('class', 'success');
            return redirect()->intended(url('/categorias/'))->withInput();
        }
}
