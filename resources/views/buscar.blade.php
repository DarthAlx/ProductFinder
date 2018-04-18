@extends('templates.default')


@section('header')
@endsection
@section('pagecontent')
@php
$items=Cart::content();
@endphp

     <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
      
      <p>&nbsp;</p>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 text-center">
            <h5 style="margin: 0;">Resultados de Búsqueda</h5>
            <hr>
          </div>
        </div>


      <div class="row">
          <!--div class="col-md-4 col-sm-4">
            <nav class="navbar navbar-default navbar-static hidden-xs" style="background: transparent; border: 0; margin-top: 1rem;">
              <div class="navbar-header">
              <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              
            </div>

            <div class="collapse navbar-collapse js-navbar-collapse">
              
              <ul class="nav navbar-nav" style="width:100%">
                <li class="dropdown dropdown-large" style="width:100%">
                   <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: #777777;"><i class="fa fa-bars prefix"></i> Categorías <b class="caret"></b></a>

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
                  
                </li>
              </ul>
            


              


              
            </div>




          </nav>

          <ul class="collapsible visible-xs">
            <li>
              <div class="collapsible-header"><i class="fa fa-bars prefix"></i> Categorías <b class="caret"></b></div>
              <div class="collapsible-body">
                <div class="collection">
                  @for ($i=0; $i < count($arraycat) ; $i++)
                  <a href="{{url('/buscar/')}}/{{$arrayslug[$i] or ''}}" class="collection-item">{{$arraycat[$i] or ''}}</a>
                  @endfor

                </div>
              </div>
            </li>
          </ul>

          


        </div-->

        <div class="col-md-4 col-sm-4" style="padding-top: 31px">
            <form action="{{url()->current()}}" method="post" id="precioformmini">
                          {!! csrf_field() !!}


                        <div class="input-group-append browser-default">
                          <div class="row">
                            <div class="col-xs-4" style="padding-right: 0">
                              <input type="text" class="form-control browser-default" name="minimo" placeholder="Minimo" aria-describedby="basic-addon2">
                            </div>
                            <div class="col-xs-1 text-center valign-wrapper" style="max-width: inherit; height: 33px">
                              <span class="guion"><i class="fa fa-minus" aria-hidden="true"></i></span>
                            </div>
                            <div class="col-xs-4" style="padding-left: 0">
                              <input type="text" class="form-control browser-default" name="maximo" placeholder="Maximo" aria-describedby="basic-addon2">
                            </div>
                            <div class="col-xs-1 valign-wrapper" style="height: 33px">
                              <a href="#" id="searchpricemini"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
                              
                            </div>
                          </div>
                          
                        </div>

                        </form>
                      </div>

        <div class="col-md-4 col-sm-4">
                <form action="{{url('/buscar')}}" method="post" style="width: 100%;">
                  {{ csrf_field() }}

                  <div class="input-field valign-wrapper">
                    <i class="fa fa-search prefix"></i>
                    <input id="buscador" name="busqueda" type="text" value="{{$busqueda}}" placeholder="Busca otro producto" class="validate" style="    border-bottom: 1px solid #9e9e9e;">
                  </div>
                  </form>
                </div>

                <div class="col-md-4 col-sm-4">
                  <form id="ordenformmini" action="{{url('/buscar')}}" method="post" style="width: 100%;">
                    {{ csrf_field() }}
                    <input name="busqueda" type="hidden" value="{{$busqueda}}">
                  <div class="input-field valign-wrapper selectorden">
                      <select id="ordenmini" name="sort" class="select" required>
                        <option value="Popularidad">Popularidad</option>
                        <option value="A - Z">A - Z</option>
                        <option value="Menor precio">Menor precio</option>
                        <option value="Mayor precio">Mayor precio</option>
                      </select>
                  </div>
                  </form>
                  <script>
                    document.getElementById('ordenmini').value="{!!$sorting!!}";
                    $('#ordenmini').change(function(){
                      $('#ordenformmini').submit();

                    });
                  </script>

                </div>
      </div>


        <div class="row">

          <div class="col-md-12">

                  <div class="row-fluid">

                    <?php $productocount=0; $esfav=false;?>
              @foreach($productos as $producto)

                    <div class="col-md-2 col-sm-4 col-xs-6">
                      <form action="{{url('/producto')}}" method="post" id="tendencia{{$productocount}}" style="display: none;">
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
                          <a class="fav{{$productocount}}0" onclick="addtofavorite('{{$nombre}}','{{$enlace}}','{{$precio}}','{{$imagen}}','{{$tienda}}','{{$url}}', 'fav{{$productocount}}')">
                            <i class="fa fa-heart-o fa-lg" aria-hidden="true"></i>
                          </a>
                         
                          <a class="fav{{$productocount}}1" style="display: none;">
                            <i class="fa fa-heart fa-lg " aria-hidden="true"></i>
                          </a>

                          @if($esfav)
                            <script>
                                $('.fav'+'{{$productocount}}'+"0").hide();
                                $('.fav'+'{{$productocount}}'+"1").show();
                                $(document).ready(function(){
                                  $( ".fav{{$productocount}}1" ).click(function() {
                                    removefromfavorite('{{$productid}}','fav{{$productocount}}');
                                  });
                                });
                            </script>
                          @else
                          <script>
                                $('.fav'+'{{$productocount}}'+"1").hide();
                                $('.fav'+'{{$productocount}}'+"0").show();


                            </script>
                            
                            <div id="fav{{$productocount}}">
                              
                            </div>
                            </script>

                          @endif

                          
                              
                        </div>
                        <a style="cursor: pointer;" onclick="document.getElementById('tendencia{{$productocount}}').submit()">
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
                    
                    <?php $productocount++;?>
              @endforeach
                  </div><!--/row-fluid-->
          </div>
        </div>







       

      




      


@endsection




@section('scripts')
<script>
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
</script>




@endsection