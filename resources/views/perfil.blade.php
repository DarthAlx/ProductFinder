@extends('templates.default')

@section('pagecontent')
<section class="perfil">
	<div class="perfilheader z-depth-3" style="background: url('{{url('/img/bg')}}/{{rand(1, 30)}}.jpg'); background-size: cover;">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="profilecard">
						<div class="perfilimg left">
							<img class="circle" src="{{Auth::user()->avatar}}" alt="">
						</div>
						<div class="perfiltext right">
							<h2>
								{{Auth::user()->name}}
							</h2>
							<div class="chip amber accent-3">
								 <i class="fa fa-circle-o-notch" aria-hidden="true"></i> 100 <span class="hiddenmov">rifatokens</span>
							</div>
							<div class="chip light-blue lighten-3">
								<i class="fa fa-flag" aria-hidden="true"></i> 3 <span class="hiddenmov">participaciones</span>
							</div>
							<div class="chip light-green lighten-3">
								<i class="fa fa-trophy" aria-hidden="true"></i> 0 <span class="hiddenmov">ganadas</span>
							</div>
						</div>
						
					</div>
					
				</div>
			</div>
		</div>
		
	</div>
	<p>&nbsp;</p>
	<div class="container">
		<div class="row">
        <div class="col-md-4">
          <div class="card z-depth-3">
            <div class="card-content">
            	<h3 class="card-title">Tus rifas <i class="fa fa-ticket" aria-hidden="true"></i></h3>
            	<p class="flow-text">
            		Aquí puedes encontrar las rifas en las que estás participando actualmente
            	</p>
            </div>

            <ul class="collapsible" data-collapsible="accordion" style="margin-bottom: 0;">
              <li>
                <div class="collapsible-header"><div class="left">Xbox One </div><div class="right"><i class="fa fa-ticket" aria-hidden="true"></i>15</div></div>
                <div class="collapsible-body"><span># 1, 2, 3, 4, 5</span></div>
              </li>
              <li>
                <div class="collapsible-header"><div class="left">Iphone X </div><div class="right"><i class="fa fa-ticket" aria-hidden="true"></i>30</div></div>
                <div class="collapsible-body"><span># 1, 2, 3, 4, 5</span></div>
              </li>
              <li>
                <div class="collapsible-header"><div class="left">Xbox One </div><div class="right"><i class="fa fa-ticket" aria-hidden="true"></i>15</div></div>
                <div class="collapsible-body"><span># 1, 2, 3, 4, 5</span></div>
              </li>
              <li>
                <div class="collapsible-header"><div class="left">Iphone X </div><div class="right"><i class="fa fa-ticket" aria-hidden="true"></i>30</div></div>
                <div class="collapsible-body"><span># 1, 2, 3, 4, 5</span></div>
              </li>
            </ul>            
          </div>
        </div>
        <div class="col-md-8">
        	<div class="card z-depth-3 amber accent-2">
            <div class="card-content">
            	<h3 class="card-title">Rifas ganadas <i class="fa fa-trophy" aria-hidden="true"></i></h3>
            	<p class="flow-text">
            		Aun no has ganado ninguna rifa <i class="fa fa-frown-o" aria-hidden="true"></i>. ¡Sigue participando!
            	</p>
            </div>
          </div>

          <div class="card z-depth-3  blue-grey darken-1">

            <div class="card-content white-text">
            	<h3 class="card-title white-text">Tus mensajes <i class="fa fa-envelope" aria-hidden="true"></i></h3>
            	<p class="flow-text">
            		No tienes ningún mensaje.
            	</p>
            </div>
          </div>
        </div>
      </div>
	</div>

</section>
<p>&nbsp;</p>
<div class="fixed-action-btn horizontal">
    <a class="btn-floating btn-large red pulse" data-toggle="tooltip" data-placement="top" title="Gestión de cuenta">
      <i class="fa fa-user fa2x"></i>
    </a>
    <ul>
      <li><a class="btn-floating blue" data-toggle="tooltip" data-placement="top" title="Direcciones"><i class="fa map-marker"></i></a></li>
      <li><a class="btn-floating red" data-toggle="tooltip" data-placement="top" title="Editar perfil"><i class="fa fa-pencil"></i></a></li>
    </ul>
  </div>
@endsection