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


Route::get('/', function () {
    return view('inicio');
});


Route::get('/perfil', function () {
	dd("Perfil de usuario");
    return view('perfil');
})->middleware('auth');





// Authentication routes...
Route::get('entrar', 'Auth\LoginController@showLoginForm');
Route::post('entrar', 'Auth\LoginController@login');

Route::get('acceso', 'RolesController@index');

Route::get('/salir', function () {
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


Route::get('/admin', function () {
    return view('admin');
})->middleware('admin');
Route::get('/productos', function () {
    return view('admin.productos');
})->middleware('admin');





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

			
			$usuarios=App\User::whereBetween('created_at', array($from, $to))->where('is_admin',0)->where('status','Activo')->count();
			$mujeres=App\User::whereBetween('created_at', array($from, $to))->where('is_admin',0)->where('status','Activo')->where('genero','Femenino')->count();
			$hombres=App\User::whereBetween('created_at', array($from, $to))->where('is_admin',0)->where('status','Activo')->where('genero','Masculino')->count();
			
				
		
	    	return view('admin', ['usuarios'=>$usuarios,'mujeres'=>$mujeres,'hombres'=>$hombres,'from'=>$from,'to'=>$to]);
		});

	Route::post('admin', 'HomeController@admin');

});