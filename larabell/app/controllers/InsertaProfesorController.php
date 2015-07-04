<?php

class InsertaProfesorController extends BaseController{
	public function getIndex(){
		return View::make('Personal.insertaProfesor');
	}

	public function postInsertar(){
		$rules = array(
			'D_P[nombre]' => 'required|min:2|max:60',
			'D_P[apellido_paterno]' => 'required|max:60',
			'D_P[apellido_materno]' => 'required|max:60',
			'D_D[numero]' => 'required|numeric',
			'D_D[calle]' => 'required|max:60',
			'D_D[colonia]' => 'required|max:50');
		$messages = array(
			'required' => 'Este campo es obligatorio',
			'numeric' => 'Este campo debe ser numerico');
		$validator = Validator::make(Input::all(), $rules, $messages);
		if ($validator->fails()) {
			return Redirect::to('/profesores/alta')->withErrors($validator);
		}
		else{
			return Redirect::to('/raiz');
		}
	}
}

?>