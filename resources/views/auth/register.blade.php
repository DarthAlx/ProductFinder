@extends('templates.default')

@section('pagecontent')


<section class="entrar">
    <div class="container">
        <div class="row">

        <div class="col-md-6 mb-4 col-md-offset-3">
            <div>
                <div class="card-body">
                    <div class="row omb_row-sm-offset-3 social-login">
                        @if(!$userinfo)
                        <div class="col-md-8 col-md-offset-2">
                            <a href="{{url('auth/facebook')}}" class="btn btn-lg omb_btn-facebook">
                                <i class="fa fa-facebook visible-xs"></i>
                                <span class="hidden-xs">Iniciar con Facebook</span>
                            </a>
                        </div>
                        @else
                            <div  class="text-center" style="width: 100%;"><img src="{{$userinfo->getAvatar()}}" class="circle" alt=""></div>
                            <h5><strong>Por favor complete su perfil.</strong></h5>
                        @endif
                    </div>
                    <h6 class="section-title-center py-3"> <span class="secition-title-main"><i class="fa fa-user"></i> Registrarse</span></h6>

                    @if (session('status'))
                        <div class="alert alert-success alert-dismissable">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          {{ session('status') }}
                        </div>
                      @endif
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
                    <form id="signupform" class="form-horizontal" role="form" action="{{ route('register') }}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <!--Body-->

                        <input type="hidden" name="avatar" value="@if($userinfo){{$userinfo->getAvatar()}}@endif">
                        <input type="hidden" name="service_id" value="@if($userinfo){{$userinfo->getId()}}@endif">
                        <div class="md-form input-field">
                            <input type="text" name="name" id="nombre" class="form-control" value="@if($userinfo){{$userinfo->getName()}}@endif" required>
                            <label for="nombre"><i class="fa fa-user-o grey-text fa-lg"></i> Nombre completo</label>
                        </div>
                        <div class="md-form input-field">
                            
                            <input type="email" name="email" id="email" class="form-control" value="@if($userinfo){{$userinfo->getEmail()}}@endif" required>
                            <label for="email"><i class="fa fa-envelope-o grey-text fa-lg"></i> Email</label>
                        </div>
                        <div class="md-form input-field">
                            
                            <input type="text" name="dob" id="dob" class="form-control datepicker">
                            <label for="dob"><i class="fa fa-calendar grey-text fa-lg"></i> Fecha de nacimiento (opcional)</label>
                        </div>
                        <div class="md-form input-field">
                            
                            <input type="text" name="tel" id="tel" class="form-control">
                            <label for="tel"><i class="fa fa-phone grey-text fa-lg"></i> Teléfono (opcional)</label>
                        </div>
                        <label for="defaultForm-email"><i class="fa fa-venus-mars grey-text fa-lg"></i> Genero</label>
                        <div class="md-form">
                            
                        <p><input name="genero" id="masculino" type="radio" value="Masculino"  required/><label for="masculino">Masculino</label>  &nbsp;   &nbsp;   &nbsp; 
                            <input name="genero" id="femenino" type="radio" value="Femenino"  required/><label for="femenino">Femenino</label></p>
                           
                            
                        </div>
                        
                        <div class="md-form input-field">
                            
                            <input type="password" name="password" id="defaultForm-pass" class="form-control" required>
                            <label for="defaultForm-pass"><i class="fa fa-lock grey-text fa-lg"></i> Contraseña</label>
                        </div>
                        <div class="md-form input-field">
                            
                            <input type="password" name="password_confirmation" id="defaultForm-pass-confirm" class="form-control" required>
                            <label for="defaultForm-pass-confirm"><i class="fa fa-lock grey-text fa-lg"></i> Confirmar contraseña</label>
                        </div>
                        <p>
                          <input type="checkbox" id="terminosycondiciones" required/>
                          <label for="terminosycondiciones">Acepto los <a href="#">términos y condiciones</a>.</label>
                        </p>
                        <div>
                            <button class="btn btn-default waves-effect waves-light">Crear cuenta</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

@endsection