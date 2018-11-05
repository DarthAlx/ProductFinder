<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tienda;
use Goutte;
use App\Busqueda;
use App\Busquedauser;
use App\Categoria;

use App\DatosPrincipal;
use App\Modelos;
use App\Configuracion;

use DB;

use Input;
use Cart;
use Auth;
use App\Favorito;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        set_time_limit(0);
        ini_set('memory_limit', '-1');
		//$tiendas=Tienda::all();
        DB::connection()->enableQueryLog();

        

		//$tiendas=Tienda::all()->where('id','=',3);
    	$productos=array();

        $busqueda = $request->busqueda;

        $busquedaArray =explode(' ', $busqueda);
        $arrayPrueba=[];

        foreach ($busquedaArray as $palabra ) {

        	$arrayPalabra=[];
        	$arrayPalabra=['producto', 'LIKE'];
        	$tempPalabra='%'.$palabra.'%';
        	array_push($arrayPalabra, $tempPalabra);
        	array_push($arrayPrueba, $arrayPalabra);

        }



        if($busqueda == 'television'){

            $busqueda = 'TV';

        }
 
/*
        $arrayPrueba=[
        	['nombre_producto', 'LIKE', '%'.$busquedaArray[0].'%'],
        	['nombre_producto', 'LIKE', '%'.$busquedaArray[1].'%'],
        	['nombre_producto', 'LIKE', '%'.$busquedaArray[2].'%'] 


        	];*/

   

        //$productoss=DatosPrincipal::where('nombre_producto', 'LIKE', '%'.$busqueda.'%')->get();
        $productoss=DatosPrincipal::where($arrayPrueba)->get();
  
/*
		if(empty($productoss[0])){

    		$productoss=DatosPrincipal::where('marca', 'LIKE', '%'.$busqueda.'%')->get();

   			if(empty($productoss[0])){

        		$productoss=DatosPrincipal::where('modelo', 'LIKE', '%'.$busqueda.'%')->get();

        		if(empty($productoss[0])){

           			$productoss=DatosPrincipal::where('tienda', 'LIKE', '%'.$busqueda.'%')->get();
    	
        }

    }


}*/



//dd($productoss);
//die();


$contador = 1;

		

		$procesados=[];
		$itemProduct=[];
		$procesados2=[];
		$i=0;
/*
        foreach($productoss as $producto){
        	$i=$i+1;
        

        	$existe = in_array($producto->url, $procesados);

        	if(sizeof($procesados)>0){

	        	foreach ($procesados2 as $temp) {
	        	}

        	}else{

		        		
        	}




        	if($existe==false){


	        
	        	$idealos = idealo($producto->url);
	        	if(sizeof($idealos)==0){

	        		$existe = in_array($producto->url, $procesados);

	        		if(!$existe){

	        			array_push($itemProduct,$producto);

	        		}

	        		


	        	}else{

	        		$existe = in_array($idealos[0]->url, $procesados);

	        		if(!$existe){

	        			array_push($itemProduct,$idealos[0]);

	        		}

	        		


	        	}
	        	
	        	foreach ($idealos as $temp) {

	        		array_push($procesados,$temp->url);
	        		array_push($procesados2,$temp->nombre_producto);


	        	}
	        	

        	}


        }*/
        $procesados = [];
        $existe = false;
        $productoFinal = [];
        foreach ($productoss as $key) {

        	$existe = in_array($key->producto, $procesados);
        	/*

        	if($existe){
        		echo 'si--------------------';
        	}else{
        		echo 'no--------------------';
        	}
        	*/

        	if(!$existe){


				array_push($procesados,$key->producto);
				array_push($productoFinal,$key);

	

        	}

        	//print_r($productoFinal);

        	
        }



        foreach($productoFinal as $producto){

        	//array_push($procesados,idealo($producto->url));

        	$pos = strpos($producto->image_url, 'data:image/png;');

        	if ($pos) {
        		
        		$imagen=$domain = strstr(strstr(trim($producto->image_url), ',data'), 'data');


        	}else{

        		if($producto->tienda == 'Claroshop' || $producto->tienda=='Sanborns'){

        			$imagen= trim(explode('.jpg',$producto->image_url)[0]) . '.jpg';


        		}elseif($producto->tienda == 'Costco' || $producto->tienda=='Officedepot'){

        			if($producto->tienda == 'Costco'){ 

        				$imagen = 'https://www.costco.com.mx' . $producto->image_url;


        			}else{

        				$imagen = 'https://www.officedepot.com.mx' . $producto->image_url;
        			}



        		}else{

        			$imagen= trim(explode(',',$producto->image_url)[0]);

        		}

        		
        	}


        	if(trim($producto->tienda)=='Sanborns' || trim($producto->tienda)=='Bestbuy' || trim($producto->tienda)=='dormimundo' || trim($producto->tienda)=='Claroshop' || trim($producto->tienda)=='solarismexico' || trim($producto->tienda)=='casapalacio' || trim($producto->tienda)=='homedepot' || trim($producto->tienda)=='Porrua' || trim($producto->tienda)=='gandhi' ){

        		$precioTemp=trim($producto->precio);
        	}else{
        		$precioTemp=trim($producto->precio);


        	}



	            $productos[]=array(
	                'nombre'=>trim($producto->nombre_producto),
	                'enlace'=>trim($producto->url),
	                'imagen'=>$imagen,
	                'precio'=>$precioTemp,
	                'tienda'=>trim($producto->tienda),
	                'enlacetienda'=>trim($producto->url),
	                'orden'=>$contador,
	                'id'=> $producto->id 
	                );
	                $contador++;

                

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
  				$url = $producto->options->imagen;
			    $ch = curl_init();
			    curl_setopt($ch, CURLOPT_URL, $url);
			    curl_setopt($ch, CURLOPT_HEADER, 1);
			    curl_setopt($ch , CURLOPT_RETURNTRANSFER, 1);
			    $data = curl_exec($ch);
			    $headers = curl_getinfo($ch);
			    curl_close($ch);
			   
			    if( $headers['http_code']==200){
			    

				 		$productos[]=array(
				    	'nombre'=>$producto->name,
				    	'enlace'=>$producto->options->enlace,
				    	'imagen'=>$producto->options->imagen,
				    	'cprecio'=>$producto->price,
				    	'tienda'=>$producto->options->tienda,
				    	'enlaetienda'=>$producto->options->url,
				    	'orden'=>$contador
					    );
					    $contador++;
				    }
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
			$busqueda = DatosPrincipal::where('url','=',$request->enlace)->first();
			$busqueda2 = DatosPrincipal::where('cod_producto','=',$busqueda['cod_producto'])->get()->sortBy('precio');
			$resultadosPermitidos=[];
			$tiendasExistente=[];
			foreach ($busqueda2 as $product) {
			  			$d = array_search($product['tienda'], $tiendasExistente);
			  			if(gettype($d) != 'integer'){
				  			array_push($resultadosPermitidos, $product);
				  			array_push($tiendasExistente, $product['tienda']);
			  			}
  	
			}
	    	$producto=array(
				    	'nombre'=>$request->nombre,
				    	'enlace'=>$request->enlace,
				    	'imagen'=>$request->imagen,
				    	//'imagen'=>$productoss->image_url,
				    	'precio'=>$request->precio,
				    	'tienda'=>$request->tienda,
				    	//'enlacetienda'=>$tienda->url,
				    	//'descripcion'=>$productoss->descripcion
				    	'enlacetienda'=>'',
				    	'descripcion'=>$request->descripcion
				    	//'descripcion'=>$productoss->descripcion
						);
						
						$key=explode(" ", $request->nombre);
						if (array_key_exists(5, $key)) {
							$keywords=$key[0]. " ". $key[1]. " ". $key[2]. " ". $key[3]. " ". $key[4]. " ". $key[5];
						}
						elseif (array_key_exists(4, $key)) {
							$keywords=$key[0]. " ". $key[1]. " ". $key[2]. " ". $key[3]. " ". $key[4];
						}
						elseif (array_key_exists(3, $key)) {
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
	 
	        $productos=DatosPrincipal::where('nombre_producto', 'LIKE', '%'.$keywords.'%')->orderBy('precio','asc')->get();
		$categorias = '';
	    	$categorias=Categoria::orderBy('nombre','asc')->get();
			return view('detalle', ['producto'=>$producto,'categorias'=>$categorias,'relacionados'=>$resultadosPermitidos]);		
	}

	public function productoligar(Request $request){
	set_time_limit(0);
	$configuracion = Configuracion::where('id','=',1)->first();
	$estado = $configuracion['estado'];
	//$estado = 20074;
	$producto = DatosPrincipal::where('id','=',$estado)->first();
	$size=sizeof($producto);


	while(sizeof($size==0 || $size===null){

		$estado += 1;
		$producto = DatosPrincipal::where('id','=',$estado)->first();		

	}
	$NombreProducto = $producto['nombre_producto'];
	$ArrayNombreProducto = explode(" ", $producto['nombre_producto']);
	$buscar=[];
	$busquedaArray=[];
/*
	foreach ($ArrayNombreProducto as $palabra) {

		if(strlen($palabra) > 1){

			array_push($buscar, 'nombre_producto','like');

			$palabra = '%'.$palabra.'%';

			array_push($buscar, $palabra);

			
			array_push($busquedaArray, $buscar);



			$buscar=[];			
		}


	



	}
*/
    $results=[];
    $relacionadosF=[];
    $lenCadenas=sizeof($ArrayNombreProducto);
    $impar=false;
    $palabraNoPermitida=['en','de', 'el'];                                                       
	$resultadoTitulo = array_diff($ArrayNombreProducto, $palabraNoPermitida);
 	foreach ($resultadoTitulo as $palabra) {
 		
 		$result=DatosPrincipal::where('nombre_producto','LIKE','% '.$palabra.' %')->get();
 		foreach ($result as $key ) {
 			array_push($results, $key);
 		}
 		
/*
 */
 	}


 	foreach ($results as $key) {
		similar_text($key['nombre_producto'], $NombreProducto, $percent); 
	 	if($percent>50 && $key['ligar_manual']==false){
	 		array_push($relacionadosF, $key);

	 	}	
		
 	}

 /*   	$producto=array(
			    	'nombre'=>$producto['nombre_producto'],
			    	'enlace'=>$producto['url'],
			    	'imagen'=>$producto['image_url'],
			    	//'imagen'=>$productoss->image_url,
			    	'precio'=>$producto['precio'],
			    	'tienda'=>$producto['tienda'],
			    	//'enlacetienda'=>$tienda->url,
			    	//'descripcion'=>$productoss->descripcion
			    	'enlacetienda'=>'',
			    	'descripcion'=>$producto['descripcion']
			    	//'descripcion'=>$productoss->descripcion
					);

*/

    	$producto=array(
			    	'nombre'=> $producto['nombre_producto'],
			    	'enlace'=> $producto['url'],
			    	'imagen'=> $producto['image_url'],
			    	//'imagen'=>$productoss->image_url,
			    	'precio'=> $producto['precio'],
			    	'tienda'=> $producto['tienda'],
			    	//'enlacetienda'=>$tienda->url,
			    	//'descripcion'=>$productoss->descripcion
			    	'enlacetienda'=> $producto['url'],
			    	'id'=> $producto['id'],
			    	'descripcion'=> $producto['descripcion']
			    	//'descripcion'=>$productoss->descripcion
					);
					$key=explode(" ", 'nombre segundo');

					if (array_key_exists(5, $key)) {
						$keywords=$key[0]. " ". $key[1]. " ". $key[2]. " ". $key[3]. " ". $key[4]. " ". $key[5];
					}
					elseif (array_key_exists(4, $key)) {
						$keywords=$key[0]. " ". $key[1]. " ". $key[2]. " ". $key[3]. " ". $key[4];
					}
					elseif (array_key_exists(3, $key)) {
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

 


$categorias = '';

		$estado+=1;

    	$categorias=Categoria::orderBy('nombre','asc')->get();
		return view('detalleligar', ['producto'=>$producto,'categorias'=>$categorias,'relacionados'=>$relacionadosF,'estado'=>$estado]);

	}

	public function ligarmanual(Request $request){

	    $datos[]=$request;
	    $t = $request->all();

	    $respuesta = $t['ligar'];
	    $todoID=explode(',',$t['todo']);
	    $arrayRespuestaSi=[];
	    $i=0;

	    foreach ($respuesta as $value) {

	      if($value == 1 || $value == '1'){

	        $e = array_push($arrayRespuestaSi, $i);


	      }
	      $i+=1;

	      
	    }

	      
	      $configuracion = Configuracion::where('id','=',2)->first();
	      $codLigado = $configuracion['estado'] + 1;


	      $configuracion->estado = $codLigado;	
	      $configuracion->save();

	      $configuracion = Configuracion::where('variable','=','producto_actual')->first();
	      $configuracion->estado=$t['estado'];	
	      $configuracion->save();


	        $producto = DatosPrincipal::where('id','=',$t['productoBase'])->first();
	        $producto->cod_producto = $codLigado;
	        $producto->ligar_manual = 1;
	        $producto->save();
	        $nombreCodProducto=$producto->nombre_producto;


	      foreach ($arrayRespuestaSi as $value) {


	        $producto = DatosPrincipal::where('id','=',$todoID[$value])->first();
	        $producto->cod_producto = $codLigado;
	        $producto->ligar_manual = 1;
	        $producto->producto = $nombreCodProducto;
	        $producto->save();

	      }

	      return redirect()->action('SearchController@producto');

	}




    public function addtofavorite(Request $request){
    	if (Auth::guest()) {

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

    	}
    	
    }

    public function removefromfavorite(Request $request){
    	$id = $request->id;
    	Cart::restore(Auth::user()->id);
    	Cart::remove($request->rowId);
    	$favorito=Favorito::where('rowId',$request->rowId)->first();
    	$favorito->delete();
    	Cart::store(Auth::user()->id);
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
