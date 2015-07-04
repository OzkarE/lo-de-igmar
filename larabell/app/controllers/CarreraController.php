<?php
class CarreraController extends BaseController{
	public function getCarreras(){
		return Carrera::all();
	}
}
?>