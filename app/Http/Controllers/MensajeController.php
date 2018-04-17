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


        if ($request->tipo=="Multi") {

            $usuarios=$request->mensajeuser;


            foreach ($usuarios as $usuario) {
                $mensaje=new Mensaje($request->all());
                $mensaje->sender_id=Auth::user()->id;
                $mensaje->fecha=date('Y-m-d');
                $destinatario= User::find($usuario);
                $mensaje->user_id=$destinatario->id;

                if ($destinatario) {
                    if ($mensaje->save()) {
                    Session::flash('mensaje', 'Mensaje enviado correctamente.');
                    Session::flash('class', 'success');
                    return redirect()->intended(url()->previous());
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
        }
        else{
            $mensaje=new Mensaje($request->all());
            $mensaje->sender_id=Auth::user()->id;
            $mensaje->fecha=date('Y-m-d');

            $asunto = $request->asunto;
            $msg = $request->msg;
            

            $destinatario= User::where('email', $request->destinatario)->first();

            if ($destinatario) {
                $mensaje->user_id=$destinatario->id;
                $mensaje->save();
                Mail::send('emails.mensaje', ['asunto'=>$asunto,'mensaje'=>$msg,'user'=>$destinatario], function ($m) use ($destinatario,$asunto) {
                    $m->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
                    $m->to($destinatario->email, $destinatario->name)->subject($asunto);
                });
                Session::flash('mensaje', 'Mensaje enviado correctamente.');
                Session::flash('class', 'success');
                return redirect()->intended(url()->previous())->withInput();

            }
            else{
                Session::flash('mensaje', 'No se puede encontrar al destinatario.');
                Session::flash('class', 'danger');
                return redirect()->intended(url()->previous())->withInput();
            }
        }







            
    	

    	
    	
    	

		
    }

    public function read(Request $request)
    {
        $mensaje=Mensaje::find($request->mensaje);
        $mensaje->leido=1;
        $mensaje->save();

    }
}
