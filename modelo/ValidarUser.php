<?php 
    require_once "conexion.php";
   
    function consultarUser($user){
    	$objcon=new Conexion();
    	
		$stmt = $objcon->query("SELECT * FROM usuarios where usuario='".$user."' ;");
    	$resp ="";
    	if ($stmt) {
    		foreach ($stmt as $ss => $aa) {
    			$resp= $aa;
    		}
    	}
    	if($resp != ""){
    		echo '<div align="center" id="Error">Nombre de usuario no disponible </div>';
    	}else{
    		echo '<div align="center" id="Success">Nombre de usuario disponible </div>';
		}
    }
 ?>