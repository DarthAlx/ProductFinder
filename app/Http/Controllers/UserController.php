<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Excel;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $usuario = new Categoria($request->all());
        $usuario->nombre=ucfirst($request->nombre);

        //guardar
        if ($usuario->save()) {
            Session::flash('mensaje', 'Catálogo publicado con exito.');
            Session::flash('class', 'success');
            return redirect()->intended(url('/usuarios'))->withInput();
            
        }
        else{
            Session::flash('mensaje', 'Hubó un error, por favor, verifica la información.');
            Session::flash('class', 'danger');
            return redirect()->intended(url('/usuarios'))->withInput();
        }
    }



    public function destroy(Request $request)
        {
          $usuario = User::find($request->eliminar);
          $usuario->status="Baneado";
          $usuario->save();
          Session::flash('mensaje', 'Usuario Baneado con éxito.');
            Session::flash('class', 'success');
            return redirect()->intended(url('/crm/'));
        }


    public function update(Request $request){
         $usuario = Categoria::find($request->id);
        $usuario->nombre=ucfirst($request->nombre);
//guardar
        if ($usuario->save()) {
            Session::flash('mensaje', 'Catálogo actualizado con exito.');
            Session::flash('class', 'success');
            return redirect()->intended(url('/usuarios/'))->withInput();
        }
        else{
            Session::flash('mensaje', 'Hubo un error, por favor, verifica la información.');
            Session::flash('class', 'danger');
            return redirect()->intended(url('/usuarios/'))->withInput();
        }
    }



    public function changepass(Request $request){
        if ($request->password=="") {
            Session::flash('mensaje', '¡Las contraseñas no pueden estar vacias!');
            Session::flash('class', 'danger');
            return redirect(url()->previous());
        }
      if ($request->password==$request->password_confirmation) {
        $user = User::find($request->usuario_id);
        $user->password=bcrypt($request->password);
        $user->save();
        Session::flash('mensaje', '¡Contraseña actualizada!');
        Session::flash('class', 'success');
        return redirect(url()->previous());
      }
      else {
        Session::flash('mensaje', '¡Las contraseñas deben coincidir!');
        Session::flash('class', 'danger');
        return redirect(url()->previous());
      }


    }
    


    public function changepassuser(Request $request){
        if ($request->password=="") {
            Session::flash('mensaje', '¡Las contraseñas no pueden estar vacias!');
            Session::flash('class', 'danger');
            return redirect(url()->previous());
        }
      if ($request->password==$request->password_confirmation) {
        $user = User::find(Auth::user()->id);
        $user->password=bcrypt($request->password);
        $user->save();
        Session::flash('mensaje', '¡Contraseña actualizada!');
        Session::flash('class', 'success');
        return redirect(url()->previous());
      }
      else {
        Session::flash('mensaje', '¡Las contraseñas deben coincidir!');
        Session::flash('class', 'danger');
        return redirect(url()->previous());
      }


    }

    public function updatedetails(Request $request){
        $usuario = User::find(Auth::user()->id);
        $usuario->name=ucwords($request->name);
        $usuario->email=$request->email;
        $usuario->dob=$request->dob;
        $usuario->tel=$request->tel;
        $usuario->genero=$request->genero;
        //guardar
        if ($usuario->save()) {
            Session::flash('mensaje', 'Detalles actualizados con exito.');
            Session::flash('class', 'success');
            return redirect(url()->previous());
        }
        else{
            Session::flash('mensaje', 'Hubo un error, por favor, verifica la información.');
            Session::flash('class', 'danger');
            return redirect(url()->previous())->withInput();
        }
    }


    public function export(){
        
        Excel::create('UsuariosPF', function($excel){
            $excel->sheet("Datos", function($sheet){
                $usuarios=User::where('is_admin',0)->get();
                $array=array();
                foreach ($usuarios as $usuario) {
                    $busquedas=array();
                    foreach($usuario->busquedas as $busqueda){
                        $busquedas[]=$busqueda->keywords;
                    }
                    $array[]=array(
                        'id'=>$usuario->id,
                        'nombre'=>$usuario->name,
                        'email'=>$usuario->email,
                        'fechadenacimiento'=>$usuario->dob,
                        'tel'=>$usuario->tel,
                        'genero'=>$usuario->genero,
                        'avatar'=>$usuario->avatar,
                        'status'=>$usuario->status,
                        'creado'=>$usuario->created_at,
                        'actualizado'=>$usuario->updated_at,
                        'busquedas'=>implode(", ", $busquedas),
                    );
                }
                $sheet->fromArray($array);
            });
        })->export('xls');

    }


}
