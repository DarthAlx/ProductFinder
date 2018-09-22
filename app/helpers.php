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


    function prueba($titulo){


    }

    function idealo($enlace){

    	$resultadosPermitidos =[];

    	if(tipo($enlace)){

    		return $resultadosPermitidos;
    	}

        $productoss=DatosPrincipal::where('url', '=', $enlace)->first();
       	$valorMax=$productoss['precio'] + $productoss['precio']*0.5;
	  	$valorMin=$productoss['precio'] - $productoss['precio']*0.5;


		$arraytemp = [];
		
		//$titulo = 'Celular samsung galaxy s9 plus g9650 color gris r9 (telcel)';
		$titulo = $productoss['nombre_producto'];
		$temp=strripos(strtoupper($titulo), 'GALAXY');
		if(gettype($temp)=='integer'){

			$temp=strripos(strtoupper($titulo), 'SAMSUNG');
			if(gettype($temp)!='integer'){

				$titulo= 'samsung ' . $titulo;

			}


		}


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

		        		$result=modelos::where('modelo','LIKE','% '.$arrayPrueba[0]. '%')->orwhere('modelo','LIKE','%'.$arrayPrueba[1]. '%')->get();

		        		foreach ($result as $key ) {

				        	array_push($results, $key->modelo);

		        		}

		        		
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
			
			$x=0;
			foreach ($parteModelo as $m ) {


				if($x!=0){

					$m=' '.$m;
				}
				$x=$x+1;
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

			$t=trim($t);

			$tt=explode(' ', $t);

			
			if(sizeof($tt)>$tamInicial){

				$modeloEncajaFinal=$t;
				$tamInicial=sizeof($tt);

			}
		}
		

		$temp=stripos(($modeloEncajaFinal) , 'Apple');
		if(gettype($temp)=='integer'){

			$modeloEncajaFinal = str_replace('Apple','',$modeloEncajaFinal);
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
		        		array_push($arraytemp, $caso_prueba);

		    }
		    }
		    } 
		}



//$busqueda=DatosPrincipal::where('nombre_producto', '=', $request->enlace)->first();



$search = explode(' ',trim($modeloEncajaFinal));

$searchArray=[];
$tempcount=0;
if($modeloEncajaFinal!=''){


	foreach ($search as $t ){

		



		if($tempcount==0){

			$temp = ['nombre_producto','LIKE',"%$t %"];

			array_push($searchArray, $temp);
					

		}else{

			$temp = ['nombre_producto','LIKE',"% $t%"];

			array_push($searchArray, $temp);

		}

		$tempcount = $tempcount +1;

		
	}






	//$searchArray = [['nombre_producto','LIKE',"%{$search[0]}%"],['nombre_producto','LIKE',"%{$search[1]}%"],['nombre_producto','LIKE',"%{$search[2]}%"],['nombre_producto','LIKE',"%{$search[3]}%"]];

	$busqueda = DatosPrincipal::where($searchArray)->get()->sortBy('precio');
	//$busqueda = DatosPrincipal::where('nombre_producto','LIKE',"%galaxy s8%")->get()->sortBy('precio');
	
}





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
 $noPermitidas=['-----','Funko','Case','caso','Caso','impermeable','Cinturon','FUNDA','Funda','funda','Protector','protector','MICA','Mica', 'mica', 'Visor', 'visor','Cargador','cargador','antipolvo','Antipolvo','Caida','caida','cubierta','Cubierta'];
if(gettype(strpos(strtoupper($modeloEncajaFinal) , 'PLUS'))!='integer'){

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

	  			//if(gettype($d) != 'integer'){

		  			array_push($resultadosPermitidos, $row);
		  			//array_push($tiendasExistente, $row['tienda']);

	  			//}

	  		}	  		
	  	}

	  	$validador=false;
}
    return $resultadosPermitidos;

  }


  function tipo($enlace){

  	$productoss=DatosPrincipal::where('url', '=', $enlace)->first();
	$titulo = $productoss['nombre_producto'];
	$nombre = explode(' ', $titulo);
	$existe = false;


	 //$noPermitidas=['-----','adaptador','insignia','Funko','Case','caso','Caso','impermeable','Cinturon','FUNDA','Funda','funda','Protector','protector','MICA','Mica', 'mica', 'Visor', 'visor','Cargador','cargador','antipolvo','Antipolvo','Caida','caida','cubierta','Cubierta'];
 	$noPermitidas=['-----','ADAPTADOR','INSIGNIA','FUNKO','CASE','CASO','CASO','IMPERMEABLE','CINTURON','FUNDA','FUNDA','FUNDA','PROTECTOR','PROTECTOR','MICA','MICA', 'MICA', 'VISOR', 'VISOR','CARGADOR','CARGADOR','ANTIPOLVO','ANTIPOLVO','CAIDA','CAIDA','CUBIERTA','CUBIERTA'];

	  	foreach ($nombre as $palabra) {
	 


	   $existe = in_array(strtoupper($palabra), $noPermitidas) || $existe;








	    


		


	  	}

	  	return $existe;



  }

?>