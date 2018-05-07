<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ad;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AdController extends Controller
{
    public function update(Request $request){
        $ad = Ad::find($request->id);






		if ($request->hasFile('imagen')) {
          	$file = $request->file('imagen');
          	if ($file->getClientOriginalExtension()=="jpg" || $file->getClientOriginalExtension()=="png") {
	            $name = "ad-".$request->id."." . $file->getClientOriginalExtension();
	            $path = base_path('uploads/ads/');
	            File::delete($path . $ad->imagen);
	            $file-> move($path, $name);
	            $ad->imagen = $name;
            }


	        else{
	            Session::flash('mensaje', 'El archivo no es una imagen valida.');
	            Session::flash('class', 'danger');
	            return redirect()->intended(url('/ads'))->withInput();
	        }

        }

        $ad->enlace=$request->enlace;
        if (isset($request->habilitado)) {
            $ad->habilitado=true;
        }
        else{
            $ad->habilitado=false;
        }
    		$ad->save();
    		Session::flash('mensaje', 'Anuncio publicado con exito.');
            Session::flash('class', 'success');
            return redirect()->intended(url('/ads'))->withInput();
  
    }
}
