@extends('templates.default')


@section('header')


  <meta property="og:url"           content="{{$producto['enlace']}}" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="{{$producto['nombre']}}" />
  <meta property="og:description"   content="{{$producto['descripcion']}}" />
  <meta property="og:image"         content="{{$producto['imagen']}}" />




@endsection
@section('pagecontent')
<div class="container-fluid">
  <div class="row" style="border-bottom: 5px solid #C42854;">
          <div class="col-md-4">
            <nav class="navbar navbar-default navbar-static" style="background: transparent; border: 0; margin-top: 1rem;">
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
                  foreach($categorias as $categoria){
                     
                      $arraycat[]=$categoria->nombre;
                      $arrayslug[]=$categoria->slug;
                    
                  }

                   ?>
                  <ul class="dropdown-menu dropdown-menu-large row">
                    @for ($i=0; $i < 4 ; $i++)
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
              </ul>
            


              


              
            </div><!-- /.nav-collapse -->
          </nav>
        </div>

        <div class="col-md-4">
                <form action="{{url('/buscar')}}" method="post" style="width: 100%;">
                  {{ csrf_field() }}

                  <div class="input-field valign-wrapper">
                    <i class="fa fa-search prefix"></i>
                    <input id="buscador" name="busqueda" type="text" value="{{$busqueda or ''}}" placeholder="Busca otro producto" class="validate" style="    border-bottom: 1px solid #9e9e9e;">
                  </div>
                  </form>
                </div>

                <div class="col-md-4">
                  <form id="ordenformmini" action="{{url('/buscar')}}" method="post" style="width: 100%;">
                    {{ csrf_field() }}
                    <input name="busqueda" type="hidden" value="">
                  <div class="input-field valign-wrapper selectorden">
                      <select id="ordenmini" name="sort" class="select" required>
                        <option value="Popularidad">Popularidad</option>
                        <option value="A - Z">A - Z</option>
                        <option value="Menor precio">Menor precio</option>
                        <option value="Mayor precio">Mayor precio</option>
                      </select>
                  </div>
                  </form>
                  

                </div>
      </div>
</div>
      <div class="container">
        <div class="row">

          <div class="col-md-12">

                  <div class="row-fluid">
                   <div class="col-md-5">
                     <img src="{{$producto['imagen']}}" class="img-responsive" alt="">
                   </div> 
                   <div class="col-md-7">
                     <h4>{{$producto['nombre']}}</h4>
                     <div class="pricefrom">
                        <p>lo encuentras desde</p>
                        <div class="price">$  {!!number_format($producto['precio']/100, 2, '.', ',')!!}</div>
                      </div>
                     <p>{{$producto['descripcion']}}</p>
                     <a href="{{$producto['enlacetienda']}}" target="_blank">
                        <div class="from">
                          <p>De: {{$producto['tienda']}}</p>
                        </div>
                      </a>
                     <div class="buttons">
                       <a href="{{$producto['enlace']}}" target="_blank" class="btn btn-primary">Comprar</a>
                       <div id="shareBtn" class="btn btn-success clearfix" style="background-color: #3B5999;"><i class="fa fa-facebook" aria-hidden="true"></i> Compartir</div>
                     </div>

                   </div>
                  </div><!--/row-fluid-->
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
            <div class="relacionados">
              <?php $relacionadocount=0;?>
              @foreach($relacionados as $producto)
                    <div class="col-md-2 col-sm-4 col-xs-6">
                      <form action="{{url('/producto')}}" method="post" id="relacionado{{$relacionadocount}}" style="display: none;">
                        {{ csrf_field() }}
                        <input type="hidden" name="nombre" value="{{$producto['nombre']}}">
                        <input type="hidden" name="enlace" value="{{$producto['enlace']}}">
                        <input type="hidden" name="precio" value="{{$producto['precio']}}">
                        <input type="hidden" name="imagen" value="{{$producto['imagen']}}">
                        <input type="hidden" name="tienda" value="{{$producto['tienda']}}">
                      </form>
                      <div class="product-small">
                        <a href="#" onclick="document.getElementById('relacionado{{$relacionadocount}}').submit()">
                          <div class="img-container text-center">
                            <img src="{{$producto['imagen']}}" alt="" style="max-width: 100%; margin: 0 auto;">
                          </div>
                          <div class="pricefrom">
                            <p>lo encuentras desde</p>
                            <div class="price">$  {!!number_format($producto['precio']/100, 2, '.', ',')!!}</div>
                          </div>
                          <div class="name">
                            <b>{{str_limit($producto['nombre'], $limit = 22, $end = '...')}}</b>
                          </div>
                        </a>
                        <a href="{{$producto['enlacetienda']}}" target="_blank">
                          <div class="from">
                            <p>De: {{$producto['tienda']}}</p>
                          </div>
                        </a>
                      </div>
                    </div>
                    
                    <?php $relacionadocount++;?>
              @endforeach
            </div>
    


          </div>
        </div>
</div>




       

      




      <div class="container-fluid info">
        <div class="row">
          <div class="col-md-3 info-item">
            <div class="text-center">
              <i class="fa fa-tags fa-3x"></i>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus reprehenderit inventore qui molestias perspiciatis, animi? Nisi eum repellat ad in aspernatur ullam voluptas voluptates deserunt quod totam, modi, dolorum. Reiciendis?</p>
          </div>
            <div class="col-md-3 info-item">
            <div class="text-center">
              <i class="fa fa-comment fa-3x"></i>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus reprehenderit inventore qui molestias perspiciatis, animi? Nisi eum repellat ad in aspernatur ullam voluptas voluptates deserunt quod totam, modi, dolorum. Reiciendis?</p>
          </div>
          <div class="col-md-3 info-item">
            <div class="text-center">
              <i class="fa fa-certificate fa-3x"></i>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus reprehenderit inventore qui molestias perspiciatis, animi? Nisi eum repellat ad in aspernatur ullam voluptas voluptates deserunt quod totam, modi, dolorum. Reiciendis?</p>
          </div>
          <div class="col-md-3 info-item">
            <div class="text-center">
              <i class="fa fa-trophy fa-3x"></i>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus reprehenderit inventore qui molestias perspiciatis, animi? Nisi eum repellat ad in aspernatur ullam voluptas voluptates deserunt quod totam, modi, dolorum. Reiciendis?</p>
          </div>
        </div>
            
          
      </div>


@endsection


@section('scripts')



<script>
  
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
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 3
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 1
      }
    }
  ]
});
});

</script>

<script>
  document.getElementById('shareBtn').onclick = function() {
    FB.ui({
      method: 'share',
      display: 'popup',
      href: "{{$producto['enlace']}}",
    }, function(response){

    });
  }
</script>


@endsection