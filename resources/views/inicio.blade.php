@extends('templates.default')


@section('header')
<style>
  .headermain{
    display: none;
  }
</style>
@endsection
@section('pagecontent')

    <div id="search" class=" valign-wrapper">
        <form action="{{url('/buscar')}}" method="post" style="width: 100%;">
          {{ csrf_field() }}
          <div class="row">
            <div class="col-md-12 text-center">
              <p>Compara y ahorra con nosotros</p>
              <input type="search" name="busqueda" value="" placeholder="¿qué estás buscando?" class="browser-default" autocomplete="off" autofocus/>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 text-center">
              <button type="submit" class="btn btn-large">Buscar <i class="fa fa-search" aria-hidden="true"></i></button>
            </div>
          </div>
            
            
        </form>
      </div> 
      <p>&nbsp;</p>
      <div class="anuncio">
        <img src="img/ad1.jpg" alt="" class="img-responsive">
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
            <div id="products1" class="carousel slide" data-interval="false">    
                <!-- Carousel items -->
                <div class="carousel-inner">
                    
                <div class="item active">
                  <div class="row-fluid">
                    <div class="col-md-2 col-sm-4 col-xs-6">
                      <div class="product-small">
                        <div class="img-container text-center">
                          <img src="img/iphone.png" alt="" style="max-width: 100%; margin: 0 auto;">
                        </div>
                        <div class="pricefrom">
                          <p>lo encuentras desde</p>
                          <div class="price">664</div>
                        </div>
                        <div class="name">
                          <b>Apple IPhone 8 64GB gris</b>
                        </div>
                        <div class="from">
                          <p>De: Amazon</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2 col-sm-4 col-xs-6">
                      <div class="product-small">
                        <div class="img-container text-center">
                          <img src="img/iphone.png" alt="" style="max-width: 100%; margin: 0 auto;">
                        </div>
                        <div class="pricefrom">
                          <p>lo encuentras desde</p>
                          <div class="price">664</div>
                        </div>
                        <div class="name">
                          <b>Apple IPhone 8 64GB gris</b>
                        </div>
                        <div class="from">
                          <p>De: Amazon</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2 col-sm-4 col-xs-6">
                      <div class="product-small">
                        <div class="img-container text-center">
                          <img src="img/iphone.png" alt="" style="max-width: 100%; margin: 0 auto;">
                        </div>
                        <div class="pricefrom">
                          <p>lo encuentras desde</p>
                          <div class="price">664</div>
                        </div>
                        <div class="name">
                          <b>Apple IPhone 8 64GB gris</b>
                        </div>
                        <div class="from">
                          <p>De: Amazon</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2 col-sm-4 col-xs-6">
                      <div class="product-small">
                        <div class="img-container text-center">
                          <img src="img/iphone.png" alt="" style="max-width: 100%; margin: 0 auto;">
                        </div>
                        <div class="pricefrom">
                          <p>lo encuentras desde</p>
                          <div class="price">664</div>
                        </div>
                        <div class="name">
                          <b>Apple IPhone 8 64GB gris</b>
                        </div>
                        <div class="from">
                          <p>De: Amazon</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2 col-sm-4 col-xs-6">
                      <div class="product-small">
                        <div class="img-container text-center">
                          <img src="img/iphone.png" alt="" style="max-width: 100%; margin: 0 auto;">
                        </div>
                        <div class="pricefrom">
                          <p>lo encuentras desde</p>
                          <div class="price">664</div>
                        </div>
                        <div class="name">
                          <b>Apple IPhone 8 64GB gris</b>
                        </div>
                        <div class="from">
                          <p>De: Amazon</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2 col-sm-4 col-xs-6">
                      <div class="product-small">
                        <div class="img-container text-center">
                          <img src="img/iphone.png" alt="" style="max-width: 100%; margin: 0 auto;">
                        </div>
                        <div class="pricefrom">
                          <p>lo encuentras desde</p>
                          <div class="price">664</div>
                        </div>
                        <div class="name">
                          <b>Apple IPhone 8 64GB gris</b>
                        </div>
                        <div class="from">
                          <p>De: Amazon</p>
                        </div>
                      </div>
                    </div>
                  </div><!--/row-fluid-->
                </div><!--/item-->


                <div class="item">
                  <div class="row-fluid">
                    <div class="col-md-2 col-sm-4 col-xs-6">
                      <div class="product-small">
                        <div class="img-container text-center">
                          <img src="img/iphone.png" alt="" style="max-width: 100%; margin: 0 auto;">
                        </div>
                        <div class="pricefrom">
                          <p>lo encuentras desde</p>
                          <div class="price">664</div>
                        </div>
                        <div class="name">
                          <b>Apple IPhone 8 64GB gris</b>
                        </div>
                        <div class="from">
                          <p>De: Amazon</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2 col-sm-4 col-xs-6">
                      <div class="product-small">
                        <div class="img-container text-center">
                          <img src="img/iphone.png" alt="" style="max-width: 100%; margin: 0 auto;">
                        </div>
                        <div class="pricefrom">
                          <p>lo encuentras desde</p>
                          <div class="price">664</div>
                        </div>
                        <div class="name">
                          <b>Apple IPhone 8 64GB gris</b>
                        </div>
                        <div class="from">
                          <p>De: Amazon</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2 col-sm-4 col-xs-6">
                      <div class="product-small">
                        <div class="img-container text-center">
                          <img src="img/iphone.png" alt="" style="max-width: 100%; margin: 0 auto;">
                        </div>
                        <div class="pricefrom">
                          <p>lo encuentras desde</p>
                          <div class="price">664</div>
                        </div>
                        <div class="name">
                          <b>Apple IPhone 8 64GB gris</b>
                        </div>
                        <div class="from">
                          <p>De: Amazon</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2 col-sm-4 col-xs-6">
                      <div class="product-small">
                        <div class="img-container text-center">
                          <img src="img/iphone.png" alt="" style="max-width: 100%; margin: 0 auto;">
                        </div>
                        <div class="pricefrom">
                          <p>lo encuentras desde</p>
                          <div class="price">664</div>
                        </div>
                        <div class="name">
                          <b>Apple IPhone 8 64GB gris</b>
                        </div>
                        <div class="from">
                          <p>De: Amazon</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2 col-sm-4 col-xs-6">
                      <div class="product-small">
                        <div class="img-container text-center">
                          <img src="img/iphone.png" alt="" style="max-width: 100%; margin: 0 auto;">
                        </div>
                        <div class="pricefrom">
                          <p>lo encuentras desde</p>
                          <div class="price">664</div>
                        </div>
                        <div class="name">
                          <b>Apple IPhone 8 64GB gris</b>
                        </div>
                        <div class="from">
                          <p>De: Amazon</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2 col-sm-4 col-xs-6">
                      <div class="product-small">
                        <div class="img-container text-center">
                          <img src="img/iphone.png" alt="" style="max-width: 100%; margin: 0 auto;">
                        </div>
                        <div class="pricefrom">
                          <p>lo encuentras desde</p>
                          <div class="price">664</div>
                        </div>
                        <div class="name">
                          <b>Apple IPhone 8 64GB gris</b>
                        </div>
                        <div class="from">
                          <p>De: Amazon</p>
                        </div>
                      </div>
                    </div>
                  </div><!--/row-fluid-->
                </div><!--/item-->




                </div><!--/carousel-inner-->
                 
                <a class="left carousel-control" href="#products1" data-slide="prev">‹</a>
                <a class="right carousel-control" href="#products1" data-slide="next">›</a>
            </div><!--/myCarousel-->
          </div>
        </div>







        <!--mas buscados-->

        <div class="row">
          <div class="col-md-12">
            <h5 style="margin: 0;">Los más buscados</h5>
            <hr>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div id="myCarousel" class="carousel slide" data-interval="false">    
                <!-- Carousel items -->
                <div class="carousel-inner">
                    
                <div class="item active">
                  <div class="row-fluid">
                    <div class="col-md-2 col-sm-4 col-xs-6">
                      <div class="product-small">
                        <div class="img-container text-center">
                          <img src="img/iphone.png" alt="" style="max-width: 100%; margin: 0 auto;">
                        </div>
                        <div class="pricefrom">
                          <p>lo encuentras desde</p>
                          <div class="price">664</div>
                        </div>
                        <div class="name">
                          <b>Apple IPhone 8 64GB gris</b>
                        </div>
                        <div class="from">
                          <p>De: Amazon</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2 col-sm-4 col-xs-6">
                      <div class="product-small">
                        <div class="img-container text-center">
                          <img src="img/iphone.png" alt="" style="max-width: 100%; margin: 0 auto;">
                        </div>
                        <div class="pricefrom">
                          <p>lo encuentras desde</p>
                          <div class="price">664</div>
                        </div>
                        <div class="name">
                          <b>Apple IPhone 8 64GB gris</b>
                        </div>
                        <div class="from">
                          <p>De: Amazon</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2 col-sm-4 col-xs-6">
                      <div class="product-small">
                        <div class="img-container text-center">
                          <img src="img/iphone.png" alt="" style="max-width: 100%; margin: 0 auto;">
                        </div>
                        <div class="pricefrom">
                          <p>lo encuentras desde</p>
                          <div class="price">664</div>
                        </div>
                        <div class="name">
                          <b>Apple IPhone 8 64GB gris</b>
                        </div>
                        <div class="from">
                          <p>De: Amazon</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2 col-sm-4 col-xs-6">
                      <div class="product-small">
                        <div class="img-container text-center">
                          <img src="img/iphone.png" alt="" style="max-width: 100%; margin: 0 auto;">
                        </div>
                        <div class="pricefrom">
                          <p>lo encuentras desde</p>
                          <div class="price">664</div>
                        </div>
                        <div class="name">
                          <b>Apple IPhone 8 64GB gris</b>
                        </div>
                        <div class="from">
                          <p>De: Amazon</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2 col-sm-4 col-xs-6">
                      <div class="product-small">
                        <div class="img-container text-center">
                          <img src="img/iphone.png" alt="" style="max-width: 100%; margin: 0 auto;">
                        </div>
                        <div class="pricefrom">
                          <p>lo encuentras desde</p>
                          <div class="price">664</div>
                        </div>
                        <div class="name">
                          <b>Apple IPhone 8 64GB gris</b>
                        </div>
                        <div class="from">
                          <p>De: Amazon</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2 col-sm-4 col-xs-6">
                      <div class="product-small">
                        <div class="img-container text-center">
                          <img src="img/iphone.png" alt="" style="max-width: 100%; margin: 0 auto;">
                        </div>
                        <div class="pricefrom">
                          <p>lo encuentras desde</p>
                          <div class="price">664</div>
                        </div>
                        <div class="name">
                          <b>Apple IPhone 8 64GB gris</b>
                        </div>
                        <div class="from">
                          <p>De: Amazon</p>
                        </div>
                      </div>
                    </div>
                  </div><!--/row-fluid-->
                </div><!--/item-->


                <div class="item">
                  <div class="row-fluid">
                    <div class="col-md-2 col-sm-4 col-xs-6">
                      <div class="product-small">
                        <div class="img-container text-center">
                          <img src="img/iphone.png" alt="" style="max-width: 100%; margin: 0 auto;">
                        </div>
                        <div class="pricefrom">
                          <p>lo encuentras desde</p>
                          <div class="price">664</div>
                        </div>
                        <div class="name">
                          <b>Apple IPhone 8 64GB gris</b>
                        </div>
                        <div class="from">
                          <p>De: Amazon</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2 col-sm-4 col-xs-6">
                      <div class="product-small">
                        <div class="img-container text-center">
                          <img src="img/iphone.png" alt="" style="max-width: 100%; margin: 0 auto;">
                        </div>
                        <div class="pricefrom">
                          <p>lo encuentras desde</p>
                          <div class="price">664</div>
                        </div>
                        <div class="name">
                          <b>Apple IPhone 8 64GB gris</b>
                        </div>
                        <div class="from">
                          <p>De: Amazon</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2 col-sm-4 col-xs-6">
                      <div class="product-small">
                        <div class="img-container text-center">
                          <img src="img/iphone.png" alt="" style="max-width: 100%; margin: 0 auto;">
                        </div>
                        <div class="pricefrom">
                          <p>lo encuentras desde</p>
                          <div class="price">664</div>
                        </div>
                        <div class="name">
                          <b>Apple IPhone 8 64GB gris</b>
                        </div>
                        <div class="from">
                          <p>De: Amazon</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2 col-sm-4 col-xs-6">
                      <div class="product-small">
                        <div class="img-container text-center">
                          <img src="img/iphone.png" alt="" style="max-width: 100%; margin: 0 auto;">
                        </div>
                        <div class="pricefrom">
                          <p>lo encuentras desde</p>
                          <div class="price">664</div>
                        </div>
                        <div class="name">
                          <b>Apple IPhone 8 64GB gris</b>
                        </div>
                        <div class="from">
                          <p>De: Amazon</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2 col-sm-4 col-xs-6">
                      <div class="product-small">
                        <div class="img-container text-center">
                          <img src="img/iphone.png" alt="" style="max-width: 100%; margin: 0 auto;">
                        </div>
                        <div class="pricefrom">
                          <p>lo encuentras desde</p>
                          <div class="price">664</div>
                        </div>
                        <div class="name">
                          <b>Apple IPhone 8 64GB gris</b>
                        </div>
                        <div class="from">
                          <p>De: Amazon</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2 col-sm-4 col-xs-6">
                      <div class="product-small">
                        <div class="img-container text-center">
                          <img src="img/iphone.png" alt="" style="max-width: 100%; margin: 0 auto;">
                        </div>
                        <div class="pricefrom">
                          <p>lo encuentras desde</p>
                          <div class="price">664</div>
                        </div>
                        <div class="name">
                          <b>Apple IPhone 8 64GB gris</b>
                        </div>
                        <div class="from">
                          <p>De: Amazon</p>
                        </div>
                      </div>
                    </div>
                  </div><!--/row-fluid-->
                </div><!--/item-->




                </div><!--/carousel-inner-->
                 
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
            </div><!--/myCarousel-->
          </div>
        </div>
      </div> 

      <div class="main-stores">
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
      </div>




      <div class="container info">
        <div class="row">
          <div class="col-md-3 info-item">
            <div class="text-center">
              <i class="fa fa-tags fa-3x"></i>
            </div>
            <p><b>Tu comparador de precios</b><br>Product Finder es uno de los comparadores de precios más destacados de México con más de 81 millones de ofertas de entre más de 11.500 tiendas online. El gran número de tiendas y ofertas aumenta las posibilidades de encontrar en idealo el precio más barato. Además, el catálogo de productos y variantes disponibles en Product Finder es muy amplio.</p>
          </div>
            <div class="col-md-3 info-item">
            <div class="text-center">
              <i class="fa fa-comment fa-3x"></i>
            </div>
            <p><b>Comparar precios por resultados de análisis</b><br>En sus 15 años de historia, idealo ha recibido buenas valoraciones en repetidas ocasiones y ha sido premiado en diferentes comparativas. En 2014, idealo fue certificado como el comparador de precios más eficiente en cuanto a calidad, actualización y protección de datos por la TÜV Saarland, la organización líder en análisis de calidad en Alemania.</p>
          </div>
          <div class="col-md-3 info-item">
            <div class="text-center">
              <i class="fa fa-certificate fa-3x"></i>
            </div>
            <p><b>Análisis de productos, opiniones de usuarios y filtros de búsqueda</b><br>En idealo contamos con cientos de análisis de productos y opiniones de usuarios. Con ello, en idealo puedes encontrar no solo el mejor precio, sino también útiles consejos que te ayudarán a decidirte por el mejor producto.

Más de 600 trabajadores se encargan de actualizar la información acerca de los productos, notificar a los usuarios cuando un producto alcanza el precio deseado y de que las opciones de filtrado sean las más amplias que se pueden encontrar en un comparador de precios.</p>
          </div>
          <div class="col-md-3 info-item">
            <div class="text-center">
              <i class="fa fa-trophy fa-3x"></i>
            </div>
            <p><b>Porque lo que cuenta es el precio más barato</b><br>En idealo no se compra la primera posición. Todas las tiendas tienen la opción de ocupar la primera posición de la lista ofreciendo los precios más bajos.

Los precios y ofertas de idealo se actualizan cada hora para que la disponibilidad y el precio de las ofertas sean correctos.</p>
          </div>
        </div>
            
          
      </div>


@endsection