@extends('base')
@section('title') Login @stop
@section('extracss')
	.form-signin {
	  max-width: 330px;
	  padding: 15px;
	  margin: 0 auto;
	}
	.form-signin .form-signin-heading,
	.form-signin .checkbox {
	  margin-bottom: 10px;
	}
	.form-signin .checkbox {
	  font-weight: normal;
	}
	.form-signin .form-control {
	  position: relative;
	  height: auto;
	  -webkit-box-sizing: border-box;
	     -moz-box-sizing: border-box;
	          box-sizing: border-box;
	  padding: 10px;
	  font-size: 16px;
	}
	.form-signin .form-control:focus {
	  z-index: 2;
	}
	.form-signin input[type="email"] {
	  margin-bottom: -1px;
	  border-bottom-right-radius: 0;
	  border-bottom-left-radius: 0;
	}
	.form-signin input[type="password"] {
	  margin-bottom: 10px;
	  border-top-left-radius: 0;
	  border-top-right-radius: 0;
	}
@stop
@section('content')
	<form method="POST" action="{{ action('dologin') }}" class="form-signin" role="form">
		<h2 class="form-signin-heading">Iniciar Sesión</h2>
		<input type="text" name="username" placeholder="Nombre Usuario" required autofocus class="form-control" />
		<input type="password" name="password" placeholder="Contraseña"required class="form-control" />
		<button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
	</form>
@stop