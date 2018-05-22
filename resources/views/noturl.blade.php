@extends('templates.default')


@section('header')
@endsection
@section('pagecontent')


     <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
      
      <p>&nbsp;</p><p>&nbsp;</p>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 text-center">
            <h5 style="margin: 0;">Encuentra el mejor precio</h5>
            <hr>
          </div>
        </div>


      <div class="row">

<form action="{{url()->current()}}" method="post" id="formmini" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="col-md-4 col-sm-4 col-sm-offset-4">
                

                  <div class="input-field valign-wrapper">
                    <i class="fa fa-search prefix"></i>
                    <input id="buscador" name="busqueda" type="text" value="" placeholder="Busca otro producto" class="validate" style="    border-bottom: 1px solid #9e9e9e;">
                  </div>
                 
                </div>

                
                <input type="submit" style="display: none;">
              </form>
              <script type="text/javascript">
                      $(document).ready(function() {
                        $("#formmini").submit(function(event){
                             event.preventDefault();  
                             document.getElementById('se-pre-con').style.visibility = 'visible';      

                             setTimeout(function () {
                                 document.getElementById('formmini').submit();  
                              }, 1000);      
                             
                        });
                      });
                      </script>
      </div>
    </div>










       

      




      


@endsection




@section('scripts')

<script>
  $('#formmini').submit(function(){
  $('.se-pre-con').fadeIn();
});
</script>



@endsection