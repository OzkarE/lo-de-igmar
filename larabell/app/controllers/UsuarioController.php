<?php

class UsuarioController extends BaseController{
	public function validacion(){
		//para crear un usuario en la BD
		/*
		$usuario = new User();
		$usuario->username = Input::get('usuario');
		$usuario->password = Hash::make(Input::get('contra'));
		$usuario->save();
		return Redirect::back();
		*/
		$datos = array(
			'username' => Input::get('usuario'),
			'password' => Input::get('contra'));
		if (Auth::attempt($datos)) {
			//Auth::logout();
			return Redirect::to('/raiz');
		}
		else{
			//return Redirect::back();
			return Redirect::to('/');
		}
	}

	public function logout(){
		Auth::logout();
		return Redirect::to('/');
	}
}

?>