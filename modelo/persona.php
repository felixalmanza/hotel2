<?php 

	require_once 'conexion.php';
	class persona{
		var $id;  var $nom;	var $ape; var $usu; var $cedula; var $edad; var $email; var $pass; var $sexo;

		public function __construct($id,$nom, $ape,$usu,$cedula,$edad, $email,$pass,$sexo){
			$this->id= $id;
			$this->nom = $nom;
			$this->ape = $ape;
			$this->usu=$usu;
			$this->cedula= $cedula;
			$this->edad = $edad;
			$this->email = $email;
			$this->pass = $pass;
			$this->sexo = $sexo;
		}

		//Funcion guardar otro usuario al sistema
		public function guardar(){
			$conex= new Conexion();
			$key = uniqid();
			$sql = "INSERT INTO usuarios(id,nombre,apellido,usuario,cedula,edad,email,password,sexo,confirmacion,codigo_confirmacion) VALUES ('$this->id','$this->nom','$this->ape','$this->usu','$this->cedula','$this->edad ','$this->email','$this->pass','$this->sexo ','0','$key');";
			if($senten = $conex->query($sql)){
					
					return true;

				}else{
					
					 
					 return false ;
				}

	
		$conex =null;
}

}

 ?>