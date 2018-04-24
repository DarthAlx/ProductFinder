<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Tienda;
use Goutte;
use Mail;
use App\Top;
use App\Favorito;
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
		        if (trim($descripcion)!="") {
		        	$descripcion=$descripcion;
		        }
		        else{
		      	$descripcion="Información no disponible.";
		      }
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
		        $precio=$node->filter($tienda->productprecioespecial)->html();
		        $precio=SearchController::precio($precio, $tienda->nombre);
		      }else if($node->filter($tienda->productprecio)->count() > 0){
		        $precio=$node->filter($tienda->productprecio)->text();
		        $precio=SearchController::precio($precio, $tienda->nombre);
		      }else{
		      	$precio="Información no disponible.";
		      }

    		echo trim($nombre).";;".$descripcion.";;".$imagen.";;".$precio.";;".$request->enlace.";;".$tienda->nombre.";;".$tienda->url;
    	}
    	else{
    		echo "nada";
    	}
		

    }


public static function revisarfavorito()
    {

  $favoritos=Favorito::all();


  foreach ($favoritos as $favorito) {
    $tienda=Tienda::where('nombre',$favorito->tienda)->first();
    $user=$favorito->user;

    $crawler = Goutte::request('GET', $favorito->enlace);
    $agregar=true;

    if($crawler->filter($tienda->productprecioespecial)->count() > 0){
      $precio=$crawler->filter($tienda->productprecioespecial)->html();
    }else if($crawler->filter($tienda->productprecio)->count() > 0){
      $precio=$crawler->filter($tienda->productprecio)->text();
    }else{
      $agregar=false;
    }
    if ($favorito->enviado==1) {
        $agregar=false;
    }


    if ($agregar) {
      $precio=SearchController::precio($precio, $tienda->nombre);
      $porcentaje=$favorito->precio-($favorito->precio*0.015);
      if ($precio<=$porcentaje) {
        Mail::send('emails.precio', ['user'=>$user,'favorito'=>$favorito, 'precio'=>$precio], function ($m) use ($user,$favorito) {
            $m->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            $m->to($user->email, $user->name)->subject("¡Tu favorito bajó de precio!");
        });
        $favorito->enviado=1;
        $favorito->save();
      }
    }
  }



}




}
