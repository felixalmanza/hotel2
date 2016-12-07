<?php 
session_start();
include_once "../modelo/infopersona.php";
error_reporting(E_ALL);
	ini_set('display_errors', '1');
	
	$objusu = $_SESSION['usuario'];
$ususession = $_SESSION['usuario'];
$usu = limpiar($ususession['id']);
$objusuario= new consultar_campo_persona($usu);
 ?>
 <!DOCTYPE html>
 <html>
 <head>

 	<title>Perfil</title>
 	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta name="viewport" content="width=device-widt, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	
	<link href="../css/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/dist/css/sb-admin-2.css" rel="stylesheet">
   <!-- Custom Fonts -->
    <link href="../css/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
     <link href="../css/style.css" rel="stylesheet">
 </head>
 <body>
 <div id="wrapper ">
 <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
  

            <div class="navbar-header">
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="plataforma.php">Principal </a>
            </div>

		<!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                   <!-- <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dorpdown-toggle">
                            Editar datos<i class="fa fa-file-text fa-fw"></i><i class="fa fa-caret-down"></i>
                        </a>  
                        <ul class="dropdown-menu dropdown-tasks">
                            <li>
                                <a href="php/modificar_notas.php">
                                    <div>
                                        <i class="fa fa-edit fa-fw"></i>Editar notas
                                    </div>
                                </a>
                            </li>
                        </ul>                      
                    </li>-->
                
              <!--  <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        Clases<i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="notas.php">
                                <div>
                                    <i class="fa fa-pencil fa-fw"></i> Ingresar notas
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="lista_estudiantes.php">
                                <div>
                                    <i class="fa fa-list-alt fa-fw"></i> Lista de estudiantes
                                    
                                </div>
                            </a>
                        </li>
                        
                    </ul>
                     /.dropdown-alerts
                </li>-->
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                       <?php echo $objusu['nombre']." ".$objusu['apellido']." (".$objusu['usuario'].")";?> <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu ">
                        <li><a href="cambiar_info.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                      
                        <li class="divider"></li>
                        <li><a href="../controlador/controlador.php?s=cerrar"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            
</div>
<div class="col-lg-12 row">
  <div align="center">
  <div class="panel panel-default"></div>
    	<table width="50%">
          <tr>
            <td>
 <table class="table table-bordered">
                  <tr class="info">
                    <td>
                    	<h1 align="center"><img src="../img/act.jpg" width="100" height="100" class="img-circle img-polaroid"> Perfil del usuario</h1>
                    </td>
                  </tr>
                  <tr>
                    <td>
                    	<form name="form1" method="post" action="">
                        <div class="row-fluid">
                            <div class="span6">
	<strong>Id</strong><br>
    <input type="text" name="doc" class="input-xlarge" autocomplete="off" readonly value="<?php echo $objusuario->consultar('id'); ?>"><br>
    <strong>Nombres</strong><br>
    <input type="text" name="nom" class="input-xlarge" autocomplete="off" required value="<?php echo $objusuario->consultar('nombre'); ?>"><br>
    <strong>Apellidos</strong><br>
    <input type="text" name="ape" class="input-xlarge" autocomplete="off" required value="<?php echo $objusuario->consultar('apellido'); ?>"><br>
    <strong>Cedula</strong><br>
    <input type="text" name="cedula" class="input-xlarge" autocomplete="off" readonly value="<?php echo $objusuario->consultar('cedula'); ?>"><br>
    <strong>Edad</strong><br>
    <input type="text" name="edad" class="input-xlarge" autocomplete="off" required value="<?php echo $objusuario->consultar('edad'); ?>"><br>
                          </div>
                            <div class="span6">
	<strong>Correo</strong><br>
    <input type="email" name="email" class="input-xlarge" autocomplete="off" required value="<?php echo $objusuario->consultar('email'); ?>"><br>
    <strong>Sexo</strong><br>
    <input type="text" name="cel" class="input-xlarge" autocomplete="off" readonly value="<?php echo $objusuario->consultar('sexo'); ?>"><br>
   <!-- <strong>Correo Electronico</strong><br>
    <input type="email" name="correo" class="input-xlarge" autocomplete="off" required value="<?php // echo $objusuario->consultar('correo'); ?>"><br>
    <strong>Especialidades</strong><br>
    <input type="text" name="especialidad" class="input-xlarge" autocomplete="off" required value="<?php //echo $oProfesor->consultar('especialidad'); ?>"><br>
    <strong>Tipo de Usuario</strong><br>
    <?php 
		
	?>
    <input type="text" name="dir" class="input-xlarge" autocomplete="off" readonly value="<?php //echo $tipo; ?>"><br><br>-->
    <div align="left"><button type="submit" class="btn btn-primary">Actualizar Informacion</button></div>
                          </div>
                        </div>
                        </form>
                    </td>
                  </tr>
                </table>
            </td>
          </tr>
        </table>
</div>
    </div>
    </div>
    <!-- jQuery -->
    <script src="../css/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../css/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
 </body>
 </html>