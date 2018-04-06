<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>ProductFinder</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.css') }}" media="screen" />
        <link rel="stylesheet" type="text/css" href="{{ url('css/materialize.css') }}" media="screen" />
        <link rel="stylesheet" type="text/css" href="{{ url('css/slick/slick.css') }}" media="screen" />
        <link rel="stylesheet" type="text/css" href="{{ url('css/slick/slick-theme.css') }}" media="screen" />
        <script defer src="https://use.fontawesome.com/3346f99067.js"></script>

        <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}?v={{rand()}}" media="screen" />
        <link rel="stylesheet" type="text/css" href="{{ url('css/main.css') }}?v={{rand()}}" media="screen" />
        <link rel="stylesheet" type="text/css" href="{{ url('css/grid.css') }}?v={{rand()}}" media="screen" />

        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'https://connect.facebook.net/es_MX/sdk.js#xfbml=1&version=v2.12&appId=216581722415854&autoLogAppEvents=1';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        @yield('header')

        <!--[if lt IE 9]>
            <script src="js/vendor/html5-3.6-respond-1.4.2.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
@php

$categorias=App\Categoria::orderBy('nombre','asc')->get();
if(!Auth::guest()){
$carrito=DB::table('shoppingcart')->where('identifier', Auth::user()->id)->first();
        if ($carrito) {
          Cart::restore(Auth::user()->id);
        }
        
}

@endphp
        <header>
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-2 col-xs-6 col-xs-offset-3 col-sm-offset-0 col-sm-3">
                <a href="{{url('/')}}"><img src="{{url('img/product-finder.png')}}" alt="logo" class="img-responsive logomain"></a>
              </div>
              <div class="col-md-10">
                <nav class="navbar navbar-default navbar-static navegacion hidden-xs" style="background: transparent; border: 0; margin-top: 1rem;">
              <div class="navbar-header">
              <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              
            </div>

            <div class="collapse navbar-collapse js-navbar-collapse">
              
              <ul class="nav navbar-nav navbar-right">
                <li><a href="{{url('/')}}">Inicio</a></li>
                <li class="dropdown dropdown-large">
                   <a href="#" class="dropdown-toggle dropdown-button" data-toggle="dropdown">Categorías <b class="caret"></b></a>

                  <?php
                  $arraycat=array();
                  $arrayslug=array();
                  $countcat=$categorias->count();
                  $division=round($countcat/5, 0, PHP_ROUND_HALF_UP);
                  foreach($categorias as $categoria){
                     
                      $arraycat[]=$categoria->nombre;
                      $arrayslug[]=$categoria->slug;
                    
                  }

                   ?>
                  <ul class="dropdown-menu dropdown-menu-large row">
                    @for ($i=0; $i < $division ; $i++)
                    <li class="col-sm-3">
                      <ul>
                        <!--li class="dropdown-header">Glyphicons</li-->
                        @for ($x=$i*5; $x < ($i+1)*5 ; $x++)
                        <li style="width: 100%;"><a href="{{url('/buscar/')}}/{{$arrayslug[$x] or ''}}">{{$arraycat[$x] or ''}}</a></li>
                        @endfor
                      </ul>
                    </li>
                    @endfor
                  </ul>
                  
                </li>
                <li><a href="{{url('/favoritos')}}">Favoritos</a></li>
                    @if (Auth::guest())
                        <li><a href="{{url('/entrar')}}">Entrar</a></li>
                        <li><a href="{{url('/registro')}}">Registrar</a></li>
                      @else
                      <li><a href="{{url('/salir')}}">Salir</a></li>
                      @endif
              </ul>
            


              


              
            </div><!-- /.nav-collapse -->
          </nav>


          <ul id="categorias" class="dropdown-content">
              @for ($i=0; $i < count($arraycat) ; $i++)
                  <li><a href="{{url('/buscar/')}}/{{$arrayslug[$i] or ''}}">{{$arraycat[$i] or ''}}</a></li>
              @endfor
          </ul>

          <nav class="visible-xs">
            <div class="nav-wrapper">
              <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="fa fa-bars" aria-hidden="true" style="line-height: 1.4"></i></a>
              <ul class="side-nav" id="mobile-demo">
                <li><a href="{{url('/')}}">Inicio</a></li>
                <li><a class="dropdown-button" href="#!" data-activates="categorias">Categorías</a></li>
                <li><a href="{{url('/favoritos')}}">Favoritos</a></li>
                @if (Auth::guest())
                  <li><a href="{{url('/entrar')}}">Entrar</a></li>
                  <li><a href="{{url('/registro')}}">Registrar</a></li>
                @else
                  <li><a href="{{url('/salir')}}">Salir</a></li>
                @endif
              </ul>
            </div>
          </nav>



              </div>
            </div>






          </div>
        </header>

        <section class="headermain">
          <div class="titlemain">
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <div class="titleinner">
            <h1>Compara y ahorra con nosotros</h1>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              @include('snip.notificaciones')
            </div>
          </div>
        </section>
        @yield('pagecontent')
       


      <footer class="page-footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col l4 s12 text-center">
                <h5 class="white-text">Product Finder </h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Todas las tiendas</a></li>
                </ul>
              </div>
              <div class="col l4 s12 text-center">
                <h5 class="white-text">Empresa</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Acerca de Product Finder</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Trabaja con nosotros</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Contáctanos</a></li>
                </ul>
              </div>
              <div class="col l4 s12 text-center">
                <h5 class="white-text">Siguenos</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Facebook</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Twitter</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            Los precios se indican en Peso Mexicano e incluyen IVA, pero no los gastos de envío. Puede haber cambios en el precio, la clasificación, las condiciones de entrega y los gastos.
            </div>
          </div>
        </footer>

      @if(!Auth::guest())
      @php 
        $user=App\User::find(Auth::user()->id);
      @endphp
      <div class="fixed-action-btn horizontal">
          <a class="btn-floating btn-large red pulse tooltipped"  data-position="bottom" data-delay="50" data-tooltip="Gestión de cuenta">
            <i class="fa fa-user fa2x"></i>
          </a>
          <ul>
            <li><a class="btn-floating blue tooltipped modal-trigger " href="#detalles" data-position="bottom" data-delay="50" data-tooltip="Detalles"><i class="fa fa-id-card-o" aria-hidden="true"></i></a></li>
            <li><a class="btn-floating green tooltipped modal-trigger " href="#passwordmodal" data-position="bottom" data-delay="50" data-tooltip="Cambiar contraseña"><i class="fa fa-lock"></i></a></li>
            <!--li><a class="btn-floating red tooltipped" data-position="bottom" data-delay="50" data-tooltip="Editar perfil"><i class="fa fa-pencil"></i></a></li-->

          </ul>
        </div><!--gestion-->


        <div id="passwordmodal" class="modal modal-fixed-footer" style="display: none;">
          <div class="modal-content" style="height: 100%;">
            <div class="row">
              <div class="col-md-12">
                <h5>Contraseña</h5>

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
       <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn">Cerrar</a> &nbsp;
          </div>
        </div>

        <div id="detalles" class="modal">
          <div class="modal-content">
            <h5>Detalles</h5>
              <div>
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
                </form> &nbsp; &nbsp;
              </div>
          </div>
          <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn">Cerrar</a> &nbsp; 
          </div>
        </div>
        @endif


      <script type="text/javascript" src="{{ url('js/vendor/bootstrap.min.js') }}"></script>
      <script type="text/javascript" src="{{ url('js/vendor/materialize.js') }}"></script>
      <script type="text/javascript" src="{{ url('css/slick/slick.js') }}"></script>

      <script type="text/javascript" src="{{ url('js/main.js') }}"></script>
      <script>
          $(document).ready(function() {  
            $('.collapsible').collapsible();
            $(".button-collapse").sideNav();
            $('.collapsible').collapsible();
            $('.modal').modal();
            $('.materialboxed').materialbox();
            $('.tooltipped').tooltip({delay: 50});
            $('.select').material_select();
            $('.datepicker').pickadate({
              selectMonths: true, // Creates a dropdown to control month
              selectYears: 100, // Creates a dropdown of 15 years to control year,
              today: 'Hoy',
              clear: 'Limpiar',
              close: 'Ok',
              closeOnSelect: false // Close upon selecting a date,
            });


            $('.timepicker').pickatime({
                    default: 'now', 
                    fromnow: 0,       
                    twelvehour: false, 
                    donetext: 'OK', 
                    cleartext: 'Limpiar', 
                    canceltext: 'Cancelar', 
                    autoclose: false, 
                    ampmclickable: true
                    
                  });

            

            
            
@if (Session::get('toast'))

  var url="{{url('/carrito')}}"
  var $toastContent = $('<span>{{ Session::get('toast') }}</span>').add($('<a href="'+url+'" class="btn-flat toast-action">Ir a carrito</a>'));
  Materialize.toast($toastContent, 10000);

@endif
         


          });
        </script>
@yield('scripts')
    </body>
</html>
