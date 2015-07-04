$(document).ready(function() {
	var p = $("p");

	$.each(p,function(index, elemento) {
		console.log($(elemento).text());
	});

	//console.log(p);
	$("section div").click(function(){
		var div = $(this);
		/*div.css({
			"background-color":"black"
		});*/
		div.removeClass('azul').addClass('rojo');
		console.log(div);
		//$("section div").append(div.clone());
	});

	var persona = {
		nombre:null,
		apellido_paterno:null,
		pasos:0,
		caminar:function(pasos){
			//return this.pasos+1; //returns 1
			return this.pasos+=pasos.numeroPasos(); //returns 0 + the number recieved from paramater
		},
		domicilio:{
			calle:null,
			numero:0,
			datos:function(){ return this; }
		},
		datos:function(){ return this; }
	};

	var objeto = {
		paso:10,
		numeroPasos:function(){
			return this.paso;
		}
	};
	persona.nombre = "Carlos";
	persona.apellido_paterno = "Sifuentes";

	//console.log(persona.caminar(4));
	/*console.log(persona.caminar(objeto));
	objeto.paso = 100;
	console.log(persona.caminar(objeto));

	persona.domicilio.calle="Juarez";
	persona.domicilio.numero = 142;

	console.log(persona.domicilio.datos()+" - datos de domicilio de persona");
	console.log(persona.datos()+" - datos de persona");*/
});