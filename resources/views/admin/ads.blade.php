@extends('templates.admin')
@section('header')
<link rel="stylesheet" href="{{ url('js/data-tables/DT_bootstrap.css') }}" />
@endsection
@section('pagecontent')
<div class=" main">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<h3 class="">Ads</h3>
			</div>
			<!--div class="col-md-6 text-right valign-wrapper" style="justify-content: space-between;">
				<div class="text-center" style="margin-left: auto;">
					<a  href="#nuevo" class="btn btn-primary right waves-effect waves-light btn-large modal-trigger">Añadir nuevo</a>
				</div>
				
			</div-->
		</div>
		<div class="row">
			<div class="col-md-12">
				@include('snip.notificaciones')
			</div>
		</div>
		<p>&nbsp;</p>


		<div class="row">
			<div class="col-md-12">
				<ul class="collapsible  popout" data-collapsible="accordion">
			  	@if($ads)
			  		@foreach($ads as $ad)
					  		<li>
						      <div class="collapsible-header">
						      	<i class="fa fa-picture-o" aria-hidden="true"></i> &nbsp; {{$ad->imagen}}
						      </div>
						      <div class="collapsible-body">
						      	<div>
					              <img src="{{url('/uploads/ads')}}/{{$ad->imagen}}" style="width: 100%;" alt="">
					            </div>
								<div class="text-right">
									<p>&nbsp;</p>
									<a class="waves-effect waves-light btn  modal-trigger " href="#update{{$ad->id}}"><i class="fa fa-pencil"></i></a>
								</div>

						      </div>
						    </li>
					@endforeach
				@else
					<tr style="cursor: pointer;">
						<td></td>
						<td></td>					
					</tr>

				@endif
				</ul>
			

			  </div>
			</div>
				
		</div>
		
		
		
	</div>
</div>




@if($ads)
@foreach($ads as $ad)
  <!-- Modal Structure -->
  <div id="update{{$ad->id}}" class="modal">
  	<form action="{{ url('/actualizar-ad') }}" method="post" enctype="multipart/form-data">
    <div class="modal-content">
      <h4>Editar anuncio ({{$ad->id}})</h4>
			{!! csrf_field() !!}
			

			<div class="row tipoimagen tipoall">
				<div class="file-field input-field">
			      <div class="btn">
			        <span>Subir imágen</span>
			        <input type="file" name="imagen">
			      </div>
			      <div class="file-path-wrapper">
			        <input class="file-path validate" type="text">
			      </div>
			    </div>
			</div>
			<div class="input-field">
	          <input id="enlace" name="enlace" type="text" class="validate" value="@if($ad->enlace=='')#@else{{$ad->enlace}}@endif" required>
	          <label for="enlace">Enlace</label>
	        </div>

	        <div class="switch">
			    <label>
			      
			      <input type="checkbox" id="habilitado{{$ad->id}}" name="habilitado" >
			      <span class="lever"></span>
			      Habilitado
			    </label>
			  </div>

			@if($ad->habilitado==1)
				<script>
					document.getElementById("habilitado{{$ad->id}}").checked = true;
				</script>
			@else
				<script>
					document.getElementById("habilitado{{$ad->id}}").checked = false;
				</script>
		    @endif

			<input type="hidden" name="id" value="{{$ad->id}}">
	        <div class="col m12">
	        	<input type="submit" value="Guardar" class="btn btn-primary right waves-effect waves-light">
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

@endsection