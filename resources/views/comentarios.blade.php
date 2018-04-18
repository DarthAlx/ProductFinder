@extends('templates.default')

@section('pagecontent')
<section class="perfil">
<?php $user=App\User::find(Auth::user()->id); 
          if ($user->mensajes) {
            $nuevos=App\Mensaje::where('user_id',$user->id)->where('leido',0)->count();
          }
                        ?>
	<p>&nbsp;</p>
	<div class="container">
		<div class="row">
        <div class="col-md-3">
          <div class="">
            <div class="card-content">
            	<h3 class="card-title">Tu perfil <i class="fa fa-user-o" aria-hidden="true"></i></h3>
            	<div class="collection">
                <a href="{{url('/perfil')}}" class="collection-item">Detalles</a>
                <a href="{{url('/favoritos')}}" class="collection-item">Tus Favoritos</a>
                <a href="{{url('/mensajes')}}" class="collection-item">Mensajes @if($nuevos>0)<span class="new badge" data-badge-caption="">{{$nuevos}}</span>@endif</a>
                <a href="{{url('/comentarios')}}" class="collection-item active">Comentarios</a>
              </div>
            </div>      
          </div>
        </div>
        <div class="col-md-9">
          <div class="row">
              <div class="col-md-12">
                <h5 style="margin: 0; text-align: center;">Evíanos tus Comentarios</h5>
                <hr>
              </div>
            </div>


          <div class="detalles">
            <form method="post" enctype="multipart/form-data" action="{{ url('/contacto') }}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <input name="nombre" class="form-control" placeholder="Nombre" type="hidden" value="{{$user->name or ''}}" required> </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <input name="email" class="form-control" placeholder="Email" type="hidden" value="{{$user->email or ''}}" required> </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <input name="tel" class="form-control" placeholder="Teléfono" type="hidden" value="{{$user->tel or ''}}"> </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <input name="asunto" class="form-control" placeholder="Asunto" type="text" required> </div>
                <div class="clearfix">&nbsp;</div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <textarea class="form-control" name="msg" rows="6" placeholder="Mensaje"></textarea>
                </div>
                <div class="text-center col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <button type="submit" value="SEND" id="catwebformbutton" class="btn btn-lg btn-success">ENVIAR</button>
                </div>

            </form>
                <p>&nbsp;</p> 
          </div>

        	
        </div>
      </div>
	</div>

</section>
<p>&nbsp;</p>

@endsection