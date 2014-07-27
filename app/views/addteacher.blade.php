@extends('dashboard.base')
@section('title') {{ $title }} @stop
@section('extracss')
.form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
@stop
@section('content')
	<form method="POST" action="{{ $action == 'add' ? action('teacher.doadd') : action('teacher.doedit', $id) }}" class="form-signin" role="form">
		<div class="form-group">
		    <label for="image">Foto</label>
			<input type="text" class="form-control" id="image" name="image" value="{{ $teacher['image'] or '' }}" placeholder="http://algunaimagen.jpg">
		</div>
		<div class="form-group">
		    <label for="nombre">Nombre</label>
			<input type="text" class="form-control" id="nombre" name="name" value="{{ $teacher['name'] or '' }}" placeholder="Eduardo">
		</div>
		<div class="form-group">
		    <label for="apellido">Apellido</label>
			<input type="text" class="form-control" id="apellido" name="last_name" value="{{ $teacher['last_name'] or '' }}" placeholder="Olave">
		</div>
		<div class="form-group">
		    <label for="apodo">Apodo</label>
			<input type="text" class="form-control" id="apodo" name="nickname" value="{{ $teacher['nickname'] or '' }}" placeholder="Sin apodo">
		</div>
		<div class="form-group">
		    <label for="metologia">Metodología</label>
			<textarea type="text" class="form-control" id="metologia" name="methodology" placeholder="Es uno de los profesores mejor evaluados, a pesar de ser algo desordenado a veces en sus clases, sus secciones suelen ser las con mejor promedio...">{{ $teacher['methodology'] or '' }}</textarea>
		</div>
		<div class="form-group">
		    <label for="studies">Estudios</label>
			<textarea type="text" class="form-control" id="studies" name="studies" placeholder='"Estudió Ingeniería civil Industrial en la Universidad Católica"'>{{ $teacher['studies'] or '' }}</textarea>
		</div>
		<div class="form-group">
		    <label for="publications">Publicaciones / Investigaciones</label>
			<textarea type="text" class="form-control" id="publications" name="publications" placeholder='"Ha publicado en tal y tal revista"'>{{ $teacher['publications'] or '' }}</textarea>
		</div>
		<div class="form-group">
		    <label for="frases">Frases Célebres</label>
			<textarea type="text" class="form-control" id="frases" name="phrases" placeholder='"Miren con todo el código matlab que tengo que trabajar..."'>{{ $teacher['phrases'] or '' }}</textarea>
		</div>
		<div class="form-group">
		    <label for="freak">Datos Freak</label>
			<textarea type="text" class="form-control" id="freak" name="freak" placeholder="Vive más cerca de viña que de santiago"> {{ $teacher['freak'] or '' }} </textarea>
		</div>
		<button class="btn btn-lg btn-primary btn-block" type="submit">{{ $title }}</button>
	</form>
@stop