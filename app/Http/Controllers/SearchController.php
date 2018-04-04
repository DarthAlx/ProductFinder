<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tienda;
use Goutte;
use App\Busqueda;
use App\Busquedauser;
use App\Categoria;
use Input;
use Cart;
use Auth;

class SearchController extends Controller
{
    public function index(Request $request)
    {
    	$tiendas=Tienda::all();
    	$productos=array();
  


        foreach ($tiendas as $tienda) {


			$crawler = Goutte::request('GET', $tienda->urlbusqueda.$request->busqueda);
			

			$contador=1;
			$crawler->filter($tienda->selectitem)->each(function ($node) use (&$tienda,&$productos,&$contador) {

			$agregar=true;


			      if($node->filter($tienda->selectnombre)->count() > 0){
			        $nombre=$node->filter($tienda->selectnombre)->text();
			      }
			      else{
			      	$agregar=false;
			      }
			      if ($enlace=$node->filter($tienda->selectenlace)->count() > 0) {
			      	$enlace=$node->filter($tienda->selectenlace)->attr('href');
			      }
			      else{
			      	$agregar=false;
			      }
			      if($node->filter($tienda->selectimagen)->count() > 0){
			        $imagen=$node->filter($tienda->selectimagen)->attr($tienda->attrimagen);
			      }
			      else{
			      	$agregar=false;
			      }
			      if($node->filter($tienda->selectprecio_especial)->count() > 0){
			        $precio=$node->filter($tienda->selectprecio_especial)->html();
			      }else if($node->filter($tienda->selectprecio)->count() > 0){
			        $precio=$node->filter($tienda->selectprecio)->text();
			      }else{
			      	$agregar=false;
			      }

			      if(str_contains($enlace, $tienda->url)){
		              $enlacecompleto=$enlace;
		            }else{
		              $enlacecompleto=$tienda->url.$enlace;
		            }


			 	if ($agregar) {
			 		$precio=$this->precio($precio, $tienda->nombre);
			 		$productos[]=array(
			    	'nombre'=>trim($nombre),
			    	'enlace'=>$enlacecompleto,
			    	'imagen'=>$imagen,
			    	'precio'=>$precio,
			    	'tienda'=>$tienda->nombre,
			    	'enlacetienda'=>$tienda->url,
			    	'orden'=>$contador
				    );
				    $contador++;
			 	}
			    




			    });
        	
        }
		$busqueda=Busqueda::where('keywords',$request->busqueda)->first();

		if ($busqueda) {
			$busqueda->contador=$busqueda->contador+1;
			$busqueda->save();
		}else{
			$busqueda=new Busqueda();
		    $busqueda->keywords=$request->busqueda;
		    $busqueda->contador=1;
		    $busqueda->save();
		}




		if (!Auth::guest()) {
			$busqueda=Busquedauser::where('keywords',$request->busqueda)->where('user_id',Auth::user()->id)->first();

			if ($busqueda) {
				$busqueda->contador=$busqueda->contador+1;
				$busqueda->save();
			}else{
				$busqueda=new Busquedauser();
			    $busqueda->keywords=$request->busqueda;
			    $busqueda->contador=1;
			    $busqueda->user_id=Auth::user()->id;
			    $busqueda->save();
			}
		}


		if ($request->sort) {
			if ($request->sort=="Menor precio") {
				$productos = array_values(array_sort($productos, function ($value) {
				    return $value['precio'];
				}));
			}
			else if ($request->sort=="Mayor precio") {
				$productos = array_values(array_sort($productos, function ($value) {
				    return $value['precio'];
				}));
				$productos=array_reverse($productos);
			}
			else if ($request->sort=="A - Z") {
				$productos = array_values(array_sort($productos, function ($value) {
				    return $value['nombre'];
				}));
			}
			else if ($request->sort=="Popularidad") {
				$productos = array_values(array_sort($productos, function ($value) {
				    return $value['orden'];
				}));
			}
			else{
				$productos = array_values(array_sort($productos, function ($value) {
				    return $value['orden'];
				}));

			}
		}
		else{
			$request->sort="Popularidad";
				$productos = array_values(array_sort($productos, function ($value) {
				    return $value['orden'];
				}));

			}
//dd($productos);
			$categorias=Categoria::orderBy('nombre','asc')->get();
		return view('buscar', ['productos'=>$productos,'busqueda'=>$request->busqueda,'sorting'=>$request->sort,'categorias'=>$categorias]);
        

      
    }


    public function favoritos(Request $request)
    {
    	$tiendas=Tienda::all();
    	$productos=array();
  		$contador=1;
  		Cart::restore(Auth::user()->id);
  		$items=Cart::content();
  		if (Cart::content()->count()>0){



  			foreach ($items as $producto) {
			 		$productos[]=array(
			    	'nombre'=>$producto->name,
			    	'enlace'=>$producto->options->enlace,
			    	'imagen'=>$producto->options->imagen,
			    	'precio'=>$producto->price,
			    	'tienda'=>$producto->options->tienda,
			    	'enlacetienda'=>$producto->options->url,
			    	'orden'=>$contador
				    );
				    $contador++;
			    }
        	
        
			$busqueda=Busqueda::where('keywords',strtoupper($request->busqueda))->first();

			if ($request->sort) {
			if ($request->sort=="Menor precio") {
				$productos = array_values(array_sort($productos, function ($value) {
				    return $value['precio'];
				}));
			}
			else if ($request->sort=="Mayor precio") {
				$productos = array_values(array_sort($productos, function ($value) {
				    return $value['precio'];
				}));
				$productos=array_reverse($productos);
			}
			else if ($request->sort=="A - Z") {
				$productos = array_values(array_sort($productos, function ($value) {
				    return $value['nombre'];
				}));
			}
			else if ($request->sort=="Popularidad") {
				$productos = array_values(array_sort($productos, function ($value) {
				    return $value['orden'];
				}));
			}
			else{
				$productos = array_values(array_sort($productos, function ($value) {
				    return $value['orden'];
				}));

			}
		}
		else{
			$request->sort="Popularidad";
				$productos = array_values(array_sort($productos, function ($value) {
				    return $value['orden'];
				}));

			}
			//dd($productos);
			$categorias=Categoria::orderBy('nombre','asc')->get();
			return view('favoritos', ['productos'=>$productos,'busqueda'=>'','sorting'=>$request->sort,'categorias'=>$categorias]);

	  	}
		else{
			return view('favoritosvacio', ['busqueda'=>'']);
		}
		

        
        

      
    }




    public function categoria(Request $request, $slug)
    {
    	$tiendas=Tienda::all();
    	$productos=array();
    	if ($slug) {
    		$request->busqueda=$slug;
    		$contadorcate=Categoria::where('slug',$slug)->first();
    		if ($contadorcate) {
    			$contadorcate->contador++;
    			$contadorcate->save();
    		}
    	}


        foreach ($tiendas as $tienda) {


			$crawler = Goutte::request('GET', $tienda->urlbusqueda.$request->busqueda);
			

			$contador=1;
			$crawler->filter($tienda->selectitem)->each(function ($node) use (&$tienda,&$productos,&$contador) {

			$agregar=true;


			      if($node->filter($tienda->selectnombre)->count() > 0){
			        $nombre=$node->filter($tienda->selectnombre)->text();
			      }
			      else{
			      	$agregar=false;
			      }
			      if ($enlace=$node->filter($tienda->selectenlace)->count() > 0) {
			      	$enlace=$node->filter($tienda->selectenlace)->attr('href');
			      }
			      else{
			      	$agregar=false;
			      }
			      if($node->filter($tienda->selectimagen)->count() > 0){
			        $imagen=$node->filter($tienda->selectimagen)->attr($tienda->attrimagen);
			      }
			      else{
			      	$agregar=false;
			      }
			      if($node->filter($tienda->selectprecio_especial)->count() > 0){
			        $precio=$node->filter($tienda->selectprecio_especial)->html();
			      }else if($node->filter($tienda->selectprecio)->count() > 0){
			        $precio=$node->filter($tienda->selectprecio)->text();
			      }else{
			      	$agregar=false;
			      }

			      
if(str_contains($enlace, $tienda->url)){
		              $enlacecompleto=$enlace;
		            }else{
		              $enlacecompleto=$tienda->url.$enlace;
		            }

			 	if ($agregar) {
			 		$precio=$this->precio($precio, $tienda->nombre);
			 		$productos[]=array(
			    	'nombre'=>trim($nombre),
			    	'enlace'=>$enlacecompleto,
			    	'imagen'=>$imagen,
			    	'precio'=>$precio,
			    	'tienda'=>$tienda->nombre,
			    	'enlacetienda'=>$tienda->url,
			    	'orden'=>$contador
				    );
				    $contador++;
			 	}
			    




			    });
        	
        }
		$busqueda=Busqueda::where('keywords',strtoupper($request->busqueda))->first();

		if ($busqueda) {
			$busqueda->contador=$busqueda->contador+1;
			$busqueda->save();
		}else{
			$busqueda=new Busqueda();
		    $busqueda->keywords=$request->busqueda;
		    $busqueda->contador=1;
		    $busqueda->save();
		}


		if ($request->sort) {
			if ($request->sort=="Menor precio") {
				$productos = array_values(array_sort($productos, function ($value) {
				    return $value['precio'];
				}));
			}
			else if ($request->sort=="Mayor precio") {
				$productos = array_values(array_sort($productos, function ($value) {
				    return $value['precio'];
				}));
				$productos=array_reverse($productos);
			}
			else if ($request->sort=="A - Z") {
				$productos = array_values(array_sort($productos, function ($value) {
				    return $value['nombre'];
				}));
			}
			else if ($request->sort=="Popularidad") {
				$productos = array_values(array_sort($productos, function ($value) {
				    return $value['orden'];
				}));
			}
			else{
				$productos = array_values(array_sort($productos, function ($value) {
				    return $value['orden'];
				}));

			}
		}
		else{
			$request->sort="Popularidad";
				$productos = array_values(array_sort($productos, function ($value) {
				    return $value['orden'];
				}));

			}
//dd($productos);
			$categorias=Categoria::orderBy('nombre','asc')->get();
		return view('buscar', ['productos'=>$productos,'busqueda'=>$request->busqueda,'sorting'=>$request->sort,'categorias'=>$categorias]);
        

      
    }



	public function producto(Request $request){
	

		$tienda=Tienda::where('nombre',$request->tienda)->first();
		$crawler = Goutte::request('GET', $request->enlace);
		if ($crawler->filter($tienda->selectdesc)->count() >0) {
			$descripcion= $crawler->filter($tienda->selectdesc)->text();
		}
		else{
			$descripcion="No hay datos disponibles.";
		}
    	

    	$producto=array(
			    	'nombre'=>$request->nombre,
			    	'enlace'=>$request->enlace,
			    	'imagen'=>$request->imagen,
			    	'precio'=>$request->precio,
			    	'tienda'=>$request->tienda,
			    	'enlacetienda'=>$tienda->url,
			    	'descripcion'=>$descripcion
				    );
    	$productos=array();
    	$tiendas=Tienda::all();
		foreach ($tiendas as $tiendax) {

    	$key=explode(" ", $request->nombre);

    	if (array_key_exists(2, $key)) {
    		$keywords=$key[0]. " ". $key[1]. " ". $key[2];
    	}

    	else if (array_key_exists(1, $key)) {
    		$keywords=$key[0]. " ". $key[1];
    	}
    	else{
    		$keywords=$key[0];
    	}


    	

    	$crawler = Goutte::request('GET', $tiendax->urlbusqueda.$keywords);
			

			$contador=1;
			$crawler->filter($tiendax->selectitem)->each(function ($node) use (&$tiendax,&$productos,&$contador) {

			$agregar=true;


			      if($node->filter($tiendax->selectnombre)->count() > 0){
			        $nombre=$node->filter($tiendax->selectnombre)->text();
			      }
			      else{
			      	$agregar=false;
			      }
			      if ($enlace=$node->filter($tiendax->selectenlace)->count() > 0) {
			      	$enlace=$node->filter($tiendax->selectenlace)->attr('href');
			      }
			      else{
			      	$agregar=false;
			      }
			      if($node->filter($tiendax->selectimagen)->count() > 0){
			        $imagen=$node->filter($tiendax->selectimagen)->attr($tiendax->attrimagen);
			      }
			      else{
			      	$agregar=false;
			      }
			      if($node->filter($tiendax->selectprecio_especial)->count() > 0){
			        $precio=$node->filter($tiendax->selectprecio_especial)->html();
			      }else if($node->filter($tiendax->selectprecio)->count() > 0){
			        $precio=$node->filter($tiendax->selectprecio)->text();
			      }else{
			      	$agregar=false;
			      }

			      if(str_contains($enlace, $tiendax->url)){
		              $enlacecompleto=$enlace;
		            }else{
		              $enlacecompleto=$tiendax->url.$enlace;
		            }


			 	if ($agregar) {
			 		$precio=$this->precio($precio, $tiendax->nombre);
			 		$productos[]=array(
			    	'nombre'=>trim($nombre),
			    	'enlace'=>$enlacecompleto,
			    	'imagen'=>$imagen,
			    	'precio'=>$precio,
			    	'tienda'=>$tiendax->nombre,
			    	'enlacetienda'=>$tiendax->url,
			    	'orden'=>$contador
				    );
				    $contador++;
			 	}
			    




			    });
		}
    	$productos = array_values(array_sort($productos, function ($value) {
				    return $value['orden'];
				}));

    	$categorias=Categoria::orderBy('nombre','asc')->get();
		return view('producto', ['producto'=>$producto,'categorias'=>$categorias,'relacionados'=>$productos]);

	}




    public function addtofavorite(Request $request){
    	if (Auth::guest()) {
    		echo "guest";

    	}
    	else{
    		$id = $request->id;
    		Cart::restore(Auth::user()->id);
	    	$item=Cart::add($id,$request->nombre,1,$request->precio, ['imagen'=>$request->imagen, 'enlace'=>$request->enlace, 'tienda' => $request->tienda,'url' => $request->url]);
	    	Cart::store(Auth::user()->id);
	    	echo $id.",".$item->rowId;

    	}
    	
    }

    public function removefromfavorite(Request $request){
    	$id = $request->id;
    	Cart::restore(Auth::user()->id);
    	Cart::remove($request->rowId);
    	Cart::store(Auth::user()->id);
    	echo $id;
    }


    public static function precio($precio, $tienda){

    	if ($tienda=="Liverpool") {
    		$string=$precio;
			$string=explode("<sup>", $string);
			$string=str_replace('</sup>', '', $string);
			$precio=str_replace('$', '', implode('.',$string));
			$precio=str_replace(',', '', $precio);
			$precio=intval(preg_replace('/[^0-9]+/', '', $precio), 10);
			
    	}

    	if ($tienda=="Palacio de Hierro") {
			$precio=str_replace('$', '',$precio);
			$precio=str_replace(' ', '',$precio);
			$precio=ltrim($precio, "\n");
			$precio=str_replace(',', '', $precio);
			$precio=intval(preg_replace('/[^0-9]+/', '', $precio), 10);

    	}
    	if ($tienda=="Best Buy") {
    		$precio=$precio.".00";
			$precio=str_replace('$', '',$precio);
			$precio=str_replace(' ', '',$precio);
			$precio=ltrim($precio, "\n");
			$precio=str_replace(',', '', $precio);
			$precio=intval(preg_replace('/[^0-9]+/', '', $precio), 10);

    	}
    	else{
    		$precio=str_replace('$', '',$precio);
			$precio=str_replace(' ', '',$precio);
			$precio=ltrim($precio, "\n");
			$precio=str_replace(',', '', $precio);
			$precio=intval(preg_replace('/[^0-9]+/', '', $precio), 10);
    	}

    	return $precio;

    }
}
