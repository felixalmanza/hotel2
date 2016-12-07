<?php 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Lista</title>
</head>
<body onload="listar();">
<table border="1">
<tr>

	   
       
       <div id='lista'></div>



 </tr>
 </table>

<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
 <script>
 function listar(){
 $.ajax({
        url:'../modelo/session.php',
        type:'POST',
        data:'dato=list'       
    }).done(function(resp){
        console.log(resp);
        var valores = eval(resp);
        html="<table class='table table-bordered'><thead><tr><th>#</th><th>Nombre hotel</th><th># habitaciones</th><th># camas</th><th># empleados</th><th>Restaurantes</th><th>Disco</th><th>Piscina</th><th>Editar</th><th>Eliminar</th></tr></thead><tbody>";
        for(i=0;i<valores.length;i++){
            datos=valores[i][0]+"*"+valores[i][1]+"*"+valores[i][2]+"*"+valores[i][3]+"*"+valores[i][4]+"*"+valores[i][5]+"*"+valores[i][6]+"*"+valores[i][7];
            html+="<tr><td>"+(i+1)+"</td><td>"+valores[i][0]+"</td><td>"+valores[i][1]+"</td><td>"+valores[i][2]+"</td><td>"+valores[i][3]+"</td><td>"+valores[i][4]+"</td><td>"+valores[i][5]+"</td><td>"+valores[i][6]+"</td><td><button class='btn btn-warning' data-toggle='modal' data-target='#modaleditar' onclick='editar("+'"'+datos+'"'+");'><span class='glyphicon glyphicon-pencil'></span></button></td><td><button class='btn btn-danger' onclick='eliminar("+'"'+valores[i][1]+'"'+")'><span class='glyphicon glyphicon-remove'></span></button></td></tr>";
        }
        html+="</tbody></table>"
        $("#lista").html(html);
    });
       	}
       </script>
</body>
</html>

