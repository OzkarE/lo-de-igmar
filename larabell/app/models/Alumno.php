<?php
	class Alumno extends Eloquent{
		protected $table='alumnos';

		protected $fillable = array('nombre','apellido_materno','apellido_paterno');

		public function direccion(){
			return $this->belongsTo('Direccion','direccion_id');
		}

		public function carrera(){
			return $this->belongsTo('Carrera','carrera');
		}
	}
?>