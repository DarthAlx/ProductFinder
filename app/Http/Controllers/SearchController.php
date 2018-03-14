<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tienda;
use Goutte;

class SearchController extends Controller
{
    public function index(Request $request)
    {
    	$tiendas=Tienda::all();
    	$productos=array();


        foreach ($tiendas as $tienda) {


			$crawler = Goutte::request('GET', $tienda->urlbusqueda.$request->busqueda);
			

		
			$crawler->filter($tienda->selectitem)->each(function ($node) use (&$tienda,&$productos) {




			      if($node->filter($tienda->selectnombre)->text()!=""){
			        $nombre=$node->filter($tienda->selectnombre)->text();
			        $enlace=$node->filter($tienda->selectnombre)->attr('href');
			      }
			      if($node->filter($tienda->selectimagen)->attr($tienda->attrimagen)!=""){
			        $imagen=$node->filter($tienda->selectimagen)->attr($tienda->attrimagen);
			      }
			      if($node->filter($tienda->selectprecio)->text()!=""){
			        $precio=$node->filter($tienda->selectprecio)->html();
			      }


			 
			    $productos[]=array(
			    	'nombre'=>$nombre,
			    	'enlace'=>$tienda->url.$enlace,
			    	'imagen'=>$imagen,
			    	'precio'=>$precio,
			    	'tienda'=>$tienda->nombre,
			    	'enlacetienda'=>$tienda->url

			    );



			    });
        	
        }

		return view('buscar', ['productos'=>$productos]);
        $sorted = array_values(array_sort($productos, function ($value) {
		    return $value['precio'];
		}));

      
    }
}
