<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();


Route::get('pruebacookie', function(){
  $array=array(
    'nombre'=>'Alexis',
    'apellidos'=>'Morales'
  );
  $nueva_cookie = cookie('nombre', implode(',',$array), 60);
  $response = response("Voy a enviarte una cookie");
  $response->withCookie($nueva_cookie);
  return $response;
});
Route::get('readc', 'HomeController@readc');

Route::get('/z', function() {



  $crawler = Goutte::request('GET', 'https://www.liverpool.com.mx/tienda/?s=xbox');
  $contador=0;
  $productos=array();
    $crawler->filter('.product-cell')->each(function ($node) {




      if($node->filter('.product-name')->text()!=""){
        $nombre=$node->filter('.product-name')->text();
        $enlace=$node->filter('.product-name')->attr('href');
      }
      if($node->filter('.product-thumb')->attr('data-original')!=""){
        $imagen=$node->filter('.product-thumb')->attr('data-original');
      }
      if($node->filter('.price-amount')->text()!=""){
        $precio=$node->filter('.price-amount')->text();
      }

      $productos[]=array(
          'nombre'=>$nombre,
          'imagen'=>$imagen,
          'precio'=>$precio
        );
 
    echo "<a href='https://www.liverpool.com.mx".$enlace."'><p>".$nombre."</p>"."<br></a>";
    echo "<a href='https://www.liverpool.com.mx".$enlace."'><img src='". $imagen."'><br></a>";



    });




});



Route::get('/revisarfavorito', function () {
  $favoritos=App\Favorito::all();


  foreach ($favoritos as $favorito) {
    $tienda=App\Tienda::where('nombre',$favorito->tienda)->first();
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


    if ($agregar) {
      $precio=App\Http\Controllers\SearchController::precio($precio, $tienda->nombre);
      if ($precio<$favorito->precio) {
        Mail::send('emails.precio', ['user'=>$user,'favorito'=>$favorito, 'precio'=>$precio], function ($m) use ($user,$favorito) {
            $m->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            $m->to($user->email, $user->name)->subject("¡Tu favorito bajó de precio!");
        });
      }
    }
  }

});


Route::get('/1', function () {
  set_time_limit(0);


 /* $item=Cart::add(1,"test",1,2500);
  dd($item->rowId);*/
  $busquedas=App\Busqueda::orderBy('keywords','asc')->get();

    if ($busquedas) {
      $string = "{";
      foreach ($busquedas as $busqueda) {
        $string .="'".$busqueda->keywords."'".":"."'"."',";
          }
          $string.="}";
          $busquedasjson=json_encode($string);
    }
        




        $tops=App\Top::orderBy('orden')->get();
        foreach ($tops as $top) {
          $destacados[]=array(
            'nombre'=>$top->nombre,
            'enlace'=>$top->enlace,
            'imagen'=>$top->imagen,
            'precio'=>$top->precio,
            'tienda'=>$top->tienda->nombre,
            'enlacetienda'=>$top->tienda->url,
            'orden'=>$top->orden
            );
        }
        $categorias=App\Categoria::orderBy('nombre','asc')->get();
        $ad=App\Ad::where('lugar','inicio')->first();

    return view('inicio2', ['busquedas'=>$busquedasjson,'tops'=>$destacados,'categorias'=>$categorias,'ad'=>$ad]);
});








Route::get('/', function () {
  set_time_limit(0);


 /* $item=Cart::add(1,"test",1,2500);
  dd($item->rowId);*/
  $busquedas=App\Busqueda::orderBy('keywords','asc')->get();

    if ($busquedas) {
      $string = "{";
      foreach ($busquedas as $busqueda) {
        $string .="'".$busqueda->keywords."'".":"."'"."',";
          }
          $string.="}";
          $busquedasjson=json_encode($string);
          $tendencias=App\Busqueda::orderBy('contador','desc')->get();
    }
    else{
      $tendencias=App\Tendencia::all();
    }
    
    $tiendas=App\Tienda::orderByRaw("RAND()")->get();
    $productos=array();
  

$conttienda=1;
$conttendencia=1;
        foreach ($tiendas as $tienda) {
          if ($conttienda<=5) {
            
          foreach ($tendencias as $tendencia) {
            //if ($conttendencia<=5) {

            if ($tienda->nombre=="Sanborns") {
            $busquedakey=base64_encode($tendencia->keywords)."/1/";
          }
          else{
            $busquedakey=$tendencia->keywords;
          }
      $crawler = Goutte::request('GET', $tienda->urlbusqueda.$busquedakey);

      

      $contador=1;
      $crawler->filter($tienda->selectitem)->each(function ($node) use (&$tienda,&$productos,&$contador) {
        if($contador==1){

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
              $imagen=App\Http\Controllers\SearchController::imagen($imagen, $tienda->nombre);
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

          $precio=App\Http\Controllers\SearchController::precio($precio, $tienda->nombre);
          if($precio==0){
            $agregar=false;
          }
        if ($agregar) {
          
          $productos[]=array(
            'nombre'=>trim($nombre),
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
     // $conttendencia++;
    //}
          }//tendencia
          $conttienda++;
          }
        }//tienda

        $tendenciasarray = array_values(array_sort($productos, function ($value) {
            return $value['precio'];
        }));
        $tendenciasarray=array_reverse($tendenciasarray);



        $tops=App\Top::orderBy('orden')->get();
        foreach ($tops as $top) {
          $destacados[]=array(
            'nombre'=>$top->nombre,
            'enlace'=>$top->enlace,
            'imagen'=>$top->imagen,
            'precio'=>$top->precio,
            'tienda'=>$top->tienda->nombre,
            'enlacetienda'=>$top->tienda->url,
            'orden'=>$top->orden
            );
        }
        $categorias=App\Categoria::orderBy('nombre','asc')->get();
        $ad=App\Ad::where('lugar','inicio')->first();

    return view('inicio', ['busquedas'=>$busquedasjson,'tendencias'=>$tendenciasarray,'tops'=>$destacados,'categorias'=>$categorias,'ad'=>$ad]);
});




Route::post('buscar', 'SearchController@index');
Route::get('/buscar', function () {
  $productos=array();
  $categorias=App\Categoria::orderBy('nombre','asc')->get();
    return view('buscar', ['productos'=>$productos,'categorias'=>$categorias]);
});
Route::get('/buscar/{slug}', 'SearchController@categoria');

Route::post('producto', 'SearchController@producto');

Route::post('addtofavorite', 'SearchController@addtofavorite');
Route::post('removefromfavorite', 'SearchController@removefromfavorite');

// Authentication routes...
Route::get('entrar', 'Auth\LoginController@showLoginForm');
Route::post('entrar', 'Auth\LoginController@login');

Route::get('acceso', 'RolesController@index');

Route::get('/salir', function () {
    Cart::restore(Auth::user()->id);
    Cart::store(Auth::user()->id);
    Auth::logout();
    return redirect()->intended('/');
})->middleware('auth');

// Registration routes...
Route::get('registro', 'Auth\RegisterController@showRegistrationForm');
Route::post('registro', 'Auth\RegisterController@register');


Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
// Facebook

Route::get('auth/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('auth/facebook/retorno', 'Auth\LoginController@handleProviderCallback');



Route::get('/productos', function () {
    return view('admin.productos');
})->middleware('admin');

Route::get('favoritos', 'SearchController@favoritos')->middleware('auth');
Route::post('favoritos', 'SearchController@favoritos')->middleware('auth');

Route::post('cambiar-contrasena-user', 'UserController@changepassuser')->middleware('auth');
Route::post('actualizar-datos', 'UserController@updatedetails')->middleware('auth');

Route::get('/tiendas', function () {
    return view('tiendas');
});
Route::get('/acercade', function () {
    return view('acercade');
});
Route::get('/contacto', function () {
    return view('contacto');
});

Route::post('/contacto', function (Illuminate\Http\Request $request) {
    $datos=$request;

    Mail::send('emails.contacto', ['datos'=>$datos], function ($m) use ($datos) {
        $m->from($datos->email, $datos->nombre);
        $m->to(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))->subject('Contacto');


    });

    Illuminate\Support\Facades\Session::flash('mensaje', '¡Mensaje enviado!');
    Illuminate\Support\Facades\Session::flash('class', 'success');
    return redirect()->intended(url()->previous());
});


Route::get('/bolsa-de-trabajo', function () {
    return view('trabajo');
});
Route::post('/bolsa-de-trabajo', function (Illuminate\Http\Request $request) {
    $datos[]=$request;

    if ($datos[0]->hasFile('cv')) {
      $file = $datos[0]->file('cv');
      $name = "cv-". time(). "." . $file->getClientOriginalExtension();
      $path = base_path('uploads/temp/');
      $file-> move($path, $name);
    }
    $datos[]=$name;
    Mail::send('emails.bolsa', ['datos'=>$datos[0]], function ($m) use ($datos) {
        $m->from($datos[0]->email, $datos[0]->nombre);
        $m->attach(url('/uploads/temp/'.$datos[1]), ['as' => $datos[1]]);
        $m->to(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))->subject('Bolsa de trabajo');
    });
    Illuminate\Support\Facades\File::delete($path . $name);
    Illuminate\Support\Facades\Session::flash('mensaje', '¡Mensaje enviado!');
    Illuminate\Support\Facades\Session::flash('class', 'success');
    return redirect()->intended(url('/bolsa-de-trabajo'));
});


Route::get('/registra-tu-marca', function () {
    return view('marca');
});

Route::post('/registra-tu-marca', function (Illuminate\Http\Request $request) {
    $datos=$request;

    Mail::send('emails.marca', ['datos'=>$datos], function ($m) use ($datos) {
        $m->from($datos->email, $datos->nombre);
        $m->to(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))->subject('Nueva marca');


    });

    Illuminate\Support\Facades\Session::flash('mensaje', '¡Mensaje enviado!');
    Illuminate\Support\Facades\Session::flash('class', 'success');
    return redirect()->intended(url('/registra-tu-marca'));
});



Route::get('/perfil', function () {
    return view('perfil');
})->middleware('auth');

Route::get('/comentarios', function () {
    return view('comentarios');
})->middleware('auth');

Route::get('/mensajes', function () {
    return view('mensajes');
})->middleware('auth');
Route::post('leermensaje', 'MensajeController@read')->middleware('auth');


Route::group(['middleware' => 'admin'], function(){
	Route::get('/crm', function () {
			$usuarios=App\User::where('is_admin',0)->where('status','Activo')->orderBy('name','asc')->get();
		    return view('admin.usuarios', ['usuarios'=>$usuarios]);
		}); 

	Route::get('/admin', function () {
			$month = date('m');
		      $year = date('Y');
		      $day = date('d');
		      $from= date('Y-m-d', mktime(0,0,0, 1, 1, $year));
		      $day = date("d", mktime(0,0,0, 12, 31, $year+1));
		      $to = date('Y-m-d', mktime(0,0,0, 12, 31, $year));

			$busquedastotales=App\Busqueda::whereBetween('created_at', array($from, $to))->sum('contador');
      $categoriac=App\Categoria::whereBetween('created_at', array($from, $to))->max('contador');
      $categoria=App\Categoria::whereBetween('created_at', array($from, $to))->where('contador',$categoriac)->first();
      $tienda=App\Tienda::whereBetween('created_at', array($from, $to))->orderBy('clicks','desc')->first();
      if ($tienda) {
        $tienda=$tienda->nombre;
      }
      else{
        $tienda="";
      }
      
      if ($categoriac&&$categoria){
      $categoria=$categoria->nombre;
      }

       else{
        $categoriac="";
        $categoria="";
      }


			$usuarios=App\User::whereBetween('created_at', array($from, $to))->where('is_admin',0)->where('status','Activo')->count();
			$mujeres=App\User::whereBetween('created_at', array($from, $to))->where('is_admin',0)->where('status','Activo')->where('genero','Femenino')->count();
			$hombres=App\User::whereBetween('created_at', array($from, $to))->where('is_admin',0)->where('status','Activo')->where('genero','Masculino')->count();

      $busquedas=App\Busqueda::whereBetween('created_at', array($from, $to))->orderBy('contador','desc')->get();

			
				
		
	    	return view('admin', ['usuarios'=>$usuarios,'mujeres'=>$mujeres,'hombres'=>$hombres,'from'=>$from,'to'=>$to,'categoria'=>$categoria,'categoriac'=>$categoriac,'busquedas'=>$busquedas,'busquedastotales'=>$busquedastotales,'tienda'=>$tienda]);
		});

	Route::post('admin', 'HomeController@admin');

  Route::get('/categorias', function () {
    $categorias=App\Categoria::orderBy('nombre','asc')->get();
      return view('admin.categorias', ['categorias'=>$categorias]);
  });
  Route::post('agregar-categoria', 'CategoriaController@store');
  Route::delete('eliminar-categoria', 'CategoriaController@destroy');

  Route::get('/tendencias', function () {
    $tendencias=App\Tendencia::orderBy('nombre','asc')->get();
      return view('admin.tendencias', ['tendencias'=>$tendencias]);
  });
  Route::post('agregar-tendencia', 'TendenciaController@store');
  Route::delete('eliminar-tendencia', 'TendenciaController@destroy');

  Route::get('/ads', function () {
    $ads=App\Ad::all();
      return view('admin.ads', ['ads'=>$ads]);
  });
  Route::post('actualizar-ad', 'AdController@update');

  Route::post('enviar-mensaje', 'MensajeController@send');

  Route::delete('eliminar-usuario', 'UserController@destroy');

  Route::get('/usuario/{id}', function ($id) {
    $usuario=App\User::find($id);
    if ($usuario) {
      return view('admin.usuario', ['usuario'=>$usuario]);
    }
    else{
      return redirect()->intended(url('/404'));
    }
      
  });

  Route::post('cambiar-contrasena', 'UserController@changepass');
  Route::get('/destacados', function () {
    $destacados=App\Top::orderBy('orden','asc')->get();
    
      return view('admin.destacados', ['destacados'=>$destacados]);
      
  });

  Route::get('/agregar-destacado', function () {
    $tiendas=App\Tienda::all();
    
      return view('admin.top', ['tiendas'=>$tiendas]);
      
  });

  Route::post('agregar-destacado', 'ProductoController@store');
  Route::get('/actualizar-destacado/{id}', function ($id) {
    $tiendas=App\Tienda::all();
    $destacado=App\Top::find($id);
    
      return view('admin.destacado', ['tiendas'=>$tiendas,'destacado'=>$destacado]);
      
  });
  Route::post('actualizar-destacado', 'ProductoController@update');

  Route::post('traerproducto', 'ProductoController@traerproducto');
  Route::get('traerproducto', 'ProductoController@traerproducto');

  Route::get('exportarusuarios', 'UserController@export');
});