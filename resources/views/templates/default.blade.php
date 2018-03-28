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
        @yield('header')

        <!--[if lt IE 9]>
            <script src="js/vendor/html5-3.6-respond-1.4.2.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <header>
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-2">
                <a href="{{url('/')}}"><img src="{{url('img/product-finder.png')}}" alt="logo" class="img-responsive"></a>
              </div>
              <div class="col-md-10">
                <ul id="dropdown1" class="dropdown-content">
                  <li><a href="{{url('/perfil')}}">Perfil</a></li>
                  
                  <li><a href="{{url('/salir')}}">Salir</a></li>
                </ul>
                <nav>
                  <div class="nav-wrapper">
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                      <li><a href="#">Tiendas</a></li>
                      @if (Auth::guest())
                        <li><a href="{{url('/entrar')}}">Entrar</a></li>
                        <li><a href="{{url('/registro')}}">Registrar</a></li>
                      @else
                      <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Mi cuenta</a></li>
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
        </section>
        @yield('pagecontent')
       


      <footer class="page-footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col l4 s12">
                <h5 class="white-text">Product Finder </h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Todas las tiendas</a></li>
                </ul>
              </div>
              <div class="col l4 s12">
                <h5 class="white-text">Empresa</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Acerca de Product Finder</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Empleos</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Contáctanos</a></li>
                </ul>
              </div>
              <div class="col l4 s12">
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
