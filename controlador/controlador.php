<?php 
	require_once("../modelo/persona.php");
	require_once("../modelo/session.php");
	require_once("../modelo/Hotel.php");
	require_once("../modelo/ValidarUser.php");

	#$boton = $_GET['boton'];

	if(isset($_POST['valor']))
	{
		$valor=$_POST['valor'];
		$inst = new articulos();
		$r=$inst ->listar($valor);
		//print_r($r);
		echo json_encode($r);
	}
	if(isset($_POST['boton']) && $_POST['boton']=='ingresar'){
		$obj = new session();
		$array = $obj->acceso($_POST['nombre'],$_POST['passq']);
		if($array[0]==0){
			echo '0';
		}else{
			session_start();
			$_SESSION['ingresar'] = 'Si';
			echo $_SESSION['usuario']=$array[3];
			echo $_SESSION['nombre']=$array[1];
			echo $_SESSION['apellido']=$array[2];
		}
		
		
	}
	if (isset($_POST['boton']) && $_POST['boton']=='cerrar') {
		
            	
			session_start();
			session_destroy();
			echo '0'; 
		
	}
	if(isset($_POST['idn']) && isset($_POST['nom']) && isset($_POST['ape'])&& isset($_POST['usuario'])&&isset($_POST['ced'])&&isset($_POST['edad'])&&isset($_POST['correo'])&&isset($_POST['pass'])&&isset($_POST['sexo'])){
	$id=$_POST['idn'];
	$nom = $_POST['nom'];
	$ape = $_POST['ape'];
	$usu = $_POST['usuario'];
	$ced = $_POST['ced'];
	$edad = $_POST['edad'];
	$correo = $_POST['correo'];
	$pass = md5($_POST['pass']);
	$sexo = $_POST['sexo'];
	
		
	$objpersona = new persona($id,$nom,$ape,$usu,$ced,$edad,$correo,$pass,$sexo);
		
	if ($objpersona->guardar())
	{
						echo 'exito';
					}
					else{
						echo "No se registro";
					}
    }
		
	
	if(isset($_POST['botonR']) && $_POST['boton']='registrar'){
		$idm = $_POST['idh'];
		$nom = $_POST['nom'];
		$cam = $_POST['cam'];
		$desc = $_POST['habi'];
		$forma = $_POST['emp'];
		$unidades = $_POST['res'];
		$fecha_ven = $_POST['dis'];
		$pis = $_POST['pis'];

		$objMedi = new articulos();

		if($objMedi->agregar($nom,$desc,$cam,$forma,$unidades,$fecha_ven,$pis,$idm)){
				echo '1';
		}
		else{
			echo "0";
		}
	}
	if(isset($_POST['actualizar']) and $_POST['actualizar']=='si'){
		$idm = $_POST['idh1'];
		$nom = $_POST['nom1'];
		$desc = $_POST['habi1'];
		$unidades = $_POST['cam1'];
		$fecha_ven = $_POST['emp1'];
		$fecha_registro= $_POST['res1'];
		$dis=$_POST['dis1'];
		$pis = $_POST['pis1'];
		$objMedi = new articulos();
		
		if($objMedi->editarHotel($idm,$nom,$desc,$unidades,$fecha_ven,$fecha_registro,$dis,$pis)){
			echo "1";
		}
		else{
			echo "0";
		}
	}
		if(isset($_POST['boton'])&&$_POST['boton']=='eliminar'){
			$idmm = $_POST['idh'];
					$objeliminar = new articulos();
					if($objeliminar->eliminar($idmm)){
				echo 'exito';
			}else{
				echo 'No se pudo eliminar el dato';
			}
				}
				
         
			
			
		
		
		
	
	
	
	
 ?>