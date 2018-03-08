@extends('templates.default')

@section('pagecontent')

  <section class="container">
    <div class="row">
        <div class="col-md-6 mb-4 offset-md-3">
          <div class="card-body">
            <h6 class="section-title-center py-3"> <span class="secition-title-main"><i class="fa fa-lock"></i> Recuperación de contraseña</span></h6>
            @if (count($errors)>0)
              <div class="alert alert-danger alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            <form  action="{{ route('password.request') }}" method="post">
              {!! csrf_field() !!}
                <input type="hidden" name="token" value="{{ $token }}">
              <div class="md-form input-field">
                
                <input class="form-control" id="email" type="email" name="email" required>
                        <label for="email">Email</label><br>
                        
                    </div>
              <div class="md-form input-field">
                
                <input class="form-control" id="contraseña" type="password" name="password" required>
                        <label for="contraseña">Nueva contraseña</label><br>
                        
                    </div>
              <div class="md-form input-field">
                <input class="form-control" id="repetircontraseña" type="password" name="password_confirmation" required>
                        <label for="repetircontraseña">Confirma tu contraseña</label><br>
                        
                
                    </div>
              <div>
                <button class="btn btn-default waves-effect waves-light">Reestablecer contraseña</button>

              </div>


            </form>
          </div>
               </div>
       </div>
     </section>
        @endsection
