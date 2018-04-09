@extends('templates.default')
@section('pagecontent')
<p>&nbsp;</p>
<div class="container-fluid">
	<div class="row">
          <div class="col-md-12">
            <h5 style="text-align: center;">Contacto</h5>
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
															<label>¡Queremos saber de ti! Déjanos tus datos y nos pondremos en contacto contigo.</label>
														</div>
													</div>
												<form method="post" enctype="multipart/form-data" action="{{ url('/contacto') }}">
													<input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <input name="nombre" class="form-control" placeholder="Nombre" type="text" required> </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <input name="email" class="form-control" placeholder="Email" type="text" required> </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <input name="tel" class="form-control" placeholder="Teléfono" type="text" required> </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <input name="asunto" class="form-control" placeholder="Asunto" type="text" required> </div>
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
