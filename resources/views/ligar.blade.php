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
                    <input id="buscador" name="busqueda" type="text" value="{{$busqueda or ''}}" placeholder="Busca producto" class="validate" style="    border-bottom: 1px solid #9e9e9e;">
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

   


@endsection

