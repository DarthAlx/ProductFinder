@extends('templates.default')


@section('header')
@endsection
@section('pagecontent')
@php
$items=Cart::content();
@endphp

     <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
      
      <p>&nbsp;</p><p>&nbsp;</p>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 text-center">
            <h5 style="margin: 0;">Tus favoritos</h5>
            <hr>
          </div>
        </div>


      <div class="row">
          

        <div class="col-md-4 col-md-offset-4">
                <form action="{{url('/buscar')}}" method="post" style="width: 100%;">
                  {{ csrf_field() }}

                  <div class="input-field valign-wrapper">
                    <i class="fa fa-search prefix"></i>
                    <input id="buscador" name="busqueda" type="text" value="{{$busqueda}}" placeholder="Busca otro producto" class="validate" style="    border-bottom: 1px solid #9e9e9e;">
                  </div>
                  </form>
                </div>

                
      </div>


        <div class="row">

          <div class="col-md-12 text-center">

                  <h4>Aún no has agregado favoritos.</h4>
          </div>
        </div>
      </div>







       

      




      


@endsection




@section('scripts')



@endsection