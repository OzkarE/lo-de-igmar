<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//Route::get('/',function(){ return "Trabajando...."; });
//Route::get('/',function(){ return View::make('jscript'); });



Route::get('/',function(){ 
	if (Auth::check()) {
		return Redirect::to('/raiz');
	}
	return View::make('login'); 
});
Route::post('/logIn','UsuarioController@validacion');

Route::group(array('before' => 'auth'), function() {
	Route::get('/raiz',function(){ return View::make('raiz'); });
	
	Route::controller('/escolares/talumnos','TAlumnosController');
	Route::post('/escolares/carreras','CarreraController@getCarreras');

	Route::get('/escolares/alumnos/registrar','AlumnoController@getVista');

	Route::post('/escolares/alumnos/registro', 'AlumnoController@registraAlumno');

	//Route::post('/miperfil/subir-imagen','MiPerfilController@postSubirImagen');
	Route::controller('/miperfil', 'MiPerfilController');

	Route::controller('/profesores/alta', 'InsertaProfesorController');

	Route::get('/logOut','UsuarioController@logout');
	/*Route::get('/miPerfil','MiPerfilController@getVista');
	//subida de la imagen de perfil
	Route::post('/miPerfil/subirImagen','MiPerfilController@subirImagen');*/
});
?>