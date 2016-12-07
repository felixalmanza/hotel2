$(document).ready(function(){

	/*$('#usuario').blur(function(){
		$("#usuario").focus();
		$('#Info').html('<img src="../img/loader.gif" alt="" />').fadeOut(1000);

		var usuario = $(this).val();		
		var dataString = 'usuario='+usuario;
		
		$.ajax({
            type: "POST",
            url: "../controlador/controlador.php",
            data: dataString,
            success: function(data) {
            	console.log(data);
				$('#Info').fadeIn(1000).html(data);
				//alert(data);
            }
        });
        return false;
    });  */
    $('#formRegistro').submit(function(evente){
		evente.preventDefault();
				load();
	//var datos = 'idn='+idn+'&nom='+nombre+'&ape='+apellido+'&usuario='+usu+'&ced='+cedu+'&edad='+ed+'&correo='+email+'&pass='+passw+'&sexo='+sexo1;
	$.post('../controlador/controlador.php',$('#formRegistro').serialize(), function(data,textStatus,xhr){
		console.log(data);
		console.log(data.exito);
		if(data.exito){
			$('#formRegistro')[0].reset();
			unload();
			success(data.msg);
		}else{
			unload();
			error(data.msg);
		}
	});
	
		return false;
  });
	//formSubmit();
	formMedi();
	/*$('#formInicio').submit(function(event){
		event.preventDefault();
		load();
		var usua = $('#nombre').val()
		var passwd = $('#passq').val()
		var datos = 'nombre='+usua+'&passq='+passwd;
		$.ajax({
			type: "POST",
			url: "../controlador/controlador.php",
			data: datos,
			success: function(data){
				console.log(data);
				if(data){
				unload();
				location.href = "../vista/plataforma.php";
				}
			}
		});
		return false;
	});*/
	//Inicio();

});
/*function Inicio(){

}*/
function LimpiarCampos(){
  $('#idn').val("");
  $('#nom').val("");
  $('#ape').val("");
  $('#usuario').val("");
  $('#ced').val("");
  $('#edad').val("");
  $('#correo').val("");
  $('#pass').val("");
  $('#sexo').val("d");
}
	
//function formSubmit(){}
//Form registro medicamento
function formMedi(){
	$('#formMedicamento').submit(function(e){
		e.preventDefault();
				load();
	$.post('../controlador/controlador.php',$('#formMedicamento').serialize(), function(data,textStatus,xhr){
		console.log(data);
		if(data.exito){
			$('#formMedicamento')[0].reset();
			unload();
			success(data.msg);
		}else{
			unload();
			error(data.msg);
		}
	});
	
		
  });
	return false;
}
function load(){
	$('#msg').html('<div class="alert alert-success" role="alert" align="center"></div>');
	$('#enviar').attr('disabled','disabled');
}
function unload(){
	$('#msg').empty();
	$('#enviar').removeAttr('disabled');
}
function success(msg){
	$('#msg').html('<div class="alert alert-success" role="alert">'+msg+'</div>');
	LimpiarCampos();
}
function error(msg){
	$('#msg').html('<div class="alert alert-danger" role="alert">'+msg+'</div>');
}

/*$.ajax({
		
		url: "../controlador/controlador.php",
		type: 'POST',
		data: datos
		
		
	});
	
	/*console.log(datos);
		if(datos.exito){
			
			LimpiarCampos();
		}else{
			unload();
			error(datos.msg);
		}
		var form= $('#formRegistro')	
	var idn = $('#idn').val()
	var nombre = $('#nom').val()
	var apellido = $('#ape').val()
	var usu = $('#usuario').val()
	var cedu = $('#ced').val()
	var ed = $('#edad').val()
	var email = $('#correo').val()
	var passw = $('#pass').val()
	var sexo1 = $('#sexo').val()
		*/