<?php

class UserController extends \BaseController {

	/**
	 * Responde al método GET y lo que hace es cerrar sesión
	 * @return Response
	 */
	public function logout(){
		Auth::logout();
		return "cerrada sesión";
	}

	/**
	 * Responde al método POST y hace un login
	 * @return Response
	 */
	public function dologin(){
		$data     = Input::all();
		$username = $data['username'];
		$password = $data['password'];

		if (Auth::attempt(array('username' => $username, 'password' => $password))){
		    return Redirect::intended('/');
		} else {
			return Response::json(array('info' => 'Wrong username/password combination'));
		}
	}

	/**
	 * Responde al método GET y hace muestra el login
	 * @return Response
	 */
	public function login(){
		return View::make('login');
	}

	/**
	 * Muestra el usuario actualmente iniciado sesión
	 * @return json Muestra el usuario actualmente conectado
	 */
	public function logged(){
		$logged = array('username' => Auth::user()->username);
		return $logged;
	}
}
