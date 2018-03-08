@extends('templates.default')

@section('pagecontent')
    <section class="entrar">
    <div class="container">
        <div class="row" style="margin: 0;">
        <div class="col-md-6 mb-4 col-md-offset-3">

            <div>
                <div class="card-body">
                    
                    <div class="row omb_row-sm-offset-3 social-login">
                        <div class="col-md-8 col-md-offset-2">
                            <a href="{{url('auth/facebook')}}" class="btn btn-lg omb_btn-facebook">
                                <i class="fa fa-facebook visible-xs"></i>
                                <span class="hidden-xs">Iniciar con Facebook</span>
                            </a>
                        </div>
                    </div>
                    <div class="section-title">
                        <b></b>
                        <span class="secition-title-main"> &nbsp; ó &nbsp; </span>
                        <b></b>
                    </div>
                    
                    <h6 class="section-title-center py-3"> <span class="secition-title-main"><i class="fa fa-lock"></i> Iniciar sesión</span></h6>
                    @include('snip.notificaciones')
                    <!--Body-->
                    <form id="loginform" class="form-horizontal" role="form" action="{{ route('login') }}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="md-form input-field">
                            
                            <input type="text" id="defaultForm-email" name="email" class="form-control" required>
                            <label for="defaultForm-email"><i class="fa fa-envelope grey-text fa-lg"></i> Email</label>
                        </div>
                        <div class="md-form input-field">
                            
                            <input type="password" id="defaultForm-pass" name="password" class="form-control" required>
                            <label for="defaultForm-pass"><i class="fa fa-lock grey-text fa-lg"></i> Contraseña</label>
                        </div>
                        <div>
                            <button class="btn btn-default waves-effect waves-light">Entrar</button>
                            &nbsp; &nbsp; &nbsp; &nbsp; 
                         
                              <input type="checkbox" id="test5" />
                              <label for="test5" class="remember">Recordarme</label>
                            
                        </div>
                        
                    </form>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <p>
                            <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                        </p>
                        
                    </div>
                    <div class="col-sm-6">
                        <p>
                            ¿No tienes una cuenta? <a href="{{ url('/registro') }}">Regístrate ahora</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
    </div>
</section>

@endsection
