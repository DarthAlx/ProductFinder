@extends('templates.admin')

@section('pagecontent')
<div class=" main">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8">
				<div class="card">
				  <div class="card-body">
				    <h5 class="card-title">Añadir nuevo</h5>
				    <div class="card-text">
				    	<form class="col s12">
					      <div class="row">
					        <div class="input-field col col-md-8">
					          <input id="nombre" type="text" class="validate" required>
					          <label for="nombre">Nombre</label>
					        </div>
					        <div class="input-field col col-md-4">
					          <input id="sku" type="text" class="validate" required>
					          <label for="sku">SKU</label>
					        </div>
					      </div>
					      <div class="row">
					        <div class="input-field col s12">
					          <textarea id="textarea1" class="materialize-textarea"></textarea>
					          <label for="textarea1">Descripción</label>
					        </div>
					      </div>
					      <div class="row">
					        <div class="input-field col col-md-6">
					          <input id="precio" type="text" class="validate" required>
					          <label for="precio">Precio normal</label>
					        </div>
					        <div class="input-field col col-md-6">
					          <input id="precio_especial" type="text" class="validate" required>
					          <label for="precio_especial">Precio rebajado</label>
					        </div>
					      </div>
					     
					      <div class="row">
					        <div class="col s6">
					          <p>
							      <input type="checkbox" id="habilitado" checked="checked"/>
							      <label for="habilitado">Habilitado</label>
						      </p>
					        </div>
					      </div>
					      
					    </form>
				    </div>

				  </div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection