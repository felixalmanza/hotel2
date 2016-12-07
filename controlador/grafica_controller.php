<?php 
$json = file_get_contents("http://localhost/hoteles2/vista/llamar_datos.php");
$de = json_decode($json);
require_once '../vista/grafica.php';
?>