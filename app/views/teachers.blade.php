@extends('dashboard.base')
@section('title') Listado Profesores @stop
@section('content')
	<table class="table table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>apodo</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
		<?php $i = 1; ?>
      	@foreach($teachers as $teacher)
        <tr>
          <td>{{ $i++ }}</td>
          <td>{{ $teacher['name'] }}</td>
          <td>{{ $teacher['last_name'] }}</td>
          <td>{{ $teacher['nickname'] or '' }}</td>
          <td><a class="btn btn-info" href="/profesores/editar/{{ $teacher['id'] }}">Editar</a> <a class="btn btn-danger" href="/eliminar/{{$teacher['id']}}">Eliminar</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
@stop