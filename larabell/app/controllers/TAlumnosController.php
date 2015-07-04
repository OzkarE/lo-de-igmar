<?php

class TAlumnosController extends BaseController{
	public function getIndex(){
		return View::make('Escolares.talumnos');
	}
	//Informacion de la tabla
	public function postIndex(){
		return array('data' => Alumno::with('Direccion')->get());
	}
	public function postActualizar(){
		/*
		* Aqui hace falta mandar el correo con los datos del
		* alumno, por eso existe alumno (datos viejos) y alumnoNvo (datos nuevos)
		*/

		/*
		* Aqui hace la actualizacion del alumno en la BD
		*/
		$alumno = Alumno::find(Input::get('alumno.id'));
		$alumno->nombre = Input::get('alumnoNvo.nombre');
		$alumno->apellido_paterno = Input::get('alumnoNvo.apellido_paterno');
		$alumno->apellido_materno = Input::get('alumnoNvo.apellido_materno');
		$alumno->save();

		$direccion = Direccion::find(Input::get('alumno.direccion_id'));
		$direccion->id = Input::get('alumnoNvo.direccion.id');
		$direccion->calle = Input::get('alumnoNvo.direccion.calle');
		$direccion->numero = Input::get('alumnoNvo.direccion.numero');
		$direccion->colonia = Input::get('alumnoNvo.direccion.colonia');
		$direccion->save();

		return $direccion;
	}
	public function postEliminar(){
		Alumno::destroy(Input::get('idAlumno'));
		Direccion::destroy(Input::get('idDireccion'));
		return Input::all();
	}
}

?>