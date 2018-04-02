@extends('templates.admin')
@section('header')
<link rel="stylesheet" href="{{ url('js/data-tables/DT_bootstrap.css') }}" />
@endsection
@section('pagecontent')
<div class=" main">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<h3 class="">Usuarios</h3>
			</div>
			<div class="col-md-6 text-right valign-wrapper" style="justify-content: space-between;">
				<!--div class="text-center" style="margin-left: auto;">
					<a href="{{url('/usuarios/nuevo')}}" class="btn btn-primary right waves-effect waves-light btn-large">Añadir nuevo</a>
				</div-->
				
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				@include('snip.notificaciones')
			</div>
		</div>
		<p>&nbsp;</p>


		<div class="row">
			<div class="col-md-12">
				<div class="adv-table table-responsive">
					
					
			  <table class="display table table-bordered table-striped table-hover" id="dynamic-table">
			  <thead>
			  	<tr>
			      	
			      	<th><i class="fa fa-picture-o"></i></th>
					<th class="sorting_desc">Nombre</th>
			      	<th>Email</th>
			      	<th>Fecha de nacimiento</th>
			      	<th>Teléfono</th>
					<th>Genero</th>
			      	
			      	<th></th>
			  	</tr>
			  </thead>
			  <tbody>
			  	@if($usuarios)
			  		@foreach($usuarios as $usuario)

						<tr>
							
							<td><img src="{{$usuario->avatar}}" alt="" style="max-width: 50px;"></td>
							<td>{{$usuario->name}}</td>
							<td>{{$usuario->email}}</td>
							<td>{{$usuario->dob}}</td>
							<td>{{$usuario->tel}}</td>
							<td>{{$usuario->genero}}</td>
							
							<td>
								<a class="waves-effect waves-light btn" href="#"><i class="fa fa-search-plus"></i></a>
								<a class="waves-effect waves-light btn  modal-trigger " href="#mensaje{{$usuario->id}}"><i class="fa fa-envelope"></i></a>
								<a class="waves-effect waves-light btn red" href="#"><i class="fa fa-times-circle"></i></a>
									
							</td>	
						</tr>
					@endforeach
				@else
					<tr style="cursor: pointer;">
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
			
					</tr>

				@endif
				



			  </tbody>
			  <tfoot>
			  	<tr>
			  		
			      	<th class="sorting"><i class="fa fa-picture-o"></i></th>
					<th class="sorting_desc">Nombre</th>
			      	<th>Email</th>
			      	<th>Fecha de nacimiento</th>
			      	<th>Teléfono</th>
					<th>Genero</th>
			      	<th></th>
			  	</tr>

			  </tfoot>
			  </table>
			  

			  </div>
			</div>
				
		</div>
		
		
		
	</div>
</div>




@if($usuarios->count()>0)
@foreach($usuarios as $usuario)
<!-- Modal Structure -->
  <div id="delete{{$usuario->id}}" class="modal">
    <div class="modal-content">
      <h4>Banear usuario ({{$usuario->name}})</h4>
      <p>¿Está seguro que desea banear este usuario?</p>
    </div>
    <div class="modal-footer">
    	<a href="#!" class="modal-action modal-close waves-effect waves-green btn">Cancelar</a> &nbsp; 
		<form action="{{ url('/eliminar-usuario') }}" method="post" enctype="multipart/form-data">
			{{ method_field('DELETE') }}
			{!! csrf_field() !!}
			<input type="hidden" name="eliminar" value="{{$usuario->id}}">
			<input type="submit" class="modal-action modal-close waves-effect waves-green red btn" value="Eliminar">
		</form>
    	
    </div>
  </div>




  <!-- Modal Structure -->
  <div id="mensaje{{$usuario->id}}" class="modal">
	<form action="{{ url('/enviar-mensaje') }}" method="post" enctype="multipart/form-data">
    <div class="modal-content">
      <h4>Enviar mensaje</h4>
			{!! csrf_field() !!}
			<div class="col s12">
							<div class="row" id="dest">
							        <div class="input-field col s12">
							          <input type="text" name="destinatario" value="{{$usuario->email}}" required>
							          
							          <label for="autocomplete-input">Destinatario</label>
							          <p>{{$usuario->name}} ({{$usuario->email}})</p>
							        </div>
							  </div>
							  <div class="row">
							        <div class="input-field col s12">
							          <input type="text" id="asunto" name="asunto" id="asunto" required>
							          
							          <label for="asunto">Asunto</label>
							        </div>
							  </div>
							  <div class="row">
						        <div class="input-field col s12">
						          <textarea id="msg" name="msg" class="materialize-textarea" required>{{old('msg')}}</textarea>
						          <label for="msg">Mensaje</label>
						        </div>
						      </div>

						      <div class="row">
						      	<div class="text-center col s12" style="margin-left: auto;">
									<button type="submit" class="btn btn-primary right waves-effect waves-light">Enviar <i class="fa fa-paper-plane"></i></button>
								</div>  
								</div>

						       
					      </div>
	        <p>&nbsp;</p><p>&nbsp;</p>
    </div>

    </form>
  </div>




  @endforeach
@endif


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
		$('.table tr th:nth-child(3)').addClass('sorting_asc');
	});
	
</script>
@endsection