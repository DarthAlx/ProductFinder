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
        	$arrayPalabra=['nombre_producto', 'LIKE'];
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
  

		if(empty($productoss[0])){

    		$productoss=DatosPrincipal::where('marca', 'LIKE', '%'.$busqueda.'%')->get();

   			if(empty($productoss[0])){

        		$productoss=DatosPrincipal::where('modelo', 'LIKE', '%'.$busqueda.'%')->get();

        		if(empty($productoss[0])){

           			$productoss=DatosPrincipal::where('tienda', 'LIKE', '%'.$busqueda.'%')->get();
    	
        }

    }


}



//dd($productoss);
//die();


$contador = 1;


        foreach($productoss as $producto){

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
	                'orden'=>$contador
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
	set_time_limit(0);



        $productoss=DatosPrincipal::where('url', '=', $request->enlace)->first();
       	$valorMax=$productoss['precio'] + $productoss['precio']*0.6;
	  	$valorMin=$productoss['precio'] - $productoss['precio']*0.5;


		$arraytemp = [];
		$resultadosPermitidos =[];
		//$titulo = 'Celular samsung galaxy s9 plus g9650 color gris r9 (telcel)';
		$titulo = $request->nombre;
		$cadenas = explode(' ', $titulo);



        
        $arrayPrueba=[];
        $i=0;
        $j=0;
        $results=[];
        $lenCadenas=sizeof($cadenas);
        $impar=false;
        //$cadenas=[];
        $ff=6;
 
        
        if (($lenCadenas%2) == 0){
		    $impar=false;
		   
		}else{
		   $impar=true;
		
		}
		//$impar=false;

        foreach ($cadenas as $palabra ) {

        	if($lenCadenas==1){



        		$result=modelos::where('modelo','LIKE','%'.$palabra . '%')->get();

        		array_push($results, $result->modelo);

        	}else{

        		if($j==($lenCadenas-1) && $impar==true){




		        		$result=modelos::where('modelo','LIKE','%'.$arrayPrueba[0]. '%')->orwhere('modelo','LIKE','%'.$arrayPrueba[1]. '%')->get();

		        		foreach ($result as $key ) {


				        	array_push($results, $key->modelo);

		        		}







        



		        	$result=modelos::where('modelo','LIKE','%'.$palabra . '%')->get();
		        		foreach ($result as $key ) {


				        	array_push($results, $key->modelo);

		        		}


		        	$arrayPrueba=[];



        		}else{

		        	if($i<2){

		        		array_push($arrayPrueba, $palabra);
		        		$i+=1;
		        		$j+=1;


		        	}else{

		        		$i=0;

		        		$result=modelos::where('modelo','LIKE','%'.$arrayPrueba[0]. '%')->orwhere('modelo','LIKE','%'.$arrayPrueba[1]. '%')->get();

		        		foreach ($result as $key ) {

				        	array_push($results, $key->modelo);

		        		}

		        		

		        		//print_r($result);
		        		//print_r($arrayPrueba);
		        		$arrayPrueba=[];

		        		array_push($arrayPrueba, $palabra);
		        		$i+=1;
		        		$j+=1;		        				        	        		

		        	}

        		}

        	}

        }
        $resultados = array_unique($results);


		/* resultados tiene todos los modelos guardados en la tabla modelos que coinciden por lo menos con una de las palabras del titulo del producto */
		/* Ahora toca buscar cual de estos modelos encaja 100% con el titulo */
		$modeloEncaja=[];
		foreach ($resultados as $modeloEncontrado) {
			
			$parteModelo = explode(' ', $modeloEncontrado);
			$lenParteModelo = sizeof($parteModelo);
			$contadorDeEncaje=0;
			
	
			foreach ($parteModelo as $m ) {




				$temp=stripos($titulo, $m);

				if(gettype($temp)=='integer'){
				

					


					$contadorDeEncaje+=1;


				}
				
			}

			if($contadorDeEncaje == $lenParteModelo){

				//$modeloEncaja=$modeloEncontrado;
		
				array_push($modeloEncaja, $modeloEncontrado);
				$contadorDeEncaje=0;

			}

			

		}



		$modeloEncajaFinal='';
		$tt=[];
		$tamInicial=0;

		foreach ($modeloEncaja as $t) {

			$tt=explode(' ', $t);
			
			if(sizeof($t)>$tamInicial){

				$modeloEncajaFinal=$t;
			}
		}



		///$result=DatosPrincipal::where($arrayPrueba)->get();
/*
		foreach ($result as $resultProduct) {

			
		}*/


		foreach ($cadenas as $caso_prueba) {
		    if (!ctype_alpha($caso_prueba)) {
		        if (!ctype_digit($caso_prueba)) {
		            if (ctype_alnum($caso_prueba)) {

		            	$existe= strpos($caso_prueba, '"');
		              if($existe == false){
		                $existe= strpos($caso_prueba, '4k');
		                if(gettype($existe) != 'integer'){
		                  $existe= strpos($caso_prueba, '4k');
		                  if(true){
		               
		                array_push($arraytemp, $caso_prueba);
		              }
		              }

		              }
		        		//echo "La cadena $caso_prueba es solo alnumerico <br>";
		        		array_push($arraytemp, $caso_prueba);

		    }
		    }
		    } 
		}


//echo '--------------------------------------'.$arraytemp[0].'-------------------------------<br>';

//$busqueda=DatosPrincipal::where('nombre_producto', '=', $request->enlace)->first();



$search = explode(' ', $modeloEncajaFinal) ;
$searchArray=[];
foreach ($search as $t ){

	$temp = ['nombre_producto','LIKE',"% $t %"];

	array_push($searchArray, $temp);
	
}







//$searchArray = [['nombre_producto','LIKE',"%{$search[0]}%"],['nombre_producto','LIKE',"%{$search[1]}%"],['nombre_producto','LIKE',"%{$search[2]}%"],['nombre_producto','LIKE',"%{$search[3]}%"]];

$busqueda = DatosPrincipal::where($searchArray)->get()->sortBy('precio');

//print_r($busqueda);
//$busqueda = DatosPrincipal::where('nombre_producto','LIKE',"%galaxy s8%")->get()->sortBy('precio');

if(sizeof($modeloEncaja)==0){
	if(sizeof($arraytemp)!=0){

		$search = ' '. $arraytemp[0];
	}else{
		$search = '*--*fdfdf786876kljfdhljdfyhfd--***';		
	}

	

	$busqueda = DatosPrincipal::where('nombre_producto','LIKE',"% {$search} %")->get()->sortBy('precio');

}




$i=0;
$arraytemp = [];
$tiendasExistente=[];
 $noPermitidas=['-----','Funko','caso','Caso','impermeable','Cinturon','FUNDA','Funda','funda','Protector','protector','MICA','Mica', 'mica', 'Visor', 'visor','Cargador','cargador','antipolvo','Antipolvo','Caida','caida','cubierta','Cubierta'];
if(gettype(strpos($modeloEncajaFinal, 'plus'))!='integer'){

	array_push($noPermitidas, 'plus','Plus');
}
if(gettype(strpos($modeloEncajaFinal, '+'))!='integer'){

	array_push($noPermitidas, '+');
}

$validador=false;
  foreach($busqueda as $row){


    //$imagen=$row['imagen'];
    
	  	foreach ($noPermitidas as $palabra) {
	 
	    $nombre=$row['nombre_producto'];
	    $modelo = $row['tienda'];
	  // $pos = strpos($nombre, 'unda');
	    if(false){

	  
	          
	    }else{

	   $pos = strpos(($nombre), ($palabra));
	   $clave = array_search('uno', $noPermitidas);





	    if(gettype($pos) == 'integer'){

	    	$validador=true;

	      $i=$i+1;

	      
	      //break;

	    }


	} 		


	  	}



	  	if(!$validador){
	  		if(($row['precio']  < $valorMax) and ($row['precio']  > $valorMin)){

	  			$d = array_search($row['tienda'], $tiendasExistente);

	  			if(gettype($d) != 'integer'){

		  			array_push($resultadosPermitidos, $row);
		  			array_push($tiendasExistente, $row['tienda']);

	  			}






	  		}

	  		
	  		
	  	}
	  	$validador=false;
}
$i=0;
  foreach ($resultadosPermitidos as $lista) {

  	$i= $i +1;

  }


		//$tienda=Tienda::where('nombre',$request->tienda)->first();
		//$tienda=DatosPrincipal::where('tienda', '=', $request->enlace)->first();
		

    	$producto=array(
			    	'nombre'=>$request->nombre,
			    	'enlace'=>$request->enlace,
			    	'imagen'=>$productoss->image_url,
			    	'precio'=>$request->precio,
			    	'tienda'=>$request->tienda,
			    	//'enlacetienda'=>$tienda->url,
			    	//'descripcion'=>$productoss->descripcion
			    	'enlacetienda'=>'',
			    	'descripcion'=>$productoss->descripcion
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
