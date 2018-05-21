@extends('templates.default')


@section('header')

@endsection
@section('pagecontent')
@php
$items=Cart::content();
@endphp



 <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

    <div id="search" class="bottom-wrapper">
        <form action="{{url('/buscar')}}" id="formbuscar" method="post" enctype="multipart/form-data" style="width: 100%;" >
          {{ csrf_field() }}
          <div class="row">
            <div class="col-md-12 text-center">
              <!--p>Compara y ahorra con nosotros</p-->
              <input type="hidden" name="minimo">
              <input type="hidden" name="maximo">
              <input type="search" name="busqueda" id="buscador" value="" placeholder="Encuentra lo que buscas" class="browser-default" autocomplete="on" autofocus/>
                <button class="btn btn-danger hidden-xs small" type="submit">
                  <span class="fa fa-search"></span>
                </button>
            </div>
          </div>
          <div class="row visible-xs">
            <div class="col-md-12 text-center">
              <button type="submit" class="btn btn-large">Buscar <i class="fa fa-search" aria-hidden="true"></i></button>
            </div>
          </div>
            
            
        </form>
        <script>
          var input = document.getElementById("formbuscar");

            // Execute a function when the user releases a key on the keyboard
          input.addEventListener("submit", function(event) {
            // Cancel the default action, if needed
            event.preventDefault();
            
            document.getElementById("se-pre-con").style.visibility = "visible";
            document.getElementById("formbuscar").submit();
            
          });
        </script>

      </div>



      <div class="row">
            <div class="col-md-12">
              @include('snip.notificaciones')
            </div>
          </div> 
      <p>&nbsp;</p>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="anuncios">
              @foreach($ads as $ad)
                <div>
                  <a href="{{$ad->enlace}}">
                    <img src="{{url('/uploads/ads')}}/{{$ad->imagen}}"  class="img-responsive" style="width: 100%">
                  </a>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
      
      <p>&nbsp;</p>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <h5 style="margin: 0;">También te puede interesar</h5>
            <hr>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="intereses">
              <?php $tendenciacount=0; $esfav=false;?>
              @foreach($tendencias as $producto)

                    <div class="col-md-2 col-sm-4 col-xs-6">
                      <form action="{{url('/producto')}}" method="post" id="tendencia{{$tendenciacount}}" style="display: none;">
                        {{ csrf_field() }}
                        @php
                          $nombre = $producto['nombre'];
                          $enlace = $producto['enlace'];
                          $precio = $producto['precio'];
                          $imagen = $producto['imagen'];
                          $tienda = $producto['tienda'];
                          $url = $producto['enlacetienda']
                        @endphp
                        <input type="hidden" name="nombre" value="{{$nombre}}">
                        <input type="hidden" name="enlace" value="{{$enlace}}">
                        <input type="hidden" name="precio" value="{{$precio}}">
                        <input type="hidden" name="imagen" value="{{$imagen}}">
                        <input type="hidden" name="tienda" value="{{$tienda}}">
                        <input type="hidden" name="url" value="{{$url}}">
                      </form>
                      <div class="product-small">
                        <div class="favorito">
                          @foreach ($items as $product)
                             @if($product->name==$nombre)
                              <?php $esfav=true;
                              $productid=$product->rowId;
                               break; ?>
                             @else
                              <?php $esfav=false; $productid=""; ?>
                             @endif         
                          @endforeach
                          <a class="fav{{$tendenciacount}}0" onclick="addtofavorite('{{$nombre}}','{{$enlace}}','{{$precio}}','{{$imagen}}','{{$tienda}}','{{$url}}', 'fav{{$tendenciacount}}')">
                            <i class="fa fa-heart-o fa-lg" aria-hidden="true"></i>
                          </a>
                         
                          <a class="fav{{$tendenciacount}}1" style="display: none;">
                            <i class="fa fa-heart fa-lg " aria-hidden="true"></i>
                          </a>

                          @if($esfav)
                            <script>
                                $('.fav'+'{{$tendenciacount}}'+"0").hide();
                                $('.fav'+'{{$tendenciacount}}'+"1").show();
                                $(document).ready(function(){
                                  $( ".fav{{$tendenciacount}}1" ).click(function() {
                                    removefromfavorite('{{$productid}}','fav{{$tendenciacount}}');
                                  });
                                });
                            </script>
                          @else
                          <script>
                                $('.fav'+'{{$tendenciacount}}'+"1").hide();
                                $('.fav'+'{{$tendenciacount}}'+"0").show();


                            </script>
                            
                            <div id="fav{{$tendenciacount}}">
                              
                            </div>
                            </script>

                          @endif

                          
                              
                        </div>
                        <a style="cursor: pointer;" onclick="document.getElementById('tendencia{{$tendenciacount}}').submit()">
                          <div class="img-container text-center">
                            
                            <img src="{{$producto['imagen']}}" alt="" style="max-width: 100%; margin: 0 auto;">
                            <div class="ver-producto">
                              <p>Ver producto <i class="fa fa-search" aria-hidden="true"></i></p>
                            </div>
                          </div>
                          <div class="name">
                            <b>{{str_limit($producto['nombre'], $limit = 35, $end = '...')}}</b>
                          </div>
                          <div class="pricefrom">
                            <div class="price">$  {!!number_format($producto['precio']/100, 2, '.', ',')!!}</div>
                          </div>
                          
                        </a>
                        <a href="{{$producto['enlacetienda']}}" target="_blank">
                          <div class="from">
                            <p>{{$producto['tienda']}}</p>
                          </div>
                        </a>
                      </div>
                    </div>
                    
                    <?php $tendenciacount++;?>
              @endforeach
            </div>
    


          </div>
        </div>







        <!--mas buscados-->

        <div class="row">
          <div class="col-md-12">
            <h5 style="margin: 0;">Productos destacados</h5>
            <hr>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="tops">
              <?php $topscount=0; $esfav=false;?>
              @foreach($tops as $producto)

                    <div class="col-md-2 col-sm-4 col-xs-6">
                      <form action="{{url('/producto')}}" method="post" id="tendenciat{{$topscount}}" style="display: none;">
                        {{ csrf_field() }}
                        @php
                          $nombre = $producto['nombre'];
                          $enlace = $producto['enlace'];
                          $precio = $producto['precio'];
                          $imagen = $producto['imagen'];
                          $tienda = $producto['tienda'];
                          $url = $producto['enlacetienda']
                        @endphp
                        <input type="hidden" name="nombre" value="{{$nombre}}">
                        <input type="hidden" name="enlace" value="{{$enlace}}">
                        <input type="hidden" name="precio" value="{{$precio}}">
                        <input type="hidden" name="imagen" value="{{$imagen}}">
                        <input type="hidden" name="tienda" value="{{$tienda}}">
                        <input type="hidden" name="url" value="{{$url}}">
                      </form>
                      <div class="product-small">
                        <div class="favorito">
                          @foreach ($items as $product)
                             @if($product->name==$nombre)
                              <?php $esfav=true;
                              $productid=$product->rowId;
                               break; ?>
                             @else
                              <?php $esfav=false; $productid=""; ?>
                             @endif         
                          @endforeach
                          <a class="favt{{$topscount}}0" onclick="addtofavorite('{{$nombre}}','{{$enlace}}','{{$precio}}','{{$imagen}}','{{$tienda}}','{{$url}}', 'favt{{$topscount}}')">
                            <i class="fa fa-heart-o fa-lg" aria-hidden="true"></i>
                          </a>
                         
                          <a class="favt{{$topscount}}1" style="display: none;">
                            <i class="fa fa-heart fa-lg " aria-hidden="true"></i>
                          </a>

                          @if($esfav)
                            <script>
                                $('.favt'+'{{$topscount}}'+"0").hide();
                                $('.favt'+'{{$topscount}}'+"1").show();
                                $(document).ready(function(){
                                  $( ".favt{{$topscount}}1" ).click(function() {
                                    removefromfavorite('{{$productid}}','favt{{$topscount}}');
                                  });
                                });
                            </script>
                          @else
                          <script>
                                $('.favt'+'{{$topscount}}'+"1").hide();
                                $('.favt'+'{{$topscount}}'+"0").show();


                            </script>
                            
                            <div id="favt{{$topscount}}">
                              
                            </div>
                            </script>

                          @endif

                          
                              
                        </div>
                        <a style="cursor: pointer;" onclick="document.getElementById('tendenciat{{$topscount}}').submit()">
                          <div class="img-container text-center">
                            
                            <img src="{{$producto['imagen']}}" alt="" style="max-width: 100%; margin: 0 auto;">
                            <div class="ver-producto">
                              <p>Ver producto <i class="fa fa-search" aria-hidden="true"></i></p>
                            </div>
                          </div>
                          <div class="name">
                            <b>{{str_limit($producto['nombre'], $limit = 35, $end = '...')}}</b>
                          </div>
                          <div class="pricefrom">
                            <div class="price">$  {!!number_format($producto['precio']/100, 2, '.', ',')!!}</div>
                          </div>
                        </a>
                        <a href="{{$producto['enlacetienda']}}" target="_blank">
                          <div class="from">
                            <p>{{$producto['tienda']}}</p>
                          </div>
                        </a>
                      </div>
                    </div>
                    
                    <?php $topscount++;?>
              @endforeach
            </div>
          </div>
        </div>
      </div> 

      <!--div class="main-stores">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <h5 style="margin: 0;">Las mejores tiendas te esperan</h5>
              <hr>
            </div>
          </div>
          <div class="row">
            <div class="col-md-2">
              <div class="store-small card hoverable">
                <div class="logostore text-center" style="background: url('img/livebg.jpg'); background-size: cover; background-position: center center;">
                  <div class="logo">
                    <img src="img/liverpool.png" class="img-responsive">
                  </div>
                </div>
                <div class="store-name text-center">
                  <h5><b>Liverpool</b></h5>
                </div>
                <div class="store-products">
                  <div class="row">
                    <div class="col-xs-4">
                      <div class="store-product-image">
                        <img src="img/product1.jpg" class="img-responsive" alt="">
                      </div>
                    </div>
                    <div class="col-xs-4">
                      <div class="store-product-image">
                        <img src="img/product2.jpg" class="img-responsive" alt="">
                      </div>
                    </div>
                    <div class="col-xs-4">
                      <div class="store-product-image">
                        <img src="img/product3.jpg" class="img-responsive" alt="">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="store-link text-center">
                  <a href="#">Ver tienda</a>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="store-small card hoverable">
                <div class="logostore text-center" style="background: url('img/livebg.jpg'); background-size: cover; background-position: center center;">
                  <div class="logo">
                    <img src="img/liverpool.png" class="img-responsive">
                  </div>
                </div>
                <div class="store-name text-center">
                  <h5><b>Liverpool</b></h5>
                </div>
                <div class="store-products">
                  <div class="row">
                    <div class="col-xs-4">
                      <div class="store-product-image">
                        <img src="img/product1.jpg" class="img-responsive" alt="">
                      </div>
                    </div>
                    <div class="col-xs-4">
                      <div class="store-product-image">
                        <img src="img/product2.jpg" class="img-responsive" alt="">
                      </div>
                    </div>
                    <div class="col-xs-4">
                      <div class="store-product-image">
                        <img src="img/product3.jpg" class="img-responsive" alt="">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="store-link text-center">
                  <a href="#">Ver tienda</a>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="store-small card hoverable">
                <div class="logostore text-center" style="background: url('img/livebg.jpg'); background-size: cover; background-position: center center;">
                  <div class="logo">
                    <img src="img/liverpool.png" class="img-responsive">
                  </div>
                </div>
                <div class="store-name text-center">
                  <h5><b>Liverpool</b></h5>
                </div>
                <div class="store-products">
                  <div class="row">
                    <div class="col-xs-4">
                      <div class="store-product-image">
                        <img src="img/product1.jpg" class="img-responsive" alt="">
                      </div>
                    </div>
                    <div class="col-xs-4">
                      <div class="store-product-image">
                        <img src="img/product2.jpg" class="img-responsive" alt="">
                      </div>
                    </div>
                    <div class="col-xs-4">
                      <div class="store-product-image">
                        <img src="img/product3.jpg" class="img-responsive" alt="">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="store-link text-center">
                  <a href="#">Ver tienda</a>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="store-small card hoverable">
                <div class="logostore text-center" style="background: url('img/livebg.jpg'); background-size: cover; background-position: center center;">
                  <div class="logo">
                    <img src="img/liverpool.png" class="img-responsive">
                  </div>
                </div>
                <div class="store-name text-center">
                  <h5><b>Liverpool</b></h5>
                </div>
                <div class="store-products">
                  <div class="row">
                    <div class="col-xs-4">
                      <div class="store-product-image">
                        <img src="img/product1.jpg" class="img-responsive" alt="">
                      </div>
                    </div>
                    <div class="col-xs-4">
                      <div class="store-product-image">
                        <img src="img/product2.jpg" class="img-responsive" alt="">
                      </div>
                    </div>
                    <div class="col-xs-4">
                      <div class="store-product-image">
                        <img src="img/product3.jpg" class="img-responsive" alt="">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="store-link text-center">
                  <a href="#">Ver tienda</a>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="store-small card hoverable">
                <div class="logostore text-center" style="background: url('img/livebg.jpg'); background-size: cover; background-position: center center;">
                  <div class="logo">
                    <img src="img/liverpool.png" class="img-responsive">
                  </div>
                </div>
                <div class="store-name text-center">
                  <h5><b>Liverpool</b></h5>
                </div>
                <div class="store-products">
                  <div class="row">
                    <div class="col-xs-4">
                      <div class="store-product-image">
                        <img src="img/product1.jpg" class="img-responsive" alt="">
                      </div>
                    </div>
                    <div class="col-xs-4">
                      <div class="store-product-image">
                        <img src="img/product2.jpg" class="img-responsive" alt="">
                      </div>
                    </div>
                    <div class="col-xs-4">
                      <div class="store-product-image">
                        <img src="img/product3.jpg" class="img-responsive" alt="">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="store-link text-center">
                  <a href="#">Ver tienda</a>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="store-small card hoverable">
                <div class="logostore text-center" style="background: url('img/livebg.jpg'); background-size: cover; background-position: center center;">
                  <div class="logo">
                    <img src="img/liverpool.png" class="img-responsive">
                  </div>
                </div>
                <div class="store-name text-center">
                  <h5><b>Liverpool</b></h5>
                </div>
                <div class="store-products">
                  <div class="row">
                    <div class="col-xs-4">
                      <div class="store-product-image">
                        <img src="img/product1.jpg" class="img-responsive" alt="">
                      </div>
                    </div>
                    <div class="col-xs-4">
                      <div class="store-product-image">
                        <img src="img/product2.jpg" class="img-responsive" alt="">
                      </div>
                    </div>
                    <div class="col-xs-4">
                      <div class="store-product-image">
                        <img src="img/product3.jpg" class="img-responsive" alt="">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="store-link text-center">
                  <a href="#">Ver tienda</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div-->




      <!--div class="container info">
        <div class="row">
          <div class="col-md-3 col-sm-6 info-item">
            <div class="text-center">
              <i class="fa fa-tags fa-3x"></i>
            </div>
            <p class="text-center"><b>Tu comparador de precios</b><br>Product Finder es uno de los comparadores de precios más destacados de México con millones de productos a comparar. El gran número de tiendas y ofertas que consideramos aumenta las posibilidades de que encuentres el precio más barato del producto que buscas.</p>
          </div>
            <div class="col-md-3 col-sm-6 info-item">
            <div class="text-center">
              <i class="fa fa-comment fa-3x"></i>
            </div>
            <p class="text-center"><b>Comparar precios por resultados de análisis</b><br>En Product Finder contamos con cientos de análisis de productos y opiniones de usuarios. Con ello, podrás encontrar no solo el mejor precio, sino también útiles consejos que te ayudarán a decidirte por el mejor producto.</p>
          </div>
          <div class="col-md-3 col-sm-6 info-item">
            <div class="text-center">
              <i class="fa fa-certificate fa-3x"></i>
            </div>
            <p class="text-center"><b>Análisis de productos, ofertas y notificaciones</b><br>Contamos con una amplia gama de trabajadores que se encargan de actualizar la información acerca de los productos y notificar a los usuarios cuando sus productos favoritos alcanzan un menor precio.</p>
          </div>
          <div class="col-md-3 col-sm-6 info-item">
            <div class="text-center">
              <i class="fa fa-trophy fa-3x"></i>
            </div>
            <p class="text-center"><b>Porque lo que cuenta es el precio más barato</b><br>En Product Finder no se compra la primera posición. La posición se determina dependiendo la relevancia a la búsqueda y su precio más bajo. Todas las tiendas tienen la opción de ocupar la primera posición de la lista ofreciendo los precios más bajos respecto del mismo producto. Los precios y ofertas de product finder se actualizan cada segundo para que la disponibilidad y el precio de las ofertas sean correctos.</p>
          </div>
        </div>
            
          
      </div-->


@endsection

@section('scripts')

@if ($busquedas!= '')

<script>
  
 /* $(document).ready(function(){
  $('input.autocomplete').autocomplete({
    data: {!!json_decode($busquedas)!!},
    limit: 5, // The max amount of results that can be shown at once. Default: Infinity.
    onAutocomplete: function(val) {
      $('#autocomplete').val(val);
    },
    minLength: 1, // The minimum length of the input for the autocomplete to start. Default: 1.
  });
  });


$(document).ready(function() {
  $("ul.autocomplete-content.dropdown-content").css({
    'width': ($("#autocomplete").width() + 'px')
  });
});*/

</script>



@endif


<script>
  
  $(document).ready(function(){
    $('.intereses').slick({
  slidesToShow: 6,
  slidesToScroll: 1,
  autoplay: false,
  arrows: true,
  autoplaySpeed: 2000,
   responsive: [
    {
      breakpoint: 768,
      settings: {
        arrows: true,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: true,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 1
      }
    }
  ]
});

    $('.tops').slick({
  slidesToShow: 6,
  slidesToScroll: 1,
  autoplay: false,
  arrows: true,
  autoplaySpeed: 2000,
  centerMode: false,
   responsive: [
    {
      breakpoint: 768,
      settings: {
        arrows: true,
        centerMode: false,
        centerPadding: '40px',
        slidesToShow: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: true,
        centerMode: false,
        centerPadding: '40px',
        slidesToShow: 1
      }
    }
  ]
});


    $('.anuncios').slick({
      arrows: false,
      autoplay: true,
      autoplaySpeed: 4000,
    });
});



function addtofavorite(nombre,enlace,precio,imagen,tienda,url,id){
    _token = $('#token').val();
    $.post("{{url('/addtofavorite')}}", {
        nombre : nombre,
        enlace : enlace,
        precio : precio,
        imagen : imagen,
        tienda : tienda,
        url : url,
        id : id,
        _token : _token
        }, function(data) {
          if (data=="guest") {
            window.location.href = "{{url('/entrar')}}";
          }
          else{
            datos=data.split(',');
            if (datos[0]!="") {
              $('.'+datos[0]+"0").hide();
              $('.'+datos[0]+"1").show();
            }
            if (datos[1]!=""){
              script="<script>$(document).ready(function(){$( '."+datos[0]+"1' ).click(function() {removefromfavorite('"+datos[1]+"','"+datos[0]+"');});});";
              $('#'+datos[0]).html(script);
            }
          }
          
        });
}

function removefromfavorite(rowId,id){
    _token = $('#token').val();
    $.post("{{url('/removefromfavorite')}}", {
        rowId : rowId,
        id : id,
        _token : _token
        }, function(data) {
          if (data!="") {
            $('.'+data+"1").hide();
            $('.'+data+"0").show();
          }
        });
}


    /*$(window).scroll(function()
            {
                if ($(this).scrollTop() > $('header').scrollTop()){
                  $('header').addClass("headerfixed").fadeIn();

        }
                else {
                  $('header').removeClass("headerfixed").fadeIn();


        }
      });*/


</script>






@endsection