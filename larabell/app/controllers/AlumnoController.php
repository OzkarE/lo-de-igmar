<?php
	class AlumnoController extends BaseController {
		public function registraAlumno(){
			/*//Validator rules and aplication for D_A (datos alumno)
			$rules = array(
				'nombre' => 'required',
				'apellido_paterno' => 'required',
				'apellido_materno' => 'required'
				);
			$validator = Validator::make(Input::get('D_A'), $rules);
			if ($validator->fails()) {
				return Redirect::to('/escolares/alumnos/registrar')->withErrors($validator);
			}

			//Validator rules and aplication for D_D (datos direccion)
			$rules = array(
				'numero' => 'required',
				'calle' => 'required',
				'colonia' => 'required');
			$validator = Validator::make(Input::get('D_D'), $rules);
			if ($validator->fails()){
				return Redirect::to('/escolares/alumnos/registrar')->withErrors($validator);
			}*/
			$rules = array(
				'D_A[nombre]' => 'required|min:2|max:20',
				'D_A[apellido_paterno]' => 'required',
				'D_A[apellido_materno]' => 'required',
				'D_D[numero]' => 'required|numeric',
				'D_D[calle]' => 'required',
				'D_D[colonia]' => 'required');
			$messages = array(
				'required' => 'Este campo es obligatorio',
				'numeric' => 'Este campo debe ser numerico');
			$validator = Validator::make(Input::all(), $rules, $messages);
			if ($validator->fails()) {
				return Redirect::to('/escolares/alumnos/registrar')->withErrors($validator);
			}

			//guarda direccion en BD
			$direccion = Direccion::create((array)Input::get('D_D'));
			//crea objeto alumno
			$alumno = new Alumno((array)Input::get('D_A'));
			//guarda objeto alumno con foranea de direccion en la BD
			$direccion->alumno()->save($alumno);
			$alumno->direccion;
			return View::make('regreso',array('nombre'=>$alumno->nombre,
				'apellido_paterno'=>$alumno->apellido_paterno,
				'apellido_materno'=>$alumno->apellido_materno,
				'calle'=>$direccion->calle,
				'numero'=>$direccion->numero,
				'colonia'=>$direccion->colonia));
		}

		public function getVista(){
			return View::make('Escolares.alumnos');
		}

		/*public function getAlumnos(){
			return View::make('Escolares.lista');
		}*/

	}
	/*
	$datos = array_merge((array)Input::get('D_A'),(array)Input::get(D_D));
	$rules = array('nombre' => 'required', 'numero' => 'required|numeric');
	$validacion = Validator::make($datos,$rules);
	*/
	
	/*
	paquete 3
	*/
?>