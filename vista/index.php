
<!DOCTYPE html>
<html>
<head>

<script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/funciones.js"></script>


	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-widt, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<!--<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>-->
	<title>Inicio</title>
	
</head>

<body>
	 <br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Iniciar Sesion</div>
                    <div class="panel-body"> 
                        <div class="alert alert-danger text-center" style="display:none;" id="error">
                            <p>Usuario o Password no identificados</p>
                        </div>                     
                        <form role="form">
                            <div class="form-group">
                                <label for="nombre">Usuario:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                    <input type="text" class="form-control" name="nombre" id="nombre_usuario" placeholder="Usuario o correo">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-certificate"></span></span>
                                    <input type="password" class="form-control" id="passq" name="passq" placeholder="Contraseña">
                                </div>
                            </div>                     
                            <button name='boton' type="button" class="btn btn-default" onclick='confirmar();'><span class="glyphicon glyphicon-lock"></span> Ingresar</button>   
                        </form>
                        <div class="form-group" align='right'>
                <buttton href="javascript:void(0)" class="btn btn-success" data-toggle="modal" data-target="#responsive"><span class="glyphicon glyphicon-user"></span>Registrarme</button>           
        </div>
                    </div>
                </div>
            </div> 
        </div>
	 <div class="modal fade" id="responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h2 class="modal-title">Datos de Usuario</h2>
              </div>
              <div class="modal-body">
                <div class="alert alert-success text-center" id="exito" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span> Su cuenta ha sido registrada. Se le a enviado un correo </span>
                </div>
                <form class="form-horizontal" id="formRegistro">
                  <div class="form-group">
                  <input type="hidden"  name="idn" id="idn" autocomplete="off"  value="<?php echo rand();?>">
                  <div class="form-group">
                    <label for="ced" class="control-label col-xs-5">Cedula:</label>
                    <div class="col-xs-6">
                      <input id="ced" name="ced"  required type="text" class="form-control" placeholder="Ingrese su cedula">
                    </div>
                  </div>
                    <label for="nombres" class="control-label col-xs-5">Nombres :</label>
                    <div class="col-xs-6">
                      <input id="nom" name="nom" required type="text" class="form-control" placeholder="Ingrese sus Nombres">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="ape" class="control-label col-xs-5">Apellidos :</label>
                    <div class="col-xs-6">
                      <input id="ape" name="ape" required  type="text" class="form-control" placeholder="Ingrese sus Apellidos">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email2" class="control-label col-xs-5">Email:</label>
                    <div class="col-xs-6">
                        <input id="correo" name="correo" type="email" class="form-control"required placeholder="Ingrese su Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="edad" class="control-label col-xs-5">Edad:</label>
                    <div class="col-xs-6">
                        <input id="edad" name="edad" type="text" class="form-control" required placeholder="Ingrese su Edad">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="usuario" class="control-label col-xs-5">Usuario:</label>
                    <div class="col-xs-6">
                        <input id="usuario" name="usuario" type="text" class="form-control" required placeholder="Ingrese un nombre de usuario">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="pass" class="control-label col-xs-5">Contraseña:</label>
                    <div class="col-xs-6">
                        <input id="pass" name="pass" required type="password" class="form-control" placeholder="Ingrese su contraseña">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="pass2" class="control-label col-xs-5">Repetir Contraseña:</label>
                    <div class="col-xs-6">
                        <input id="pass2" name="pass2" required type="password" class="form-control" placeholder="Vuelva a ingresar su contraseña">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="sexo" class="control-label col-xs-5">Sexo:</label>
                    <div class="col-xs-6">
                       <select class="form-control input-large" name="sexo" id="sexo" required>
                            <option value="d" >Seleccione una opcion</option>
                            <option value="F">Femenino</option>
                            <option value="M">Masculino</option>
                         </select>
                    </div>
                  </div>
                  <div class="form-goup">
                  <div class="alert alert-danger text-center" style="display:none;" id="error2">

                            <p>Ingrese todos los campos</p>
                        </div>
                    </div>
                  
                </form>
              </div>
              <div class="modal-footer">  
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button onclick="registrar();" type="button" class="btn btn-success">Guardar</button>
                 
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
<script src="../js/jquery-1.11.2.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/usuario.js"></script>
	
</body>
</html>