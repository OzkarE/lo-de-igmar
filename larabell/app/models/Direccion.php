<?php
class Direccion extends Eloquent{
	protected $table='direcciones';

	protected $fillable = array('numero','calle','colonia');
	
	public function alumno(){
		return $this->hasOne('Alumno','direccion');
	}
}
?>