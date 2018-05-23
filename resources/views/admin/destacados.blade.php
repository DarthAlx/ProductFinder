@extends('templates.admin')
@section('header')
<link rel="stylesheet" href="{{ url('js/data-tables/DT_bootstrap.css') }}" />
@endsection
@section('pagecontent')
<div class=" main">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<h3 class="">Destacados</h3>
			</div>
			<div class="col-md-6 text-right valign-wrapper" style="justify-content: space-between;">
				<div class="text-center" style="margin-left: auto;">
					<a  href="{{url('/agregar-destacado')}}" class="btn btn-primary right waves-effect waves-light btn-large modal-trigger">Añadir nuevo</a>
				</div>
				
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
					<th class="sorting_desc">Nombre</th>
			      	<th>Tienda</th>
			      	<th>Tipo</th>
			      	<th></th>
			  	</tr>
			  </thead>
			  <tbody>
			  	@if($destacados)
			  		@foreach($destacados as $destacado)

						<tr style="cursor: pointer;">
							<td>{{$destacado->nombre}}</td>
							<td>{{$destacado->tienda->nombre}}</td>
							<td>{{$destacado->tipo}}</td>
							<td align="right" style="text-align: right;">
								<a class="waves-effect waves-light btn  modal-trigger" href="{{url('/actualizar-destacado')}}/{{$destacado->id}}"><i class="fa fa-pencil"></i></a>
								<a class="waves-effect waves-light btn  modal-trigger red" href="#delete{{$destacado->id}}"><i class="fa fa-trash"></i></a>
							</td>
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
					<th class="sorting_desc">Nombre</th>
			      	<th>Tienda</th>
			      	<th>Tipo</th>
			      	<th></th>
			  	</tr>
			  </tfoot>
			  </table>

			  </div>
			</div>
				
		</div>
		
		
		
	</div>
</div>

@if($destacados)
@foreach($destacados as $destacado)
<!-- Modal Structure -->
  <div id="delete{{$destacado->id}}" class="modal">
    <div class="modal-content">
      <h4>Eliminar destacado ({{$destacado->nombre}})</h4>
      <div class="input-field col m8">
      <p>¿Está seguro que desea eliminar este destacado?</p>
  	  </div>
	  <div class="col m4 text-right">

     
		<form action="{{ url('/eliminar-destacado') }}" method="post" enctype="multipart/form-data">
			{{ method_field('DELETE') }}
			{!! csrf_field() !!}
			<input type="hidden" name="eliminar" value="{{$destacado->id}}" style="display: inline-block;">
			 <a href="#!" class="modal-action modal-close waves-effect waves-green btn">Cancelar</a> &nbsp; <input type="submit" class="modal-action modal-close waves-effect waves-green red btn" value="Eliminar" style="display: inline-block;">
		</form>
		<p>&nbsp;</p>
    </div>
    </div>

  </div>

  @endforeach
@endif







@endsection

@section('scripts')
<script type="text/javascript" language="javascript" src="{{ url('js/advanced-datatable/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ url('js/data-tables/DT_bootstrap.js') }}"></script>
<!--dynamic table initialization -->
<script src="{{ url('js/dynamic_table_init.js') }}"></script>

@endsection