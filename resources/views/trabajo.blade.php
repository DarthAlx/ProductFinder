@extends('templates.default')
@section('pagecontent')
<p>&nbsp;</p><p>&nbsp;</p>
<div class="container-fluid">
	<div class="row">
          <div class="col-md-12">
            <h5 style="text-align: center;">Trabaja con nosotros</h5>
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
															<label>¡Queremos trabajar contigo! Déjanos tus datos y nos pondremos en contacto contigo.</label>
														</div>
													</div>
												<form method="post" enctype="multipart/form-data" action="{{ url('/bolsa-de-trabajo') }}">
													<input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <input name="nombre" class="form-control" placeholder="Nombre" type="text" required> </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <input name="email" class="form-control" placeholder="Email" type="text" required> </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <input name="tel" class="form-control" placeholder="Teléfono" type="text" required> </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="file-field input-field">
                                  <div class="btn">
                                    <span>Curriculum vitae</span>
                                    <input name="cv" type="file" required>
                                  </div>
                                  <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                  </div>
                                </div>
                                 </div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 input-field">

                                <div class="input-field">
                                  <textarea class="materialize-textarea" name="msg" rows="6"></textarea>
                                  <label for="textarea1">Mensaje</label>
                                </div>
                                
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
