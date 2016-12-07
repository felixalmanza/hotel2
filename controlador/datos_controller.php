<?php 
header('Content-Type: application/json');
require_once("../modelo/Hotel.php");


$inst = new articulos();
$r= $inst->listar3();
//$dato2 = json_encode($r);
//$a=$_GET['nombre'];


$dato=[];
        foreach ($_GET as $key => $value) {
            
                foreach ($r as $value_) {
                    if($value_[$key]==$value){
                        array_push($dato, $value_);
                    }
                }
                $r=$dato;
                //$dato=[];
            }
       // }
//header('Content-type: application/json');
echo $dato = json_encode($r);

           

?>