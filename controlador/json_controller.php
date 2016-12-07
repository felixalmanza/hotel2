<?php 
$json = file_get_contents("https://www.datos.gov.co/resource/b38b-q49f.json");
$de = json_decode($json);
require_once '../vista/json_hoteles_vista.php';
