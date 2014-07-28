@extends('base')
@section('title') Profesor {{{ $name }}} {{{ $last_name }}} @stop

@section('content')
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&appId=100247193450924&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	<img src="{{ strlen($image) > 0 ? $image : 'http://www.columbiamedicine.org/divisions/gharavi/images/people/no-photo.jpg' }}" width="200" height="200" /><br>
	<h2>{{{ $name }}} {{{$last_name}}} ( {{{ $nickname }}} )</h2><hr>
	<h3>Metodología</h3>
	<p>{{{ $methodology }}}</p><hr>
	<h3>Estudios</h3>
	<p>{{{ $studies }}}</p><hr>
	<h3>Publicaciones e Investigaciones</h3>
	<p>{{{ $publications }}}</p><hr>
	<h3>Fraces Típicas / Célebres</h3>
	<p>{{{ $phrases }}}</p><hr>
	<h3>Datos Freak</h3>
	<p>{{{ $freak }}}</p><hr>

	<div class="fb-like" data-href="{{ url('/profesores', $id) }}" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div><br>

	<div class="fb-comments" href="{{ url('/profesores', $id) }}" width="600px" data-numposts="6" data-colorscheme="light"></div>
@stop