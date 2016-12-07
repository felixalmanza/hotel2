<?php require_once ('../controlador/controlador.php');
	
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	session_start();
	$objusu = $_SESSION['usuario'];
    $objnom = $_SESSION['nombre'];
    $objape = $_SESSION['apellido'];

    



 ?>
<!DOCTYPE html>
<html>
<head>
    <title>Busqueda de hotel</title>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta name="viewport" content="width=device-widt, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	
</head>
<body onload="lista_hotel('');">

<?php include_once "menu.php"; ?>
   <div class="container" >
   <br>
            <div class="tab-content">
            <div class="tab-pane active" id="tab_consultar">
                <div class="row form-horizontal">
                    <div class="panel panel-default">
                        <div class="panel-heading">Hoteles registrados</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-xs-4 text-right">
                                    <label for="buscar" class="control-label">Buscar:</label>
                                </div>
                                <div class="col-xs-4 ">
                                    <input  type="text" name="buscar" id="buscar" class="form-control" onkeyup="lista_hotel(this.value);" placeholder="Ingrese nombre del hotel"/>
                                </div>
                                <div class="col-xs4">
                                    <a href="javascript:void(0)"><button class="btn btn-success"  data-toggle="modal" data-target="#modalRegis">+ Registrar nuevo</button></a>
                                </div>
                            </div>
                            <div class="form-group">
                                <div id="lista"></div> 
                            </div> 
                            
                        </div>
                        
                    </div>
                </div>
           <!--modal de registro Hotel-->
           <div class="modal fade" id="modalRegis" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h2 class="modal-title">Datos del Hotel</h2>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-success text-center" id="exito" style="display:none;">
                                    <span class="glyphicon glyphicon-ok"> </span><span> El hotel ha sido registrado</span>
                                </div>
                                <form class="form-horizontal" id="formRhotel">
                                    <input type="hidden" class="form-control" name="idh"  id="idh" autocomplete="off" required value="<?php echo rand() ;?>"><br>
                                    <div class="form-group">

                                        <label for="nom" class="control-label col-xs-5">Nombre:</label>
                                        <div class="col-xs-5">
                                            <input type="text" class="form-control" name="nom" id="nom" placeholder="nombre hotel" autocomplete="off" required value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="descrip" class="control-label col-xs-5">Habitacion :</label>
                                        <div class="col-xs-5">
                                             <input type="text" class="form-control" name="habi" id="habi" placeholder="# de habitaciones" autocomplete="off" required value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="cam" class="control-label col-xs-5"># de camas :</label>
                                        <div class="col-xs-5">
                                        <input type="text" class="form-control" name="cam" id="cam" placeholder="# de camas" autocomplete="off" required value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="emp" class="control-label col-xs-5">Empleado:</label>
                                        <div class="col-xs-5">
                                           <input type="text" class="form-control" name="emp" id="emp" autocomplete="off" placeholder="# de empleados"required value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="res" class="control-label col-xs-5">Restaurante:</label>
                                        <div class="col-xs-5">
                                           <input type="text" class="form-control" name="res" id="res" autocomplete="off" placeholder="# de restaurantes"required value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="dis" class="control-label col-xs-5">Disco:</label>
                                        <div class="col-xs-5">
                                           <input type="text" class="form-control" name="dis" id="dis" autocomplete="off" placeholder="# de disco"required value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="pis" class="control-label col-xs-5">Piscina:</label>
                                        <div class="col-xs-5">
                                           <input type="text" class="form-control" name="pis" id="pis" autocomplete="off" placeholder="# piscinas"required value="">
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
                            <div class="modal-footer">  
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-success" onclick="registrarHotel();">Guardar</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal registro Hotel-->

         <!--Modal para editar-->
        <div class="modal fade" id="modaleditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h2 class="modal-title">Datos del Hotel a editar</h2>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-success text-center" id="exitoAct" style="display:none;">
                                    <span class="glyphicon glyphicon-ok"> </span><span> El hotel ha sido editado</span>
                                </div>
                                <form class="form-horizontal" id="formEditar">
                                    <input type="hidden" class="form-control" name="idh1"  id="idh1" autocomplete="off" required value="<?php echo rand() ;?>"><br>
                                    <div class="form-group">


                                        <label for="nom1" class="control-label col-xs-5">Nombre:</label>
                                        <div class="col-xs-5">
                                            <input type="text" class="form-control" name="nom1" id="nom1" placeholder="nombre hotel" autocomplete="off" required value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="habi1" class="control-label col-xs-5">Habitacion :</label>
                                        <div class="col-xs-5">
                                             <input type="text" class="form-control" name="habi1" id="habi1" placeholder="# de habitacion" autocomplete="off" required value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="cam1" class="control-label col-xs-5"># de camas :</label>
                                        <div class="col-xs-5">
                                        <input type="text" class="form-control" name="cam1" id="cam1" placeholder="# de camas" autocomplete="off" required value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="emp1" class="control-label col-xs-5">Empleado:</label>
                                        <div class="col-xs-5">
                                           <input type="text" class="form-control" name="emp1" id="emp1" autocomplete="off" placeholder="# de empleados"required value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="res1" class="control-label col-xs-5">Restaurante:</label>
                                        <div class="col-xs-5">
                                           <input type="text" class="form-control" name="res1" id="res1" autocomplete="off" placeholder="# de restaurantes"required value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="dis" class="control-label col-xs-5">Disco:</label>
                                        <div class="col-xs-5">
                                           <input type="text" class="form-control" name="dis1" id="dis1" autocomplete="off" placeholder="# de disco"required value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="pis1" class="control-label col-xs-5">Piscina:</label>
                                        <div class="col-xs-5">
                                           <input type="text" class="form-control" name="pis1" id="pis1" autocomplete="off" placeholder="# piscinas"required value="">
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
                            <div class="modal-footer">  
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-success" onclick="actualizarHotel();">Guardar</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal editar Hotel-->
                    
<!-- jQuery -->
    <script src="../js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/hotel.js"></script>
    <script src="../js/usuario.js"></script>
</body>
</html>