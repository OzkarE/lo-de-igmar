<?php

class MiPerfilController extends BaseController {
	public function getIndex(){
		return View::make('miperfil');
	}

	public function postSubirImagen(){
		$foto = Input::file('imagen');
		$usuario = Auth::user();
		$upload_success = $foto->move(public_path().'/imagenes', 
			$usuario->username.'.'.Input::file('imagen')->getClientOriginalExtension());
		if($upload_success) {
			$usuario->imagen = $foto->getClientOriginalExtension();
			$usuario->save();
			return Response::json('success', 200);
		}
		else {
			return Response::json('error', 400);
		}
	}
}

?>