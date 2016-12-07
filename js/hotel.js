function lista_hotel(valor){
           
           // console.log(valor)
    $.ajax({
        url:'../controlador/controlador.php',
        type:'POST',
        data:'&valor='+valor       
    }).done(function(resp){
        //console.log(resp);
        var valores = eval(resp);
        html="<table class='table table-bordered'><thead><tr><th>#</th><th>Nombre hotel</th><th># habitaciones</th><th># camas</th><th># empleados</th><th>Restaurantes</th><th>Disco</th><th>Piscina</th><th>Editar</th><th>Eliminar</th></tr></thead><tbody>";
        for(i=0;i<valores.length;i++){
            datos=valores[i][0]+"*"+valores[i][1]+"*"+valores[i][2]+"*"+valores[i][3]+"*"+valores[i][4]+"*"+valores[i][5]+"*"+valores[i][6]+"*"+valores[i][7];
            html+="<tr><td>"+(i+1)+"</td><td>"+valores[i][0]+"</td><td>"+valores[i][1]+"</td><td>"+valores[i][2]+"</td><td>"+valores[i][3]+"</td><td>"+valores[i][4]+"</td><td>"+valores[i][5]+"</td><td>"+valores[i][6]+"</td><td><button class='btn btn-warning' data-toggle='modal' data-target='#modaleditar' onclick='editar("+'"'+datos+'"'+");'><span class='glyphicon glyphicon-pencil'></span></button></td><td><button class='btn btn-danger' onclick='eliminar("+'"'+valores[i][7]+'"'+")'><span class='glyphicon glyphicon-remove'></span></button></td></tr>";
        }
        html+="</tbody></table>"
        $("#lista").html(html);
    });
}
function registrarHotel(){
	var idme = $('#idh').val()
	var hotel = $('#nom').val()
	var nombre = $('#habi').val()
	var descrip = $('#cam').val()
	var forma = $('#emp').val()
	var unidades = $('#res').val()
	var fecha = $('#dis').val()
	var pis = $('#pis').val()

	$.ajax({
		url:'../controlador/controlador.php',
		type:'POST',
		data: 'botonR=registrar'+'&idh='+idme+'&nom='+hotel+'&habi='+nombre+'&cam='+descrip+'&emp='+forma+'&res='+unidades+'&dis='+fecha+'&pis='+pis
	
	}).done(function(resp) {
		if(resp===1){
			$('#exito').show();
			lista_hotel('');
			
		}
		else{
			//alert(resp);
			$('#exito').show();
			lista_hotel('');
	
		}
	});
}
function editar(datos){
	console.log(datos);
	var d=datos.split("*");
	console.log(d);
	$('#idh1').val(d[7]);
	$('#nom1').val(d[0]);
	$('#habi1').val(d[1]);
	$('#cam1').val(d[2]);
	$('#emp1').val(d[3]);
	$('#res1').val(d[4]);
	$('#dis1').val(d[5]);
	$('#pis1').val(d[6]);

}
function actualizarHotel(){
	var datosform=$("#formEditar").serialize();
	$.ajax({
		url:'../controlador/controlador.php',
		type:'POST',
		data:datosform+'&actualizar=si'
	}).done(function(resp){
		if(resp===1){
		console.log('si')
		$('#exitoAct').show();
		lista_hotel('');
	}else{
		//console.log(resp)
		//$('#exitoAct').show();
		lista_hotel('');
	}

	})
}
function eliminar(id){
	confirmar=confirm("¿Esta seguro de que desea eliminar este hotel?");
            if(confirmar){
	$.ajax({
		url:'../controlador/controlador.php',
		type:'POST',
		data:'idh='+id+'&boton=eliminar'
	}).done(function(resp){
		if(resp === 'exito'){

		lista_hotel('');
		}else{
			lista_hotel('');
		}
		
	});
	}
}