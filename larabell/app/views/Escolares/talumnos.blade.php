@extends('plantillas.interno')

@section('stylesheets')
<!-- add datatables bootstrap stylesheet -->
<link rel="stylesheet" href="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.css">
<style type="text/css">
	.selected{
		background-color: green;
	}
</style>
@stop

@section('cabecera_contenido')
<!-- PENDING ADDITION OF JQUERY VALIDATION -->
<h1>
  Control estudiantil
  <small>Alumnos</small>
</h1>
<ol class="breadcrumb">
  <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Dashboard</li>
</ol>
@stop

@section('contenido')
<div class="row">
	<div class="col-md-12">
		<!-- 900-1331 lines in data.html 
		borar contenido de etiqueta table y agregar id="T_Alumnos"
		poner en la tabla todo el contenido de un alumno
		thead>tr class="info">th*(numero de columnas que involucra un alumno) -->
		<table class="table table-striped table-bordered" id="tabla">
			<thead>
				<tr class="info">
					<th>Nombre</th>
					<th>Apellido Paterno</th>
					<th>Apellido Materno</th>
					<th>Calle</th>
					<th>Numero</th>
					<th>Colonia</th>
				</tr>
			</thead>
		</table>
		<!-- Button trigger modal -->
<button id="btn_actualizar" type="button" class="btn btn-primary btn-lg">
  Actualizar
</button>
<button class="btn btn-danger btn-lg" id="btn_eliminar">Eliminar</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
	<div class="modal-dialog" role="document">
	    <div class="modal-content">
	      	<div class="modal-header">
	        	<!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
	        	<h4 class="modal-title" id="myModalLabel">Actualizar</h4>
	      	</div>
	      	<div class="modal-body"><!-- modal body -->
	        	<form method="post">
	        		<div class="form-group"><!-- form group -->
			          <label for="D_P[nombre]">Nombre:</label>
			          <div class="input-group"><!-- input group -->
			            <div class="input-group-addon">
			              <i class="fa fa-bold"></i>
			            </div>
			            <input type="text" class="form-control" name="D_P[nombre]" id="nombre"/>
			          </div><!-- /.input group -->
			          {{'<span class="text-danger">'.$errors->first('D_P[nombre]').'</span>'}}
			        </div><!-- /.form group -->
			        <div class="form-group"><!-- form group -->
			          <label for="D_P[apellido_paterno]">Apellido paterno:</label>
			          <div class="input-group"><!-- input group -->
			            <div class="input-group-addon">
			              <i class="fa fa-bold"></i>
			            </div>
			            <input type="text" class="form-control" name="D_P[apellido_paterno]" id="apellido_paterno"/>
			          </div><!-- /.input group -->
			          {{'<span class="text-danger">'.$errors->first('D_P[apellido_paterno]').'</span>'}}
			        </div><!-- /.form group -->
			        <div class="form-group"><!-- form group -->
			          <label for="D_P[apellido_materno]">Apellido materno:</label>
			          <div class="input-group"><!-- input group -->
			            <div class="input-group-addon">
			              <i class="fa fa-bold"></i>
			            </div>
			            <input type="text" class="form-control" name="D_P[apellido_materno]" id="apellido_materno"/>
			          </div><!-- /.input group -->
			          {{'<span class="text-danger">'.$errors->first('D_P[apellido_materno]').'</span>'}}
			        </div><!-- /.form group -->
			        <div class="form-group"><!-- form group -->
			          <label for="D_D[calle]">Calle:</label>
			          <div class="input-group"><!-- input group -->
			            <div class="input-group-addon">
			              <i class="fa fa-bold"></i>
			            </div>
			            <input type="text" class="form-control" name="D_D[calle]" id="calle"/>
			          </div><!-- /.input group -->
			          {{'<span class="text-danger">'.$errors->first('D_D[calle]').'</span>'}}
			        </div><!-- /.form group -->
			        <div class="form-group"><!-- form group -->
			          <label for="D_D[numero]">Numero:</label>
			          <div class="input-group"><!-- input group -->
			            <div class="input-group-addon">
			              <i class="fa fa-bold"></i>
			            </div>
			            <input type="text" class="form-control" name="D_D[numero]" id="numero"/>
			          </div><!-- /.input group -->
			          {{'<span class="text-danger">'.$errors->first('D_D[numero]').'</span>'}}
			        </div><!-- /.form group -->
			        <div class="form-group"><!-- form group -->
			          <label for="D_D[colonia]">Colonia:</label>
			          <div class="input-group"><!-- input group -->
			            <div class="input-group-addon">
			              <i class="fa fa-bold"></i>
			            </div>
			            <input type="text" class="form-control" name="D_D[colonia]" id="colonia"/>
			          </div><!-- /.input group -->
			          {{'<span class="text-danger">'.$errors->first('D_D[colonia]').'</span>'}}
			        </div><!-- /.form group -->
	        	</form>
	      	</div><!-- /.modal body -->
	      	<div class="modal-footer">
	        	<button id="btn_cancelar" type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
	       	 	<button id="btn_guardar" type="button" class="btn btn-primary">Actualizar</button>
	    	</div>
	   	</div>
  	</div>
</div><!-- /.myModal -->
<!-- modal error -->
<div class="modal fade" id="modalError" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
	    <div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        	<h4 class="modal-title" id="myModalLabel">Error</h4>
	      	</div>
	      	<div class="modal-body">
	        	<h1>Selecciona un alumno para actualizar</h1>
	      	</div><!-- modal body -->
	      	<div class="modal-footer">
	       	 	<button type="button" data-dismiss="modal" class="btn btn-primary">Ok</button>
	    	</div>
	   	</div><!-- modal body -->
  	</div>
</div>
<!-- /.modal error -->

<!-- modal actualizado -->
<div class="modal fade" id="modalActualizado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
	    <div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        	<h4 class="modal-title" id="myModalLabel">Exito</h4>
	      	</div>
	      	<div class="modal-body">
	        	<h1>Alumno actualizado</h1>
	      	</div><!-- modal body -->
	      	<div class="modal-footer">
	       	 	<button type="button" data-dismiss="modal" class="btn btn-primary">Ok</button>
	    	</div>
	   	</div><!-- modal body -->
  	</div>
</div>
<!-- /.modal actualizado -->

<!-- modal eliminar -->
<div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
	    <div class="modal-content">
	      	<div class="modal-header">
	        	<h4 class="modal-title" id="myModalLabel">Esta seguro que desea eliminar?</h4>
	      	</div>
	      	<div class="modal-body">
	        	<div class="modal-body"><!-- modal body -->
	        	<form method="post">
	        		<div class="form-group"><!-- form group -->
			          <label for="D_P[nombre]">Nombre:</label>
			          <div class="input-group"><!-- input group -->
			            <div class="input-group-addon">
			              <i class="fa fa-bold"></i>
			            </div>
			            <input type="text" class="form-control" name="D_P[nombre]" id="eliminarNombre" disabled/>
			          </div><!-- /.input group -->
			        </div><!-- /.form group -->
			        <div class="form-group"><!-- form group -->
			          <label for="D_P[apellido_paterno]">Apellido paterno:</label>
			          <div class="input-group"><!-- input group -->
			            <div class="input-group-addon">
			              <i class="fa fa-bold"></i>
			            </div>
			            <input type="text" class="form-control" name="D_P[apellido_paterno]" id="eliminarApellido_paterno" disabled/>
			          </div><!-- /.input group -->
			        </div><!-- /.form group -->
			        <div class="form-group"><!-- form group -->
			          <label for="D_P[apellido_materno]">Apellido materno:</label>
			          <div class="input-group"><!-- input group -->
			            <div class="input-group-addon">
			              <i class="fa fa-bold"></i>
			            </div>
			            <input type="text" class="form-control" name="D_P[apellido_materno]" id="eliminarApellido_materno" disabled/>
			          </div><!-- /.input group -->
			        </div><!-- /.form group -->
			        <div class="form-group"><!-- form group -->
			          <label for="D_D[calle]">Calle:</label>
			          <div class="input-group"><!-- input group -->
			            <div class="input-group-addon">
			              <i class="fa fa-bold"></i>
			            </div>
			            <input type="text" class="form-control" name="D_D[calle]" id="eliminarCalle" disabled/>
			          </div><!-- /.input group -->
			        </div><!-- /.form group -->
			        <div class="form-group"><!-- form group -->
			          <label for="D_D[numero]">Numero:</label>
			          <div class="input-group"><!-- input group -->
			            <div class="input-group-addon">
			              <i class="fa fa-bold"></i>
			            </div>
			            <input type="text" class="form-control" name="D_D[numero]" id="eliminarNumero" disabled/>
			          </div><!-- /.input group -->
			        </div><!-- /.form group -->
			        <div class="form-group"><!-- form group -->
			          <label>Colonia:</label>
			          <div class="input-group"><!-- input group -->
			            <div class="input-group-addon">
			              <i class="fa fa-bold"></i>
			            </div>
			            <input type="text" class="form-control" id="eliminarColonia" disabled/>
			          </div><!-- /.input group -->
			        </div><!-- /.form group -->
	        	</form>
	      	</div><!-- /.modal body -->
	      	</div><!-- modal body -->
	      	<div class="modal-footer">
	       	 	<button id="eliminarSI" type="button" class="btn btn-success">Si</button>
	       	 	<button id="eliminarNO" type="button" data-dismiss="modal" class="btn btn-primary">No</button>
	    	</div>
	   	</div><!-- modal body -->
  	</div>
</div>
<!-- /.modal eliminar -->
	</div>
</div>
@stop

@section('scripts')
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function() {
    	var tablita = $('#tabla').dataTable( {
	        "processing": true,
	        "serverSide": false,
	        "ajax": {
	            "url": "/escolares/talumnos",
	            "type": "POST"
	        },
	        "columns": [
	            { "data": "nombre" },
	            { "data": "apellido_paterno" },
	            { "data": "apellido_materno" },
	            { "data": "direccion.calle" },
	            { "data": "direccion.numero" },
	            { "data": "direccion.colonia" }
	        ]
    	} );
    	var alumno=null;
    	$('#tabla tbody').on('click', 'tr', function(event) {
    		if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                tablita.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
            alumno = tablita.fnGetData(this);
            $('#nombre').val(alumno.nombre);
	    	$('#apellido_paterno').val(alumno.apellido_paterno);
	    	$('#apellido_materno').val(alumno.apellido_materno);
	    	$('#calle').val(alumno.direccion.calle);
	    	$('#numero').val(alumno.direccion.numero);
	    	$('#colonia').val(alumno.direccion.colonia);
    	});

    	$("#btn_actualizar").click(function(event) {
    		event.preventDefault();
    		if(alumno){
    			$("#myModal").modal("toggle");
    		}
    		else{
    			$('#modalError').modal('toggle');
    		}
    	});
    	$('#btn_eliminar').click(function(event) {
    		if(alumno){
    			$('#eliminarNombre').val(alumno.nombre);
    			$('#eliminarApellido_paterno').val(alumno.apellido_paterno);
	    		$('#eliminarApellido_materno').val(alumno.apellido_materno);
		    	$('#eliminarCalle').val(alumno.direccion.calle);
		    	$('#eliminarNumero').val(alumno.direccion.numero);
		    	$('#eliminarColonia').val(alumno.direccion.colonia);
    			$('#modalEliminar').modal('toggle');
    		}
    		else{
    			$('#modalError').modal('toggle');
    		}
    	});

    	$('#eliminarSI').click(function(event) {
    		event.preventDefault();
    		// ajax para eliminar
    		$.ajax({
    			url: '/escolares/talumnos/eliminar',
    			data: {
    				idAlumno: alumno.id,
    				idDireccion: alumno.direccion_id
    			},
    			method: 'POST',
    			success: function(data){
    				$('#modalEliminar').modal('toggle');
    				$('#modalActualizado').modal('toggle');
    				alumno = null;
    				console.log(data);
    			}
    		});
    	});
    	$('#eliminarNO').click(function(event) {
    		event.preventDefault();
    		alumno=null;
    		$('#modalEliminar').modal('toggle');
    	});

    	$('#btn_cancelar').click(function(event) {
    		alumno=null;
    	});

    	$('#btn_guardar').click(function(event) {
    		var alumnoNvo={
    			nombre: $('#nombre').val(),
    			apellido_paterno: $('#apellido_paterno').val(),
    			apellido_materno: $('#apellido_materno').val(),
    			direccion: {
    				calle: $('#calle').val(),
	    			numero: $('#numero').val(),
	    			colonia: $('#colonia').val(),
	    			id: alumno.direccion.id
    			},
    			id: alumno.id,
    			direccion_id: alumno.direccion_id
    		};
    		$.ajax({
    			url: '/escolares/talumnos/actualizar',
    			data: {
    				alumno: alumno,
    				alumnoNvo: alumnoNvo
    			},
    			method: 'POST',
    			success: function(data){
    				$('#myModal').modal('toggle');
    				$('#modalActualizado').modal('toggle');
    				alumno = null;
    				console.log(data);
    			}
    		});
    		
    	});
	} );
</script>
<!-- add datatables scripts 
copy datatable script from data.html
"sAjaxSource":"/some/route" in datatables config json  to a route to method in AlumnoController
"sServerMethod":"POST"
"sAjaxDataProp":"data"
"aoColumns": [
{"mData":"nombre"},
{"mData":"apellido_paterno"},
{"mData":"direccion.calle"}
]
in AlumnoController: return array("data"=>Alumno::with('Direccion')->get()); -->
@stop