@extends((Auth::check()) ? 'dashboard.base' : 'base')
@section('title') Listado Profesores @stop
@section('content')
	<form method="GET" action="{{ action('teacher.list') }}" class="row">

		<div class="col-md-9"><input type="search" name="search" autofocus class="form-control" placeholder="Nombre o Apellido del profesor..." /></div>
		<div class="col-md-3"><button class="btn btn-primary" type="submit">Buscar</button></div>
	</form>
	<table class="table table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>apodo</th>
          {{ Auth::check() ? '<th>Acciones</th>' : '' }}
        </tr>
      </thead>
      <tbody>
		<?php $i = 1; ?>
      	@foreach($teachers as $teacher)
      	<?php $id = $teacher['id']; ?>
        <tr>
          <td>{{ $i++ }}</td>
          <td><a href="/profesores/{{$id}}">{{ $teacher['name'] }}</a></td>
          <td><a href="/profesores/{{$id}}">{{ $teacher['last_name'] }}</a></td>
          <td><a href="/profesores/{{$id}}">{{ $teacher['nickname'] or '' }}</a></td>
          {{ Auth::check() ? '<td><a class="btn btn-info" href="/profesores/editar/'.$id.'">Editar</a> <a class="btn btn-danger" href="/eliminar/'.$id.'">Eliminar</a></td>' : '' }}
        </tr>
        @endforeach
      </tbody>
    </table>
@stop