@extends('templates.default')


@section('header')
<meta http-equiv="Cache-control" content="no-cache">
<meta http-equiv="Expires" content="-1">
@endsection
@section('pagecontent')
@php
$items=Cart::content();
@endphp

     <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
      
      <p>&nbsp;</p><p>&nbsp;</p>
<section class="perfil">
  <?php $user=App\User::find(Auth::user()->id); 
          if ($user->mensajes) {
            $nuevos=App\Mensaje::where('user_id',$user->id)->where('leido',0)->count();
          }
                        ?>

  <div class="container">
    <div class="row">
        <div class="col-md-3">
          <div class="">
            <div class="card-content">
              <h3 class="card-title">Tu perfil <i class="fa fa-user-o" aria-hidden="true"></i></h3>
              <div class="collection">
                <a href="{{url('/perfil')}}" class="collection-item">Detalles</a>
                <a href="{{url('/favoritos')}}" class="collection-item active">Tus Favoritos</a>
                <a href="{{url('/mensajes')}}" class="collection-item">Mensajes y Alertas @if($nuevos>0)<span class="new badge" data-badge-caption="">{{$nuevos}}</span>@endif</a>
                <a href="{{url('/comentarios')}}" class="collection-item">Comentarios y Sugerencias</a>
              </div>
            </div>      
          </div>
        </div>
        <div class="col-md-9">
          
          
          
          

          <div class="favoritos">
            <div class="row">
              <div class="col-md-12">
                <h5 style="margin: 0; text-align: center;">Tus Favoritos</h5>
                <hr>
              </div>
            </div>
            <div class="row-fluid">

                    <?php $productocount=0; $esfav=false;?>
              @if($productos)
              @foreach($productos as $producto)

                    <div class="col-md-3 col-sm-4 col-xs-6" >
                      <form action="{{url('/producto')}}" method="post" id="productofav{{$productocount}}" enctype="multipart/form-data" style="display: none;">
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
                        <input type="submit" id="tendenciabutton{{$productocount}}" style="display: none;">
                      </form>
                      <script type="text/javascript">
                      /*$(document).ready(function() {
                        $("#productofav{{$productocount}}").submit(function(event){
                             event.preventDefault();  
                             document.getElementById('se-pre-con').style.visibility = 'visible';      

                             setTimeout(function () {
                                 document.getElementById('productofav{{$productocount}}').submit();  
                              }, 1000);      
                             
                        });
                      });*/
                      </script>
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
                        <a style="cursor: pointer;" onclick="document.getElementById('tendenciabutton{{$productocount}}').click();">
                          <div class="img-container text-center">
                            
                            <img src="{{$producto['imagen']}}" alt="" style="max-width: 100%; margin: 0 auto;">
                            <div class="ver-producto">
                              <p>Ver producto <i class="fa fa-search" aria-hidden="true"></i></p>
                            </div>
                          </div>
                          <div class="name">
                            <b>{{str_limit($producto['nombre'], $limit = 35, $end = '...')}}</b>
                          </div>
                          <p style="margin:0;">&nbsp;</p>
                          <div class="pricefrom">
                            <div class="price">$  {!!number_format(intval($producto['precio'])/100, 2, '.', ',')!!}</div>
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
              @else
              <div class="row">
                <div class="col-md-12 text-center">
                        <h4>Aún no has agregado favoritos.</h4>
                </div>
              </div>
              @endif 
                  </div><!--/row-fluid-->
            

          </div>

          
        </div>
      </div>
  </div>

</section>






       

      




      


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
    $('#producto'+id).fadeOut();
    //window.location.href = "{{url('/perfil')}}";
}
</script>




@endsection





