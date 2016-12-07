  function cerrar()
        {
            confirmar=confirm("¿Esta seguro de que desea cerrar session?");
            if(confirmar){
            $.ajax({
                url:'../controlador/controlador.php',
                type:'POST',
                data:"mensaje=mensaje&boton=cerrar"
            }).done(function(resp){
                console.log(resp)

                //alert(resp);
                if(resp==0){
                    console.log('Cerro Session corectamente');
                    location.href='../vista/index.php';
                }else {
                    console.log('Ocurrio Algo');
                }
            });
            }
        }
function confirmar(){
			var usuario = $('#nombre_usuario').val();
			var passwd = $('#passq').val();
			$.ajax({
				url:'../controlador/controlador.php',
				type:'POST',
				data:'nombre='+usuario+'&passq='+passwd+"&boton=ingresar"
			}).done(function(resp){
				if(resp==0){
                    console.log(resp);
					$('#error').show();
				}else{
                    console.log(resp)
					location.href='../vista/busqueda.php'
				}
			})
		}
    function registrar(){
            var idn = $('#idn').val()
            var nombre = $('#nom').val()
            var apellido = $('#ape').val()
            var usu = $('#usuario').val()
            var cedu = $('#ced').val()
            var ed = $('#edad').val()
            var email = $('#correo').val()
            var passw = $('#pass').val()
            var pass2 =$('#pass2').val()
            var sexo1 = $('#sexo').val()


            
              if(nombre==='' || apellido ==='' || usu==='' || cedu==='' || usu==='' || ed==='' || email ===''||passw===''){
                  $('#error2').show();
              }else if (passw!=pass2){
                alert('Debe introducir la misma contraseña');
            }else{
                 
                $.ajax({
                    url:'../controlador/controlador.php',
                    type:'POST',
                    data: 'idn='+idn+'&nom='+nombre+'&ape='+apellido+'&usuario='+usu+'&ced='+cedu+'&edad='+ed+'&correo='+email+'&pass='+passw+'&sexo='+sexo1
                }).done(function(respuesta){
                    if (respuesta=='exito') {
                        $('#exito').show();
                        $('#error2').empty();
                    }
                    else{
                        //alert(respuesta);
                        $('#exito').show();
                        $('#error2').empty();
                    }
                    
                });
            
          }
           
            
        }