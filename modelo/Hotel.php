
<?php 
	require_once 'conexion.php';

	class articulos{
	var $idm;  var $nom;	var $des; var $modo; var $unidades; var $fecha_ven; var $fecha_ing; var $piscina;
	
		var $id ;
		public function agregar($nom,$id,$des,$modo,$unidades,$fecha_ven,$piscina,$idm){
			$con = new Conexion();
			
			$sentencia = "INSERT INTO hotel(hotel,hab,camas,emp,res,disco,piscina,id) VALUES ('$nom','$id','$des','$modo','$unidades','$fecha_ven','$piscina','$idm')";
			if($sent = $con->query($sentencia)){
				return true;
			}else{
				return false;
			}
			
			$con= null;
		}
		
		
		public function listar($val){
			$con = new Conexion();
			$senten = $con->query("SELECT * FROM hotel WHERE (hotel  like '%".$val."%')");
			
            $arreglo = array();
            
            while($re = $senten->fetch()){
                $arreglo[]=$re;
        
        }
            return $arreglo;
            $con=null;
            
		}
		public function listar3(){
			$con = new Conexion();
			$senten = $con->query("SELECT * FROM hotel ");
            
           $arreglo = array();
			return $senten->fetchAll(PDO::FETCH_ASSOC);
            
            /*while($re = $senten->fetch()){
                $arreglo[]=$re;
        
        }
            return $arreglo;
            $con=null;*/
            
		}
		public function editarHotel($idm,$nom,$id,$des,$unidades,$fecha_ven,$fecha_ing,$piscina){
			$con = new Conexion();
			$sql="UPDATE hotel set hotel='$nom', hab='$id',camas='$des',emp='$unidades',res='$fecha_ven',disco='$fecha_ing',piscina='$piscina' where id='$idm'";
			
			if($senten = $con->query($sql)){
					return true;
				}else{ 
					 return false ;
				}
					$con=null;
		}
		public function eliminar($idm){
			$con = new Conexion();
			$sql = "DELETE from hotel where id='$idm'";
			if($senten = $con->query($sql)){
					
					return true;

				}else{
					
					 
					 return false ;
				}
					$con=null;

		}
			
		
		
		
	


	}




 ?>		
