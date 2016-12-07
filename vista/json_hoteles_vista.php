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
	<title>hoteles externos</title>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta name="viewport" content="width=device-widt, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
<?php include_once "menu.php"; ?>
<?php 
echo "
    <center>
	<table border=2>
		<tr>
			<td>hotel</td>

			<td> </td>
			
			<td>camas</td>

			<td>  </td>
			
			<td>restaurante</td>
			
		</tr>
		</table>";
foreach ($de as $deco) {
	echo "
	<table>
		<tr>
			<td>".$deco->hotel."</td>
			<td>".$deco->camas."</td>
			<td>".$deco->res."</td>
			
		</tr>
		</table>";
	//echo "($deco->hotel.$deco->camas."\n")";
}

 ?>

</body>
</html>