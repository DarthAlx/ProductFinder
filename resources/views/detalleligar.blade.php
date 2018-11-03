@extends('templates.default')


@section('header')
@endsection
@section('pagecontent')

@php
$items=Cart::content();
@endphp
<p>&nbsp;</p><p>&nbsp;</p>
 <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
<div class="container-fluid">

  <div class="row" style="border-bottom: 5px solid #303132;">
        <div class="col-md-4 col-md-offset-4">

                <form action="{{url('/buscar')}}" method="post" id="formmini" style="width: 100%;" enctype="multipart/form-data">
                  {{ csrf_field() }}

                  <div class="input-field valign-wrapper">
                    <i class="fa fa-search prefix"></i>
                    <input id="buscador" name="busqueda" type="text" value="{{$busqueda or ''}}" placeholder="Busca otro producto" class="validate" style="    border-bottom: 1px solid #9e9e9e;">
                  </div>
                  </form>

                   <script type="text/javascript">
                      /*$(document).ready(function() {
                        $("#formmini").submit(function(event){
                             event.preventDefault();  
                             document.getElementById('se-pre-con').style.visibility = 'visible';      

                             setTimeout(function () {
                                 document.getElementById('formmini').submit();  
                              }, 1000);      
                             
                        });
                      });*/
                      </script>

                  <script>

                    /*var input = document.getElementById("formmini");

                      // Execute a function when the user releases a key on the keyboard
                    input.addEventListener("keyup", function(event) {
                      // Cancel the default action, if needed
                      event.preventDefault();
                      // Number 13 is the "Enter" key on the keyboard
                      if (event.keyCode === 13) {
                        // Trigger the button element with a click
                        document.getElementsByClassName('se-pre-con')[0].style.display = "block";
                        document.getElementById('formmini').submit();
                      }
                    });*/
    
                  </script>
                </div>

                <div class="col-md-4" style="padding-top: 2rem;">
                  <a href="{{url('/favoritos')}}" style="color: #777777; width: 100%; display: block; text-decoration: none;"><i class="fa fa-heart"></i> Favoritos</a>
                  

                </div>
      </div>
</div>
<?php $esfav=false;?>
@php
  $nombre = $producto['nombre'];
  $enlace = $producto['enlace'];
  $precio = $producto['precio'];
  $imagen = $producto['imagen'];
  $tienda = $producto['tienda'];
  $url = $producto['enlacetienda'];
  $tiendax=App\Tienda::where('nombre',$tienda)->first();
@endphp
      <div class="container">
        <div class="row">

          <div class="col-md-12">

                  <div class="row-fluid">

                   <div class="col-md-3">
                    <div class="row">

                      <div class="col-md-12 col-xs-12">
                          <img src="{{$producto['imagen']}}" class="img-responsive" id="zoom_01"  data-zoom-image="{{$producto['imagen']}}" alt="">
                      </div>
                    </div>
                     
                   </div> 
                   <div class="col-md-9">
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
                          <a class="favp0" onclick="addtofavorite('{{$nombre}}','{{$enlace}}','{{$precio}}','{{$imagen}}','{{$tienda}}','{{$url}}', 'favp')" style=" cursor: pointer;">
                            <i class="fa fa-heart-o fa-2x" aria-hidden="true"></i>
                          </a>
                         
                          <a class="favp1" style="display: none; cursor: pointer;">
                            <i class="fa fa-heart fa-2x " aria-hidden="true"></i>
                          </a>

                          @if($esfav)
                            <script>
                                $('.favp'+"0").hide();
                                $('.favp'+"1").show();
                                $(document).ready(function(){
                                  $( ".favp1" ).click(function() {
                                    removefromfavorite('{{$productid}}','favp');
                                  });
                                });
                            </script>
                          @else
                          <script>
                                $('.favp'+"1").hide();
                                $('.favp'+"0").show();


                            </script>
                            
                            <div id="favp">
                              
                            </div>
                            </script>

                          @endif

                          
                              
                        </div>


                     <h4>{{$producto['nombre']}}</h4>
                     <div class="pricefrom">
                        
                        <div class="price">$ {!!number_format($producto['precio'], 0, '.', ',')!!}</div>
                      </div>

                      <hr>
                     <p><b>Información del producto:</b><br>
                      <?php $top=App\Top::where('nombre',$producto['nombre'])->first(); ?>
                      @if($top)
                        {{$top->descripcion}}
                      @else
                        @if($producto['descripcion']=="No hay datos disponibles."||trim($producto['descripcion'])=="")
                          <a href="{{$producto['enlace']}}" target="_blank">Ver en la web</a>
                        @else
                        {{str_limit($producto['descripcion'], $limit = 300, $end = '...')}}
                          
                        @endif
                      @endif
                      </p>

                     
                     <a href="{{$producto['enlacetienda']}}" target="_blank">
                        <div class="from">
                          <p>{{$producto['tienda']}}</p>
                        </div>
                      </a>
                     <div class="buttons">
                       <a href="{{$producto['enlace']}}" target="_blank" class="btn btn-primary" style="width: 100%">Ir a la tienda</a>
                       <!--a href="{{$producto['enlace']}}" target="_blank" class="btn btn-primary green">Ver más detalles</a>
                       <div id="shareBtn" class="btn btn-success clearfix" style="background-color: #3B5999;"><i class="fa fa-facebook" aria-hidden="true"></i> Compartir</div-->
                     </div>
                      
                      <hr>
                      <a href="#" id="shareBtn" style="color: #3a5897;"><i class="fa fa-facebook fa-lg"></i></a> &nbsp; &nbsp;
                      <a href="{{Share::load(url('/'), 'Usa Product Finder para comparar los precios de diferentes productos. <br> Encuentra la mejor tienda y ahorra. <br> Yo, ya encontré un mejor precio.')->twitter()}}" onclick="window.open(this.href, 'mywin',
'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" style="color: #2fc7f2;"><i class="fa fa-twitter fa-lg"></i></a> &nbsp; &nbsp;
                      <a href="{{Share::load(url('/'), 'Usa Product Finder para comparar los precios de diferentes productos. <br> Encuentra la mejor tienda y ahorra. <br> Yo, ya encontré un mejor precio.')->gplus()}}" onclick="window.open(this.href, 'mywin',
'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" style="color: #f95c38;"><i class="fa fa-google-plus fa-lg"></i></a> &nbsp; &nbsp;
                      <a href="{{Share::load(url('/'), 'Usa Product Finder para comparar los precios de diferentes productos. <br> Encuentra la mejor tienda y ahorra. <br> Yo, ya encontré un mejor precio.')->pinterest()}}" onclick="window.open(this.href, 'mywin',
'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" style="color: #f01951;"><i class="fa fa-pinterest fa-lg"></i></a> &nbsp; &nbsp;

                   </div>
                  </div><!--/row-fluid-->
          </div>
        </div>


</div>



      <p>&nbsp;</p>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <ul class="collection">
              <li class="collection-item">
                <h5>Comparador de precios</h5>
              </li>
              <?php $relacionadocount=0; $esfav=false;
              $r=[$relacionados[0],$relacionados[1]];
              $arrayId=[];

              ?>

                      <form action="{{url('/ligue')}}" method="post" id="tendencia{{$relacionadocount}}"  enctype="multipart/form-data"  >

                        
                        {{ csrf_field() }}

              
              @foreach($relacionados as $producto)

            
           
                              
          
              

                    


                        @php
                        if(trim($producto->tienda)=='Sanborns' || trim($producto->tienda)=='Bestbuy' || trim($producto->tienda)=='dormimundo' || trim($producto->tienda)=='Claroshop' || trim($producto->tienda)=='solarismexico' || trim($producto->tienda)=='casapalacio' || trim($producto->tienda)=='homedepot' || trim($producto->tienda)=='Porrua' || trim($producto->tienda)=='gandhi' ){

                          $precioTemp=trim($producto->precio);
                        }else{
                          $precioTemp=trim($producto->precio);
              
              
                        }
                          $nombre = $producto['nombre_producto'];
                          $enlace = $producto['url'];
                          $precio = $precioTemp;
                          $imagen = $producto['url_image'];
                          $tienda = $producto['tienda'];
                          $url = $producto['url'];
                          $e = array_push($arrayId, $producto['id']);
                          $todosId = '';
                        @endphp





                          <div class="row">
                            <div class="valign-wrapper">
                                <div class="col-md-3">
                                    
                                    
                                     
                                    <!--
                                    <a href="{{$producto['url']}}" target="_blank" class="btn btn-primary" style="width: 100%"></a>
                                    <a href="{{$producto['url']}}" target="_blank" class="btn btn-primary" style="width: 100%">{{ucfirst(strtolower($producto['tienda']))}}</a>
                                  -->
                                  <img src="{{$producto['image_url'] }}" style='width:100%;'>
                                </div>
                                <div class="col-md-3">
                                    <!--div class="img-container text-center">
                                  
                                        <img src="{{$producto['url_image']}}" alt="" style="max-width: 100%; margin: 0 auto;">
                                        <div class="ver-producto">
                                          <p>Ver producto <i class="fa fa-search" aria-hidden="true"></i></p>
                                        </div>
                                      </div-->
                                      <div class="name">
                                          
                                          <h6><b>{{str_limit($producto['nombre_producto'], $limit = 100, $end = '...')}}</b></h6>  

                                        </div>
                                </div>
                                
                                <div class="col-md-2">
                                    
                                      
                                      <div class="pricefrom">
                                        <div class="price">$  {!!number_format($producto['precio'], 0, '.', ',')!!}</div>
                                      </div>
                                      
                                </div>
                                <div class="col-md-2">
                                    <a href="{{$producto['url']}}" target="_blank">
                                        <div class="from">
                                          @include('snip.tienda', ['tienda' => $producto['tienda']])
                                        </div>
                                      </a>
                                </div>

                                <div class="col-md-2">
                                    
                                    
                                     
                                    <!--
                                    <a href="{{$producto['url']}}" target="_blank" class="btn btn-primary" style="width: 100%"></a>
                                    <a href="{{$producto['url']}}" target="_blank" class="btn btn-primary" style="width: 100%">{{ucfirst(strtolower($producto['tienda']))}}</a>
                                  -->
                                  <input type="text" class='datoin' name="ligar[]" value="{{$producto['ligar_manual']}}">

                                </div>
                            </div>  
                              
                          </div>

              @endforeach

              @php
              $todosId = implode(",", $arrayId);
              @endphp
              <input type="hidden" class='datoin' name='todo'  value="{{$todosId }}">
              <input type="hidden" class='datoin' name='productoBase'  value="{{$producto['id']}}">
              <input type="hidden" class='datoin' name='estado'  value="{{$estado}}">

              <input type="submit" value="Submit">

                      </form>

                  </ul>
    


          </div>
        </div>
</div>




       

      




      


@endsection


@section('scripts')



<script>
alert('funcionoooooooo');
  
  $(document).ready(function(){
    $('.relacionados').slick({
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
        slidesToShow: 3
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
});

  $(document).ready(function(){



    $('.datoin').onchange({

      alert('funciono');

});
});

</script>

<script>
  document.getElementById('shareBtn').onclick = function() {
    FB.ui({
      method: 'share',
      display: 'popup',
      href: "{{url('/')}}",
      title: "{{$producto['nombre']}}",
      description: "Usa Product Finder para comparar los precios de diferentes productos. <br> Encuentra la mejor tienda y ahorra. <br> Yo, ya encontré un mejor precio.",
      picture: '{{$producto['imagen']}}',  
      caption: '{{$producto['nombre']}}', 
    }, function(response){

    });
  }
</script>





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

/*$('#formmini').submit(function(){
  $('.se-pre-con').fadeIn();
});*/
</script>


<script>
$("#zoom_01").elevateZoom();
</script>



@endsection