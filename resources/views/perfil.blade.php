@extends('templates.default')

@section('pagecontent')
<section class="perfil">

	<p>&nbsp;</p>
	<div class="container">
		<div class="row">
        <div class="col-md-3">
          <div class="">
            <div class="card-content">
            	<h3 class="card-title">Tu perfil <i class="fa fa-user-o" aria-hidden="true"></i></h3>
            	<div class="collection">
                <a href="{{url('/perfil')}}" class="collection-item active">Detalles</a>
                <a href="{{url('/favoritos')}}" class="collection-item">Tus Favoritos</a>
                <a href="{{url('/notificaciones')}}" class="collection-item">Notificaciones</a>
                <a href="{{url('/Comentarios')}}" class="collection-item">Comentarios</a>
              </div>
            </div>      
          </div>
        </div>
        <div class="col-md-9">
          <div class="profilecard">
            <div class="perfilimg left">
              <img class="circle" src="{{Auth::user()->avatar}}" alt="">
            </div>
            <div class="perfiltext right">
              <h2>
                {{Auth::user()->name}}
              </h2>
            </div>
            
          </div>
          <?php $user=App\User::find(Auth::user()->id); ?>
          <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
          <div class="detalles">
            <form action="{{url('/actualizar-datos')}}" method="post" enctype="multipart/form-data">
                  {!! csrf_field() !!}

                  <div class="input-field">
                            <input type="text" name="name" id="nombre" class="form-control" value="{{$user->name or old('name')}}" required>
                            <label for="nombre"><i class="fa fa-user-o grey-text fa-lg"></i> Nombre completo</label>
                        </div>
                        <div class="input-field">
                            
                            <input type="email" name="email" id="email" class="form-control" value="{{$user->email or old('email')}}" required>
                            <label for="email"><i class="fa fa-envelope-o grey-text fa-lg"></i> Email</label>
                        </div>
                        <div class="input-field">
                            
                            <input type="text" name="dob" id="dob" class="form-control datepicker" value="{{$user->dob or old('dob')}}">
                            <label for="dob"><i class="fa fa-calendar grey-text fa-lg"></i> Fecha de nacimiento (opcional)</label>
                        </div>
                        <div class="input-field">
                            
                            <input type="text" name="tel" id="tel" class="form-control" value="{{$user->tel or old('tel')}}">
                            <label for="tel"><i class="fa fa-phone grey-text fa-lg"></i> Teléfono (opcional)</label>
                        </div>
                        <label for="defaultForm-email"><i class="fa fa-venus-mars grey-text fa-lg"></i> Genero</label>
                        <div class="">
                            
                        <p><input name="genero" id="masculino" type="radio" value="Masculino"  required/><label for="masculino">Masculino</label>  &nbsp;   &nbsp;   &nbsp; 
                            <input name="genero" id="femenino" type="radio" value="Femenino"  required/><label for="femenino">Femenino</label></p>
                           
                            
                        </div>
                        <script>
                          $("input[name=genero][value=" + "{{$user->genero or old('genero')}}" + "]").attr('checked', 'checked');
                        </script>

                        <div class="row">
                          <div class="col s12">
                            <input type="submit" value="Guardar" class="btn btn-primary right waves-effect waves-light">
                          </div>
                        </div>
                </form>
                @if($user->socialProvider->first)
                  <a href="{{url('auth/facebook')}}" class="btn btn-lg omb_btn-facebook">
                      <i class="fa fa-facebook"></i>
                      <span class="hidden-xs"> Cuenta vinculada con facebook</span>
                  </a>
                @else
                  <a href="{{url('auth/facebook')}}" class="btn btn-lg omb_btn-facebook">
                      <i class="fa fa-facebook"></i>
                      <span class="hidden-xs"> Cuenta no vinculada con facebook</span>
                  </a>
                @endif

                <p>&nbsp;</p>

                <form action="{{ url('/cambiar-contrasena-user') }}" method="post" enctype="multipart/form-data">
                  {!! csrf_field() !!}
                  <div class="row">
                    <div class="input-field col s6">
                      <input id="password" type="password" name="password" class="validate" required>
                      <label for="password">Nueva contraseña</label>
                    </div>
                    <div class="input-field col s6">
                      <input id="password_confirmation" name="password_confirmation" type="password" class="validate" required>
                      <label for="password_confirmation">Confirmar nueva contraseña</label>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col s12">
                      <input type="submit" value="Cambiar" class="btn btn-primary right waves-effect waves-light">
                    </div>
                  </div>
              </form>
          </div>

        	
        </div>
      </div>
	</div>

</section>
<p>&nbsp;</p>

@endsection