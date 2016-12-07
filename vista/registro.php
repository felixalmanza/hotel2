<!DOCTYPE html>
    <html >
    <head>
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/funciones.js"></script>
   <meta charset="utf-8">
  
        <title>Registro</title>
        <link rel="stylesheet" type="text/css" href="../css/css.css">
        <link href="../css/bootstrap-responsive.css" rel="stylesheet">
  
    <!-- Custom CSS -->
    <link href="../css/dist/css/sb-admin-2.css" rel="stylesheet">
   <!-- Custom Fonts -->
    <link href="../css/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
     
    
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link href="../css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/msg.css">
</head>
<body>
<div class="container" >
        <div class="wrap" align="center">
                        <h2 class="text-success" >Registro</h2>
                   
                    <form name="formulario_registro" id="formRegistro" class="form-signin" method="post">
                   
                         
                         <input type="hidden"  name="idn" id="idn" autocomplete="off" required value="<?php echo rand();?>"><br>
                         <strong>Nombre</strong><br>
                         <input type="text"  name="nom" id="nom" autocomplete="off" required value=""><br>
                         <strong>Apellido</strong><br>
                         <input type="text" name="ape" id="ape" autocomplete="off" required value=""><br>   
                         <strong>Usuario</strong><br>
                         <input type="text" name="usuario" id="usuario" autocomplete="off" required value=""><label  id="Info"></label><br>
                         <strong>Cedula</strong><br>
                         <input type="text" name="ced" id="ced" autocomplete="off" required value=""><br>
                         <strong>Edad</strong><br>
                         <input type="text" name="edad" id="edad" autocomplete="off" required value=""><br>
                         <strong>Email</strong><br>
                         <input type="email" name="correo" id="correo" autocomplete="off" required value=""><br>
                         <strong>Contraseña</strong><br>
                         <input type="password" name="pass" id="pass" autocomplete="off" required value=""><br>
                         <strong>Sexo</strong><br>
                         <select class="form-control input-large" name="sexo" id="sexo" required>
                            <option value="d" >Seleccione una opcion</option>
                            <option value="F">Femenino</option>
                            <option value="M">Masculino</option>
                         </select>
                         <br>
                         
                         <input type="submit" class="btn btn-success" id="enviar" value="Enviar" name="submit" >
                         <br>
                         <br>
                         <div id="msg"></div>
                         <br>
                         <br>
                        

               </div>

             </div>
    </body>
    </html>
<?php 


?>