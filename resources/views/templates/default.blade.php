<!DOCTYPE html>
 <html> 
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Jab Price</title>
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


    </head>
    <body>

      <div class="se-pre-con" id="se-pre-con" style="visibility: hidden;">
        <div class="spinner">
            <img src="{{url('img/spinner.gif')}}?v=1" class="gif1">
            <p class="text-center loadingt1">Cargando...</p>
        </div>
      </div>

@php

$categorias=App\Categoria::orderBy('nombre','asc')->get();
if(!Auth::guest()){
$carrito=DB::table('shoppingcart')->where('identifier', Auth::user()->id)->first();
        if ($carrito) {
          Cart::restore(Auth::user()->id);
        }
        
}

@endphp
        <header class="headerfixed">
          <div class="container-fluid">
            <div class="row valign-wrapper">
              <div class="col-md-2 col-xs-9 col-sm-offset-0 col-sm-3">
                <a href="{{url('/')}}"><img src="{{url('img/product-finder.png')}}" alt="logo" class="img-responsive logomain"></a>
              </div>
              <div class="col-md-10 col-xs-2">
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
                <!--li class="dropdown dropdown-large">
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
                        
                        @for ($x=$i*5; $x < ($i+1)*5 ; $x++)
                        <li style="width: 100%;"><a href="{{url('/buscar/')}}/{{$arrayslug[$x] or ''}}">{{$arraycat[$x] or ''}}</a></li>
                        @endfor
                      </ul>
                    </li>
                    @endfor
                  </ul>
                  
                </li-->
                <li><a href="{{url('/favoritos')}}">Favoritos</a></li>
                    @if (Auth::guest())

                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle dropdown-button" data-toggle="dropdown">Mi cuenta <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                      <li style="width: 100%;"><a href="{{url('/entrar')}}">Entrar</a></li>
                      <li style="width: 100%;"><a href="{{url('/registro')}}">Registrar</a></li>
                    </ul>
                    </li>
                        
                      @else
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle dropdown-button" data-toggle="dropdown">Mi cuenta <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li style="width: 100%;"><a href="{{url('/perfil')}}">Perfil</a></li>
                          <li style="width: 100%;"><a href="{{url('/salir')}}">Salir</a></li>
                        </ul>
                      </li>
                      
                      @endif
              </ul>
            


              


              
            </div><!-- /.nav-collapse -->
          </nav>


          <!--ul id="categorias" class="dropdown-content">
              @for ($i=0; $i < count($arraycat) ; $i++)
                  <li><a href="{{url('/buscar/')}}/{{$arrayslug[$i] or ''}}">{{$arraycat[$i] or ''}}</a></li>
              @endfor
          </ul-->
          <ul id="cuenta" class="dropdown-content">
              <li><a href="{{url('/entrar')}}">Entrar</a></li>
              <li><a href="{{url('/registro')}}">Registrar</a></li>
          </ul>

          <ul id="perfil" class="dropdown-content">
              <li><a href="{{url('/perfil')}}">Perfil</a></li>
              <li><a href="{{url('/salir')}}">Salir</a></li>
          </ul>

          <nav class="visible-xs">
            <div class="nav-wrapper">
              <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="fa fa-bars" aria-hidden="true" style="line-height: 1.4"></i></a>
              <ul class="side-nav" id="mobile-demo">
                <li><a href="{{url('/')}}">Inicio</a></li>
                <!--li><a class="dropdown-button" href="#!" data-activates="categorias">Categorías</a></li-->
                <li><a href="{{url('/favoritos')}}">Favoritos</a></li>
                @if (Auth::guest())
                  <li><a class="dropdown-button" href="#!" data-activates="cuenta">Mi cuenta</a></li>
                @else
                  <li><a class="dropdown-button" href="#!" data-activates="perfil">Mi cuenta</a></li>
                  
                @endif
              </ul>
            </div>
          </nav>



              </div>
            </div>






          </div>
        </header>

        <!--section class="headermain">
          <div class="titlemain">
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <div class="titleinner">
            <h1>Compara y ahorra con nosotros</h1>
            </div>
          </div>
          <div class="row" style="margin:0; padding: 0">
            <div class="col-md-12">
              @include('snip.notificaciones')
            </div>
          </div>
        </section-->

        <div class="container">
          <div class="row" style="margin:0; padding: 0">
            <div class="col-md-12">
              @include('snip.notificaciones')
            </div>
          </div>
        </div>
        <div class="maincontentwrapper">
          @yield('pagecontent')
        </div>
        
       


      <footer class="page-footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col l4 s12 text-center">
                
                <ul>
                  <li><a class="grey-text text-lighten-3" href="{{url('/tiendas')}}">Todas las tiendas</a></li>
                  <li><a class="grey-text text-lighten-3" href="{{url('/contacto')}}">Contacto</a></li>
                  <li><a class="grey-text text-lighten-3" href="{{url('/registra-tu-marca')}}">Registra Tu Marca</a></li>
                </ul>
              </div>
              <div class="col l4 s12 text-center">
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">SIGUE CONECTADO</a></li>
                  <li><a href="#"><i class="fa fa-facebook fa-lg" aria-hidden="true"></i></a> &nbsp; &nbsp; <a href="#"><i class="fa fa-twitter fa-lg" aria-hidden="true"></i></a> &nbsp; &nbsp; <a href="#"><i class="fa fa-pinterest-p fa-lg" aria-hidden="true"></i></a> &nbsp; &nbsp; <a href="#"><i class="fa fa-instagram fa-lg" aria-hidden="true"></i></a></li>
                  
                  
                </ul>
              </div>
              <div class="col l4 s12 text-center">
                <ul>
                  <li><a class="grey-text text-lighten-3" href="{{url('/acercade')}}">EMPRESA</a></li>
                  <li><a class="grey-text text-lighten-3" href="{{url('/acercade')}}">Acerca de Jab Price</a></li>
                  <li><a class="grey-text text-lighten-3" href="{{url('/bolsa-de-trabajo')}}">Trabaja con nosotros</a></li>

                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container text-center">
            <a href="{{url('/legales')}}">TERMINOS, CONDICIONES Y AVISOS DE PRIVACIDAD</a>
            </div>
          </div>
        </footer>

      



      <script type="text/javascript" src="{{ url('js/vendor/bootstrap.min.js') }}"></script>
      <script type="text/javascript" src="{{ url('js/vendor/materialize.js') }}"></script>
      <script type="text/javascript" src="{{ url('js/jquery.elevatezoom.js') }}"></script>
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



          /*$('.product-small a').click(function(){
            document.getElementById("se-pre-con").style.visibility = "visible";
          });*/


          


      
        </script>





@yield('scripts')



@if(Auth::guest())
          <?php $popup = Cookie::get('popup'); ?>
          @if(!$popup)

            <!--div id="popup" class="modal popup">
              <div class="modal-content">
                <a href="{{url('/registro')}}">
                  <img src="{{url('/img/popup.png')}}" class="img-responsive" alt="">
                </a>
              </div>
            </div>
            <script type='text/javascript'>
              $('#popup').modal();
              $( document ).ready(function() {
                $('#popup').modal('open');
              });
            </script-->
            <?php 
              //$cookie = Cookie::queue(Cookie::make('popup', 'visto', 5));
            ?>
          @endif
        @endif
    </body>
</html>
