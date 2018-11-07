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

                <form action="{{url('/sistema')}}" method="post" id="formmini" style="width: 100%;" enctype="multipart/form-data">
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

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <ul class="collection">
              <li class="collection-item">
                <h5>Posibles productos iguales : {{$busqueda}}</h5>
              </li>
              <?php 
              /*$relacionadocount=0; $esfav=false;
              $r=[$relacionados[0],$relacionados[1]];
              $arrayId=[];
              */

              ?>

                      <form action="{{url('/ligue')}}" method="post" id="formligar"  enctype="multipart/form-data"  >

                        
                        {{ csrf_field() }}

        <div class="row">
          <div class="col-md-2">

          </div>
          <div class="col-md-4">

             <h6 style='margin:5%;'>Coloque nombre público del producto a relacionar :</h6>

          </div>
          <div class="col-md-4">

             <input id="buscador" name="nombreFinal" type="text" value="{{$busqueda or ''}}"  class="validate" style="    border-bottom: 1px solid #9e9e9e;">

          </div>
        </div>

              @foreach($relacionados as $producto)

            
           
                              
          
              

                    








                          <div class="row">
                            <div class="valign-wrapper">
                                <div class="col-md-2">
                                    

                                  <img src="{{$producto['enlace'] }}" style='width:100%;'>
                                </div>
                                <div class="col-md-3">

                                      <div class="name">
                                          
                                          <h6><b>{{str_limit($producto['nombre'], $limit = 100, $end = '...')}}</b></h6>  

                                        </div>
                                </div>
                                
                                <div class="col-md-2">
                                    
                                      
                                      <div class="pricefrom">
                                        <div class="price">$  {!!number_format($producto['precio'], 0, '.', ',')!!}</div>
                                      </div>
                                      
                                </div>
                                <div class="col-md-1">
                                    <a href="{{$producto['enlace']}}" target="_blank">
                                        <div class="from">
                                          @include('snip.tienda', ['tienda' => $producto['tienda']])
                                        </div>
                                      </a>
                                </div>

                                <div class="col-md-1">
                                    
                                    
                                     
                                    <!--
                                    <a href="{{$producto['enlace']}}" target="_blank" class="btn btn-primary" style="width: 100%"></a>
                                    <a href="{{$producto['enlace']}}" target="_blank" class="btn btn-primary" style="width: 100%">{{ucfirst(strtolower($producto['tienda']))}}</a>
                                  -->
                                  <input type="text" class='datoin' name="ligar[]" value="0">

                                </div>
                                <div class="col-md-3">
                                    
                                    
                                     
                                    <!--
                                    <a href="{{$producto['enlace']}}" target="_blank" class="btn btn-primary" style="width: 100%"></a>
                                    <a href="{{$producto['enlace']}}" target="_blank" class="btn btn-primary" style="width: 100%">{{ucfirst(strtolower($producto['tienda']))}}</a>
                                  -->

                                  @if($producto['ligar_manual']=='1')

                                  
                                  <p>{{$producto['producto']}}</p>
                                  @else

                                  
                                  <p>No ha sido ligado</p>
                                  @endif

                                </div>
                            </div>  
                              
                          </div>

              @endforeach

              @php
              $todosId = implode(",", $arrayId);
              @endphp
              <input type="hidden" class='datoin' name='todo'  value="{{$todosId }}">
            <!--  <input type="hidden" class='datoin' name='productoBase'  value="{{$producto['id']}}"> -->
              

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