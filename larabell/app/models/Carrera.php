<?php
class Carrera extends Eloquent{
	protected $table = "carreras";

	public function alumno(){
		return $this->hasMany('Alumno','carrera');
	}
}
?>