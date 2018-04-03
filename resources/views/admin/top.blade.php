@extends('templates.admin')
@section('header')

@endsection
@section('pagecontent')
<div class=" main">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<h3 class="">Destacado</h3>
			</div>
			
		</div>
		<div class="row">
			<div class="col-md-12">
				@include('snip.notificaciones')
			</div>
		</div>
		<p>&nbsp;</p>


		<div class="row">
			<h4>Añadir nuevo</h4>
			<div class="col-md-12 card">

				<form action="{{url('/traerproducto')}}" method="post" style="width: 100%;">
							{!! csrf_field() !!}
							<div class="row">
								<div class="input-field col-md-5">
						          <input id="enlace" name="enlace" type="text" class="validate" value="{{old('enlace')}}" required>
						          <label for="enlace">Dirección de producto</label>
						        </div>
						        <div class="input-field col-md-4">
						          <select id="tienda" name="tienda" class="browser-default select-default" required>
						          	<option value="">Tienda</option>
			                        @foreach($tiendas as $tienda)
										<option value="{{$tienda->id}}">{{$tienda->nombre}}</option>
			                        @endforeach
			                      </select>
						        </div>
						        <div class="col-md-3">
						        	<button class="btn btn-primary waves-effect waves-light" type="submit">Traer datos</button>
						        </div>
							</div>
						</form>


				      <form action="{{url('/agregar-destacado')}}" method="post" style="width: 100%;">
							{!! csrf_field() !!}
							<div class="row">
								<div class="input-field col-md-5">
						          <input id="enlace" name="enlace" type="text" class="validate" value="{{old('enlace')}}" required>
						          <label for="enlace">Dirección de producto</label>
						        </div>
						        <div class="input-field col-md-4">
						          <select id="tienda" name="tienda_id" class="browser-default select-default" required>
						          	<option value="">Tienda</option>
			                        @foreach($tiendas as $tienda)
										<option value="{{$tienda->id}}">{{$tienda->nombre}}</option>
			                        @endforeach
			                      </select>
						        </div>
						        <div class="col-md-3">
						        	<a class="btn btn-primary waves-effect waves-light" onclick="traerproducto();">Traer datos</a>
						        </div>
							</div>
							<div class="row">
								<div class="input-field col-md-12">
						          <input id="url" name="url" type="text" class="validate" value="{{old('url')}}" required>
						          <label for="url">Enlace de tienda</label>
						        </div>
							</div>
							<div class="row">
								<div class="input-field col-md-12">
						          <input id="nombre" name="nombre" type="text" class="validate" value="{{old('nombre')}}" required>
						          <label for="nombre">Nombre</label>
						        </div>
							</div>
							<div class="row">
								<div class="input-field col-md-12">
						          <input id="precio" name="precio" type="text" class="validate" value="{{old('precio')}}" required>
						          <label for="precio">Precio</label>
						        </div>
							</div>
							<div class="row">
								<div class="input-field col-md-12">
						          <input id="imagen" name="imagen" type="text" class="validate" value="{{old('imagen')}}" required>
						          <label for="imagen">Imagen</label>
						        </div>
							</div>
							<div class="row">
								<div class="input-field col-md-12">
						          <textarea id="descripcion" name="descripcion" class="materialize-textarea" required>{{old('descripcion')}}</textarea>
						          <label for="descripcion">Descripción</label>
						        </div>
							</div>
							<div class="row">
								<div class="input-field col-md-12">
						          <input id="orden" name="orden" type="number"  class="validate" value="{{old('orden')}}" required>
						          <label for="orden">Orden</label>
						        </div>
							</div>
							<div class="row">
								<div class="col-md-12 text-right">
						        	<button type="submit" class="btn btn-primary waves-effect waves-light">Guardar</button>
						        </div>
							</div>
						</form>
							
					        <p>&nbsp;</p><p>&nbsp;</p>



			</div>
				
		</div>
		
		
		
	</div>
</div>



@endsection

@section('scripts')
<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
<script>
	function traerproducto(){
		_token = $('#token').val();
		enlace = $('#enlace').val();
		tienda = $('#tienda').val();
	    $.post("{{url('/traerproducto')}}", {
	        enlace : enlace,
	        tienda : tienda,
	        _token : _token
	        }, function(data) {

	        	datos=data.split(",");
	          	nombre=datos[0];
	          	descripcion=datos[1];
	          	imagen=datos[2];
	          	precio=datos[3];
	          	enlace=datos[4];
	          	tienda=datos[5];
	          	url=datos[6];

	          	$('#nombre').val(nombre);
	          	$('#descripcion').val(descripcion);
	          	$('#imagen').val(imagen);
	          	$('#precio').val(precio);
	          	$('#url').val(url);
	          
	        });

	}

</script>

@endsection