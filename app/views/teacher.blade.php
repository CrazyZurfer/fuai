@extends('base')
@section('title') Profesor {{{ $name }}} {{{ $last_name }}} @stop

@section('content')
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
@stop