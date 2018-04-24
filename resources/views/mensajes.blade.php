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
                <a href="{{url('/perfil')}}" class="collection-item">Detalles</a>
                <a href="{{url('/favoritos')}}" class="collection-item">Tus Favoritos</a>
                <a href="{{url('/mensajes')}}" class="collection-item active">Mensajes y Alertas</a>
                <a href="{{url('/comentarios')}}" class="collection-item">Comentarios y Sugerencias</a>
              </div>
            </div>      
          </div>
        </div>
        <div class="col-md-9">
          <div class="row">
              <div class="col-md-12">
                <h5 style="margin: 0; text-align: center;">Tus Mensajes</h5>
                <hr>
              </div>
            </div>
          <?php $user=App\User::find(Auth::user()->id); ?>

          <div class="mensajes">

            <div class="">
              
              <?php
                       
                       
                        if ($user->mensajes) {
                          $nuevos=App\Mensaje::where('user_id',$user->id)->count();
                          $mensajes=App\Mensaje::where('user_id',$user->id)->orderBy('created_at','desc')->paginate(10);
                        }
                      ?>

                @if($nuevos>0)
              <div class="collection">
                @foreach($mensajes as $mensaje)
                    <a href="#leer{{$mensaje->id}}" onclick="leer('{{$mensaje->id}}')" class="collection-item modal-trigger">{!!str_limit($mensaje->asunto, $limit = 50, $end = '...')!!} <span  class="secondary-content">
                      @if($mensaje->leido)<i id="msj{{$mensaje->id}}" class="fa fa-envelope-open"></i>@else<i id="msj{{$mensaje->id}}" class="fa fa-envelope"></i>@endif</span>

                    </a>
                @endforeach

                {{ $mensajes->links() }}
              </div>
              @else


              <p class="flow-text">
                No tienes ningún mensaje nuevo.
              </p>
              @endif
            </div>
            
                

                <p>&nbsp;</p>
          </div>

        	
        </div>
      </div>
	</div>

</section>
<p>&nbsp;</p>



@if($user->mensajes)
@foreach($user->mensajes as $mensaje)
<!-- Modal Structure -->
  <div id="leer{{$mensaje->id}}" class="modal modal-fixed-footer" style="display: none; z-index: 9999999999999999999999;">
    <div class="modal-content" style="height: 100%;">
      <div class="row">
        <div class="col-md-12">
          <h2 style="text-align: center;">{{$mensaje->asunto}}</h2>
          <small style="text-align: right;">Mensaje enviado el {{$mensaje->fecha}}</small>
          
          @if($mensaje->imagen)
          <img src="{{url('/uploads/mensajes')}}/{{$mensaje->imagen}}" style="max-width: 100%;" alt="">
          @endif
          <p>&nbsp;</p>
      <p>{!!$mensaje->msg!!}</p>
      <div class="text-right">
        
      </div>
      
        </div>
      </div>
       
    </div>
 <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn">Cerrar</a> &nbsp;
    </div>
  </div>
  @endforeach
@endif


  <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
@endsection


@section('scripts')

<script>

  function leer(valor1){

    mensaje = valor1;
    _token = $('#token').val();
    $.post("{{url('/leermensaje')}}", {
        mensaje : mensaje,
        _token : _token
        }, function(data) {
          $("#msj"+valor1).removeClass('fa-envelope');
          $("#msj"+valor1).addClass('fa-envelope-open');
        });

  }
  
</script>

@endsection