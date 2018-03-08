@extends('templates.default')

@section('pagecontent')
<section class="container">
  <div class="page404Wrap">
  	@if (Session::get('mensaje'))
	  <div class="alert alert-{{ Session::get('class') }} alert-dismissable">
	    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	    <ul>
	        <li>{!! Session::get('mensaje') !!}</li>
	    </ul>
	  </div>
	@endif
    <img src="{{ url('/img') }}/404.png" alt="">
    <p>La página que buscaste no fué encontrada</p>
    <a href="{{ url('/') }}" class="homePage">Home</a>
  </div>
</section>
@endsection