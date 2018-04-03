<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Tienda;
use Goutte;
use App\Top;
use App\Http\Controllers\SearchController;
class ProductoController extends Controller
{

	public function store(Request $request)
    {
    	$top = new Top($request->all());

		//guardar
        if ($top->save()) {
            Session::flash('mensaje', 'Destacado publicado con exito.');
            Session::flash('class', 'success');
            return redirect()->intended(url('/destacados'));
            
        }
        else{
            Session::flash('mensaje', 'Hubó un error, por favor, verifica la información.');
            Session::flash('class', 'danger');
            return redirect()->intended(url('/agregar-destacado'))->withInput();
        }
    }

	public function traerproducto(Request $request)
    {

    	if ($request->tienda&&$request->enlace) {
    		$tienda=Tienda::find($request->tienda);

    		 $node = Goutte::request('GET', $request->enlace);

    		  if($node->filter($tienda->productnombre)->count() > 0){
		        $nombre=$node->filter($tienda->productnombre)->text();
    		  }
		      else{
		      	$nombre="Información no disponible.";
		      }
		      if($node->filter($tienda->productdesc)->count() > 0){
		        $descripcion=$node->filter($tienda->productdesc)->text();
    		  }
		      else{
		      	$descripcion="Información no disponible.";
		      }

		      if($node->filter($tienda->productimagen)->count() > 0){
			        $imagen=$node->filter($tienda->productimagen)->attr('src');
			        if(trim($imagen)==""){
			      		$imagen="Información no disponible.";
			      	}
			      }
			      
			      
			      else{
			      	$imagen="Información no disponible.";
			      }

		      if($node->filter($tienda->productprecioespecial)->count() > 0){
		        $precio=$node->filter($tienda->productprecio_especial)->html();
		        $precio=SearchController::precio($precio, $tienda->nombre);
		      }else if($node->filter($tienda->productprecio)->count() > 0){
		        $precio=$node->filter($tienda->productprecio)->text();
		        $precio=SearchController::precio($precio, $tienda->nombre);
		      }else{
		      	$precio="Información no disponible.";
		      }

    		echo trim($nombre).",".$descripcion.",".$imagen.",".$precio.",".$request->enlace.",".$tienda->nombre.",".$tienda->url;
    	}
    	else{
    		echo "nada";
    	}
		

    }
}
