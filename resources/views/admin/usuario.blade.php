@extends('templates.admin')
@section('header')
<link rel="stylesheet" href="{{ url('js/data-tables/DT_bootstrap.css') }}" />
@endsection
@section('pagecontent')
<div class=" main">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h3 class=""><img class="circle" src="{{$usuario->avatar}}" alt=""> {{$usuario->name}}</h3>
			</div>
			
		</div>
		<div class="row">
			<div class="col-md-12">
				@include('snip.notificaciones')
			</div>
		</div>
		<p>&nbsp;</p>


				<div class="row">
				    <div class="col s12">
				      <ul id="tabs" class="tabs z-depth-1">
				        <li class="tab col s3"><a href="#detalles" class="taba">Detalles</a></li>
				        <li class="tab col s3"><a href="#busqueda" class="taba">Busquedas</a></li>
				        <!--li class="tab col s3"><a href="#favoritos" class="taba">Favoritos</a></li-->
				      </ul>
				      <div id="detalles" class="">
				      	<div class="card">
				      		<div class="card-content">
				      			<h5>Detalles</h5>

					      	<ul class="collection">
						      <li class="collection-item">Fecha de nacimiento <span class="secondary-content">{{$usuario->dob}}</span></li>
						      <li class="collection-item">Email <span class="secondary-content">{{$usuario->email}}</span></li>
						      <li class="collection-item">Teléfono <span class="secondary-content">{{$usuario->tel}}</span></li>
						      <li class="collection-item">Genero <span class="secondary-content">{{$usuario->genero}}</span></li>
						    </ul>
				      		</div>
				      		
				      	</div>
				      	<div class="card">
				      		<div class="card-content">
				      			<h5>Contraseña</h5>

				      		<form action="{{ url('/cambiar-contrasena') }}" method="post" enctype="multipart/form-data">
				      			{!! csrf_field() !!}
				      			<input type="hidden" name="usuario_id" value="{{$usuario->id}}">
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
				    <div id="busqueda" class="">

				    <div class="card">
				      		<div class="card-content">
				      			<h5>Busquedas</h5>


				      			@if($usuario->busquedas)
								<div class="row">
									<div class="col-md-12">
										<div class="adv-table table-responsive">
									  <table class="display table table-bordered table-striped table-hover" id="dynamic-table">
									  <thead>
									  	<tr>
									  		<th>Palabras clave</th>
											<th>Busquedas</th>
									      	<th>Fecha</th>

									  	</tr>
									  </thead>
									  <tbody>

									  		@foreach($usuario->busquedas as $busqueda)

												<tr style="cursor: pointer;"  >
													<td>{{$busqueda->keywords}}</td>
													<td>{{$busqueda->contador}}</td>
													<td>{{$busqueda->created_at}}</td>
												</tr>
											@endforeach
										
										



									  </tbody>
									  <tfoot>
									  	<tr>
											<th>Palabras clave</th>
											<th>Busquedas</th>
									      	<th>Fecha</th>
									  	</tr>
									  </tfoot>
									  </table>

									  </div>
									</div>
										
								</div>

								@endif




				      		</div>
				      		
				      	</div></div>
				    <!--div id="favoritos" class="">
						<div class="card">
				      		<div class="card-content">
				      			<h5>Operaciones</h5>


				      			@if($usuario->operaciones)
								<div class="row">
									<div class="col-md-12">
										<div class="adv-table table-responsive">
									  <table class="display table table-bordered table-striped table-hover" id="dynamic-table2">
									  <thead>
									  	<tr>
											<th class="sorting_desc">Tipo</th>
									      	<th>RifaTokens</th>
											<th>Pesos</th>
									      	<th>Fecha</th>

									  	</tr>
									  </thead>
									  <tbody>
									  	@if($usuario->operaciones)
									  		@foreach($usuario->operaciones as $operacion)

												<tr style="cursor: pointer;" class="modal-trigger " href="#operacion{{$operacion->id}}">
													<td>{{$operacion->tipo}}</td>
													<td>{{$operacion->rt}}</td>
													<td>{{$operacion->pesos}}</td>
													<td>{{$operacion->fecha}}</td>
												</tr>
											@endforeach
										@else
											<tr style="cursor: pointer;">
												<td></td>
												<td></td>
												<td></td>
												<td></td>						
											</tr>

										@endif
										



									  </tbody>
									  <tfoot>
									  	<tr>
									      	<th class="sorting_desc">Tipo</th>
									      	<th>RifaTokens</th>
											<th>Pesos</th>
									      	<th>Fecha</th>
									  	</tr>
									  </tfoot>
									  </table>

									  </div>
									</div>
										
								</div>

								@endif

					      	
				      		</div>
				      		
				      	</div>
				    </div-->
				    </div>
				    
				  </div>


				  <div class="row">
				    <div class="col s12">
				    	
					</div>
				    
				  </div>
				
			
		
		
		
	</div>
</div>







@endsection

@section('scripts')
<script type="text/javascript" language="javascript" src="{{ url('js/advanced-datatable/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ url('js/data-tables/DT_bootstrap.js') }}"></script>
<!--dynamic table initialization -->
<script src="{{ url('js/dynamic_table_init.js') }}"></script>
<script>
	$(document).ready(function() {
		$('.table tr th:first-child').removeClass('sorting_desc');
		$('.table tr th:first-child').addClass('sorting');
		$('.table tr th:nth-child(2)').addClass('sorting_desc');


		$('ul.tabs').tabs();
		$('.taba').click(function(){
			$('.taba').removeClass("active");
			$(this).addClass("active");
		});
	});
</script>
@endsection