@extends('plantillas.interno')

@section('stylesheets')
<link rel="stylesheet" href="/packages/plugins/dropzone/basic.min.css">
<link rel="stylesheet" href="/packages/plugins/dropzone/dropzone.min.css">
@stop

@section('cabecera_contenido')
<h1>Mi Perfil</h1>
@stop

@section('contenido')
<form action="/miperfil/subir-imagen" method="POST" class="dropzone" id="dropzoneImagen"></form>
@stop

@section('scripts')
<script src="/packages/plugins/dropzone/dropzone.min.js"></script>
<script>
	$(document).ready(function() {
		$("#dropzoneImagen").dropzone({
			url: "/miperfil/subir-imagen",
			paramName: "imagen",
			dictDefaultMessage: "<h3>Arrastre su imagen aqui</h3>",
			dictFallbackMessage: "Su navegador no soporta subir imagenes mediante drag'n'drop"
		});
	});
</script>
@stop