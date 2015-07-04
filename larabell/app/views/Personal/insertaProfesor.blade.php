@extends('plantillas.interno')
@section('cabecera_contenido')
<!-- PENDING ADDITION OF JQUERY VALIDATION -->
<h1>
  Control de Personal
  <small>Profesores</small>
</h1>
<ol class="breadcrumb">
  <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Dashboard</li>
</ol>
@stop
@section('contenido')
<div class="row">
  <div class="col-md-12">
    <div class="box box-danger">
      <div class="box-header">
        <h3 class="box-title">Datos del profesor</h3>
      </div>
      <div class="box-body">
        <form action="/profesores/alta/insertar" method="POST" id="frm_alumno" accept-charset="utf-8">
        
        <div class="form-group">
          <label for="nombre">Nombre:</label>
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-bold"></i>
            </div>
            <input type="text" class="form-control" name="D_P[nombre]" id="nombre" minLength="2" maxLength="20"/>
          </div><!-- /.input group -->
          {{'<span class="text-danger">'.$errors->first('D_P[nombre]').'</span>'}}
        </div><!-- /.form group -->
        
        <div class="form-group">
          <label for="apellido_paterno">Apellido Paterno</label>
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-bold"></i>
            </div>
            <input type="text" class="form-control" name="D_P[apellido_paterno]" id="apellido_paterno"/>
          </div><!-- /.input group -->
          {{'<span class="text-danger">'.$errors->first('D_P[apellido_paterno]').'</span>'}}
        </div><!-- /.form group -->
        <div class="form-group">
          <label for="apellido_materno">Apellido materno:</label>
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-bold"></i>
            </div>
            <input type="text" class="form-control" name="D_P[apellido_materno]" id="apellido_materno"/>
          </div><!-- /.input group -->
          {{'<span class="text-danger">'.$errors->first('D_P[apellido_materno]').'</span>'}}
        </div><!-- /.form group -->

        <div class="form-group">
          <label for="numero">Numero</label>
          <div class="input-group  col-md-3">
            <div class="input-group-addon">
              <i class="fa fa-bold"></i>
            </div>
            <input type="text" class="form-control" name="D_D[numero]" id="numero">
          </div><!-- /.input group -->
          {{'<span class="text-danger">'.$errors->first('D_D[numero]').'</span>'}}
        </div><!-- /.form group -->
        <div class="form-group">
          <label for="calle">Calle</label>
          <div class="input-group col-md-5">
            <div class="input-group-addon">
              <i class="fa fa-bold"></i>
            </div>
            <input type="text" class="form-control" name="D_D[calle]" id="calle">
          </div><!-- /.input group -->
          {{'<span class="text-danger">'.$errors->first('D_D[calle]').'</span>'}}
        </div><!-- /.form group -->
        <div class="form-group">
          <label for="colonia">Colonia</label>
          <div class="input-group col-md-4">
            <div class="input-group-addon">
              <i class="fa fa-bold"></i>
            </div>
            <input type="text" class="form-control" name="D_D[colonia]" id="colonia">
          </div><!-- /.input group -->
          {{'<span class="text-danger">'.$errors->first('D_D[colonia]').'</span>'}}
        </div><!-- /.form group -->
        
        <div class="box-footer clearfix">
          <button id="sendEmail" type="submit" class="pull-right btn btn-default">Finalizar</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
@stop
@section('scripts')
<!-- jquery Validation -->
<script src="/packages/plugins/jquery-validation/jquery.validate.min.js" type="text/javascript"></script>
<!-- traduccion al español de jquery validation -->
<script src="/packages/plugins/jquery-validation/localization/messages_es.min.js" text="text/javascript"></script>
<script>
  $(document).on('ready',function(){
    /*
    $.post("/escolares/carreras","",
      function(data){
        //console.log(data);
        var sel = $("#carrera");
        $.each(data, function(idx,obj){
          sel.append('<option value="' + obj.id + '">' + obj.nombre + '</option>');
        });
      });*/

    $("#frm_alumno").validate({
      rules: {
        "D_P[nombre]": {
          required: true,
          minlength: 2,
          maxlength: 60
        },
        "D_P[apellido_paterno]": {
          required: true,
          minlength: 2,
          maxlength: 60
        },
        "D_P[apellido_materno]": {
          required: true,
          minlength: 2,
          maxlength: 60
        },
        "D_D[numero]": {required: true, number: true},
        "D_D[calle]": {
          required: true,
          maxlength: 60
        },
        "D_D[colonia]": {
          required: true,
          maxlength: 50
        }
      },
      highlight: function(element) {
        $(element).closest('.form-group').addClass('has-error');
      },
      unhighlight: function(element) {
          $(element).closest('.form-group').removeClass('has-error');
      },
      errorElement: 'span',
      errorClass: 'help-block',
      errorPlacement: function(error, element) {
          if(element.parent('.input-group').length) {
              error.insertAfter(element.parent());
          } else {
              error.insertAfter(element);
          }
      }
    });
  });
</script>
@stop