<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mensaje;
use App\User;
use Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MensajeController extends Controller
{
    public function send(Request $request)
    {
    		$asunto = $request->asunto;
    		$mensaje = $request->msg;

    		$destinatario= User::where('email', $request->destinatario)->first();

    		if ($destinatario) {
    			Mail::send('emails.mensaje', ['asunto'=>$asunto,'mensaje'=>$mensaje,'user'=>$destinatario], function ($m) use ($destinatario,$asunto) {
                    $m->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
                    $m->to($destinatario->email, $destinatario->name)->subject($asunto);
                });


	    		if ($mensaje->save()) {
	    		Session::flash('mensaje', 'Mensaje enviado correctamente.');
		        Session::flash('class', 'success');
		        return redirect()->intended(url()->previous())->withInput();
		    	}
		    	else
		    	{
		    		Session::flash('mensaje', 'No se pudo enviar el mensaje, intentalo nuevamente.');
			        Session::flash('class', 'danger');
			        return redirect()->intended(url()->previous())->withInput();
		    	}
	    	}
	    	else{
	    		Session::flash('mensaje', 'No se puede encontrar al destinatario.');
		        Session::flash('class', 'danger');
		        return redirect()->intended(url()->previous())->withInput();
	    	}
    	

    	
    	
    	

		
    }

    public function read(Request $request)
    {
		$mensaje=Mensaje::find($request->mensaje);
		$mensaje->leido=1;
		$mensaje->save();

    }
}
