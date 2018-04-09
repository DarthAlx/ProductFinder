@extends('templates.default')
@section('pagecontent')
<p>&nbsp;</p>
<div class="container-fluid">
	<div class="row">
          <div class="col-md-12">
            <h5 style="text-align: center;">Registra tu marca.</h5>
            <hr>
          </div>
        </div>
</div>
	<section class="container">
		<div class="topclear">
	    &nbsp;
	  </div>
		<div class="container">
			<div class="row">
				
				<div class="paddingtop">
														<div class="coupon">
															<label>Registra tu marca y colabora con nosotros.</label>
														</div>
													</div>
												<form method="post" enctype="multipart/form-data" action="{{ url('/registra-tu-marca') }}">
													<input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <input name="nombre" class="form-control" placeholder="Nombre" type="text"> </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <input name="email" class="form-control" placeholder="Email" type="text"> </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <input name="tel" class="form-control" placeholder="Teléfono" type="text"> </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <input name="empresa" class="form-control" placeholder="Empresa" type="text"> </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <input name="url" class="form-control" placeholder="Página Web" type="url"> </div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <textarea class="form-control" name="msg" rows="6" placeholder="Mensaje"></textarea>
                            </div>
                            <div class="text-center col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <button type="submit" value="SEND" id="catwebformbutton" class="btn btn-lg btn-success">ENVIAR</button>
                            </div>

                        </form>
			</div>
		</div>
		<p>&nbsp;</p>


	</section>
@endsection
