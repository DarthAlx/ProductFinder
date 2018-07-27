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
use App\Favorito;

class SearchController extends Controller
{
    public function index(Request $request)
    {
    	set_time_limit(0);
		$tiendas=Tienda::all();
		

    	$productos=array();
   
        foreach ($tiendas as $tienda) {
        	if ($tienda->nombre=="Sanborns"||$tienda->nombre=="Claroshop") {
        		$busquedakey=base64_encode($request->busqueda)."/1/";
        	}
        	else{
        		$busquedakey=$request->busqueda;
        	}

        	if($this->is_working_url($tienda->urlbusqueda.$busquedakey)){
			$crawler = Goutte::request('GET', $tienda->urlbusqueda.$busquedakey);
			
			$contador=1;
			$crawler->filter($tienda->selectitem)->each(function ($node) use (&$tienda,&$productos,&$contador,&$request) {
if($contador<=100){
			$agregar=true;
			      if($node->filter($tienda->selectnombre)->count() > 0){
			        if($node->filter($tienda->selectnombre)->text()!=""){
		                $nombre=$node->filter($tienda->selectnombre)->text();
		                $nombre=str_replace('\'', '',$nombre);
		                $nombre=str_replace(',', '',$nombre);
		              }
		              else{
				      	$agregar=false;
				      }
			      }
			      else{
			      	$agregar=false;
			      }
			      if ($enlace=$node->filter($tienda->selectenlace)->count() > 0) {
			      	$enlace=$node->filter($tienda->selectenlace)->attr('href');
			      	if(str_contains($enlace, "//")){
                $enlace=$enlace;
              }else{
                $enlace=$tienda->url.$enlace;
              }
			      }
			      else{
			      	$agregar=false;
			      }
			      if($node->filter($tienda->selectimagen)->count() > 0){
			        $imagen=$node->filter($tienda->selectimagen)->attr($tienda->attrimagen);
			        $imagen=$this->imagen($imagen, $tienda->nombre);
			        if(str_contains($imagen, "//")||str_contains($imagen, "data:")){
		              $imagencompleta=$imagen;
		            }else{
		              $imagencompleta=$tienda->url.$imagen;
		            }
			      }
			      else{
			      	$agregar=false;
			      }
			      if($node->filter(".prRange")->count() > 0){
		              $agregar=false;
		            }
			      if($node->filter($tienda->selectprecio_especial)->count() > 0){
			        $precio=$node->filter($tienda->selectprecio_especial)->html();
			      }else if($node->filter($tienda->selectprecio)->count() > 0){
			        $precio=$node->filter($tienda->selectprecio)->text();
			      }else{
			      	$precio=0;
			      	$agregar=false;
			      }
			      if(str_contains($enlace, $tienda->url)){
		              $enlacecompleto=$enlace;
		            }else{
		              $enlacecompleto=$tienda->url.$enlace;
		            }
		            
		            $precio=$this->precio($precio, $tienda->nombre);
			 		if($precio==0){
			 			$agregar=false;
			 		}

			 		if ($request->minimo||$request->maximo) {
				        if ($request->minimo&&$request->maximo) {
				            if (!($precio>=($request->minimo*100)&&$precio<=($request->maximo*100))) {
				            	$agregar=false;
				            }
				        }
				        if ($request->minimo&&!$request->maximo) {
				            if (!($precio>=($request->minimo*100))) {
				            	$agregar=false;
				            }
				        }
				        if (!$request->minimo&&$request->maximo) {
				            if (!($precio<=($request->maximo*100))) {
				            	$agregar=false;
				            }
				        }
				        
				        
				    }
				   




			 	if ($agregar) {

			 		$productos[]=array(
			    	'nombre'=>trim('a'.$nombre),
			    	'enlace'=>$enlacecompleto,
			    	'imagen'=>$imagencompleta,
			    	'precio'=>$precio,
			    	'tienda'=>$tienda->nombre,
			    	'enlacetienda'=>$tienda->url,
			    	'orden'=>$contador
				    );
				    $contador++;
			 	}
			    
}//contador
else{
  return false;
}
			    });
		}//urlverf
        	
        }//tienda
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
			$request->sort="Menor precio";
				$productos = array_values(array_sort($productos, function ($value) {
				    return $value['precio'];
				}));
			}
//dd($productos);
			$categorias=Categoria::orderBy('nombre','asc')->get();
		return view('buscar', ['productos'=>$productos,'busqueda'=>$request->busqueda,'sorting'=>$request->sort,'categorias'=>$categorias,'minimo'=>$request->minimo,'maximo'=>$request->maximo]);
        
      
    }


    public function favoritos(Request $request)
    {
    	set_time_limit(0);
    	$tiendas=Tienda::all();
    	$productos=array();
  		$contador=1;
  		Cart::restore(Auth::user()->id);
  		Cart::store(Auth::user()->id);
  		$items=Cart::content();
  		



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




    public function categoria(Request $request, $slug)
    {
    	set_time_limit(0);
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
        	if ($tienda->nombre=="Sanborns") {
        		$busquedakey=base64_encode($request->busqueda)."/1/";
        	}
        	else{
        		$busquedakey=$request->busqueda;
        	}
			$crawler = Goutte::request('GET', $tienda->urlbusqueda.$busquedakey);
			

			$contador=1;
			$crawler->filter($tienda->selectitem)->each(function ($node) use (&$tienda,&$productos,&$contador) {
if($contador<10){
			$agregar=true;


			      if($node->filter($tienda->selectnombre)->count() > 0){
			        if($node->filter($tienda->selectnombre)->text()!=""){
		                $nombre=$node->filter($tienda->selectnombre)->text();
		                $nombre=str_replace('\'', '',$nombre);
                    	$nombre=str_replace(',', '',$nombre);
		              }
		              else{
				      	$agregar=false;
				      }
			      }
			      else{
			      	$agregar=false;
			      }
			      if ($enlace=$node->filter($tienda->selectenlace)->count() > 0) {
			      	$enlace=$node->filter($tienda->selectenlace)->attr('href');
			      	if(str_contains($enlace, "//")){
                $enlace=$enlace;
              }else{
                $enlace=$tienda->url.$enlace;
              }
			      }
			      else{
			      	$agregar=false;
			      }
			      if($node->filter($tienda->selectimagen)->count() > 0){
			        $imagen=$node->filter($tienda->selectimagen)->attr($tienda->attrimagen);
			        $imagen=$this->imagen($imagen, $tienda->nombre);
			        if(str_contains($imagen, "//")||str_contains($imagen, "data:")){
		              $imagencompleta=$imagen;
		            }else{
		              $imagencompleta=$tienda->url.$imagen;
		            }
			      }
			      else{
			      	$agregar=false;
			      }
			      if($node->filter(".prRange")->count() > 0){
              $agregar=false;
            }
			      if($node->filter($tienda->selectprecio_especial)->count() > 0){
			        $precio=$node->filter($tienda->selectprecio_especial)->html();
			      }else if($node->filter($tienda->selectprecio)->count() > 0){
			        $precio=$node->filter($tienda->selectprecio)->text();
			      }else{
			      	$precio=0;
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
			    	'nombre'=>trim('a'.$nombre),
			    	'enlace'=>$enlacecompleto,
			    	'imagen'=>$imagencompleta,
			    	'precio'=>$precio,
			    	'tienda'=>$tienda->nombre,
			    	'enlacetienda'=>$tienda->url,
			    	'orden'=>$contador
				    );
				    $contador++;
			 	}
			    
}//contador



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
	set_time_limit(0);

		$tienda=Tienda::where('nombre',$request->tienda)->first();

		$crawler = Goutte::request('GET', $request->enlace);
		if ($crawler->filter($tienda->selectdesc)->count() >0) {
			$descripcion= $crawler->filter($tienda->selectdesc)->text();
		}
		else{
			$descripcion="No hay datos disponibles.";
		}


		if ($crawler->filter($tienda->productimagen)->count() >0) {
			$imagen= $crawler->filter($tienda->productimagen)->attr($tienda->productattrimagen);
			if ($imagen!="") {
				$imagen=$imagen;
				if(str_contains($imagen, "//")||str_contains($imagen, "data:")){
		          $imagencompleta=$imagen;
		        }else{
		          $imagencompleta=$tienda->url.$imagen;
		        }
			}
			else{
				$imagencompleta=$request->imagen;
			}
		}
		else{
			$imagencompleta=$request->imagen;
		}


    	

    	$producto=array(
			    	'nombre'=>$request->nombre,
			    	'enlace'=>$request->enlace,
			    	'imagen'=>$imagencompleta,
			    	'precio'=>$request->precio,
			    	'tienda'=>$request->tienda,
			    	'enlacetienda'=>$tienda->url,
			    	'descripcion'=>$descripcion
				    );

    	$tienda->clicks++;
    	$tienda->save();
    	$productos=array();
    	$tiendas=Tienda::all();




    	



        	$conttienda=1;
		foreach ($tiendas as $tiendax) {
			if ($conttienda<=5) {

    	$key=explode(" ", $request->nombre);

    	if (array_key_exists(4, $key)) {
    		$keywords=$key[0]. " ". $key[1]. " ". $key[2]. " ". $key[3]. " ". $key[4];
    	}

    	else if (array_key_exists(3, $key)) {
    		$keywords=$key[0]. " ". $key[1]. " ". $key[2]. " ". $key[3];
    	}

    	else if (array_key_exists(2, $key)) {
    		$keywords=$key[0]. " ". $key[1]. " ". $key[2];
    	}

    	else if (array_key_exists(1, $key)) {
    		$keywords=$key[0]. " ". $key[1];
    	}
    	else{
    		$keywords=$key[0];
    	}


    	
    	if ($tiendax->nombre=="Sanborns") {
        		$busquedakey=base64_encode($keywords)."/1/";
        	}
        	else{
        		$busquedakey=$keywords;
        	}

        	if($this->is_working_url($tiendax->urlbusqueda.$busquedakey)){
			$crawler = Goutte::request('GET', $tiendax->urlbusqueda.$busquedakey);
			

			$contador=1;
			$crawler->filter($tiendax->selectitem)->each(function ($node) use (&$tiendax,&$productos,&$contador) {
if($contador<5){
			$agregar=true;


			      if($node->filter($tiendax->selectnombre)->count() > 0){
			        if($node->filter($tiendax->selectnombre)->text()!=""){
		                $nombre=$node->filter($tiendax->selectnombre)->text();
		                $nombre=str_replace('\'', '',$nombre);
                    	$nombre=str_replace(',', '',$nombre);
		              }
		              else{
				      	$agregar=false;
				      }
			      }
			      else{
			      	$agregar=false;
			      }
			      if ($enlace=$node->filter($tiendax->selectenlace)->count() > 0) {
			      	$enlace=$node->filter($tiendax->selectenlace)->attr('href');
			      	if(str_contains($enlace, "//")){
                $enlace=$enlace;
              }else{
                $enlace=$tiendax->url.$enlace;
              }
			      }
			      else{
			      	$agregar=false;
			      }
			      if($node->filter($tiendax->selectimagen)->count() > 0){
			        $imagen=$node->filter($tiendax->selectimagen)->attr($tiendax->attrimagen);
			        $imagen=$this->imagen($imagen, $tiendax->nombre);
			        if(str_contains($imagen, "//")||str_contains($imagen, "data:")){
		              $imagencompleta=$imagen;
		            }else{
		              $imagencompleta=$tiendax->url.$imagen;
		            }
			      }
			      else{
			      	$agregar=false;
			      }
			      if($node->filter(".prRange")->count() > 0){
		              $agregar=false;
		            }
			      if($node->filter($tiendax->selectprecio_especial)->count() > 0){
			        $precio=$node->filter($tiendax->selectprecio_especial)->html();
			      }else if($node->filter($tiendax->selectprecio)->count() > 0){
			        $precio=$node->filter($tiendax->selectprecio)->text();
			      }else{
			      	$precio=0;
			      	$agregar=false;
			      }

			      if(str_contains($enlace, $tiendax->url)){
		              $enlacecompleto=$enlace;
		            }else{
		              $enlacecompleto=$tiendax->url.$enlace;
		            }

		            $precio=$this->precio($precio, $tiendax->nombre);
			 		if($precio==0){
			 			$agregar=false;
			 		}


			 	if ($agregar) {
			 		
			 		$productos[]=array(
			    	'nombre'=>trim($nombre),
			    	'enlace'=>$enlacecompleto,
			    	'imagen'=>$imagencompleta,
			    	'precio'=>$precio,
			    	'tienda'=>$tiendax->nombre,
			    	'enlacetienda'=>$tiendax->url,
			    	'orden'=>$contador
				    );
				    $contador++;
			 	}
			    


}//contador

			    });


$conttienda++;
        	}
        }//urlverf
		}//tienda
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
	    	$favorito=new Favorito($request->all());
	    	$favorito->user_id=Auth::user()->id;
	    	$favorito->rowId=$item->rowId;
	    	$favorito->save();
	    	Cart::store(Auth::user()->id);
	    	echo $id.",".$item->rowId;

    	}
    	
    }

    public function removefromfavorite(Request $request){
    	$id = $request->id;
    	Cart::restore(Auth::user()->id);
    	Cart::remove($request->rowId);
    	$favorito=Favorito::where('rowId',$request->rowId)->first();
    	$favorito->delete();
    	Cart::store(Auth::user()->id);
    	echo $id;
    }


    public static function is_working_url($url) {
	  $handle = curl_init($url);
	  curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
	  curl_setopt($handle, CURLOPT_NOBODY, true);
	  curl_exec($handle);
	 
	  $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
	  curl_close($handle);
	 
	  if ($httpCode >= 200 && $httpCode < 300 || $httpCode==405 || $httpCode==302 || $httpCode==400 || $httpCode==503) {
	    return true;
	  }
	  else {
	  	if (str_contains($url, 'bestbuy')) {
	  		return true;
	  	}
	    return false;
	  }
	}

    public static function imagen($imagen, $tienda){

    	if ($tienda=="Sears") {
    		$imagen=str_replace("background-image: url('", '',$imagen);
    		$imagen=str_replace("')", '',$imagen);
    	}
    	else{
    		$imagen=$imagen;
    	}

    	return $imagen;

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
    	if ($tienda=="Best Buy"||$tienda=="Costco"||$tienda=="Sanborns"||$tienda=="Claroshop"||$tienda=="Porrua"||$tienda=="Gandhi"||$tienda=="Dormimundo") {
    		
    		$precio=$precio.".00";
			$precio=str_replace('$', '',$precio);
			$precio=str_replace(' ', '',$precio);
			$precio=ltrim($precio, "\n");
			$precio=str_replace(',', '', $precio);
			$precio=intval(preg_replace('/[^0-9]+/', '', $precio), 10);
			

    	}

    	if ($tienda=="Ebay"){
    		$precio=str_replace('$', '',$precio);
			$precio=str_replace(' ', '',$precio);
			$precio=ltrim($precio, "\n");
			$precio=str_replace(',', '', $precio);
			if (!str_contains($precio,'MXN')||str_contains($precio,'USD')) {
				$precio=0;
			}
			$precio=intval(preg_replace('/[^0-9]+/', '', $precio), 10);
    	}

    	if ($tienda=="Coppel") {
    		
    		$precio=$precio.".00";
			$precio=str_replace('$', '',$precio);
			$precio=str_replace(' ', '',$precio);
			$precio=ltrim($precio, "\n");
			$precio=str_replace(',', '', $precio);
			$precio=intval(preg_replace('/[^0-9]+/', '', $precio), 10);
			

    	}
    	if ($tienda=="Amazon") {

    		if(str_contains($precio, " - ")){
              $preciod=explode('-',$precio);
              $precio=$preciod[0];
            }else{
              $precio=$precio;
            }
    		
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