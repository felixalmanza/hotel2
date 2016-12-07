
<?php 
	require "conexion.php";
    $objconex=new Conexion();
    
    class persona{
		var $id;  var $nom;	var $ape; var $usu; var $cedula; var $edad; var $email; var $pass; var $sexo;
        
        function __construct($id,$nom,$ape,$usu,$cedula,$edad,$email,$pass,$sexo){
        	$this->id=$id; $this->nom=$nom; $this->ape=$ape; $this->usu=$usu; $this->cedula=$cedula; $this->edad=$edad; $this->email=$email; $this->pass=$pass; $this->sexo=$sexo; 
        }

        function insertar(){

        	 $nom=$this->nom; $ape=$this->ape; $usu=$this->usu; $cedula=$this->cedula; $edad=$this->edad; $email= $this->email; $pass=md5($this->pass); $sexo=$this->sexo;
            $capusu="SELECT * FROM usuarios where usuario='$this->usu'";
            $cap="SELECT * FROM usuarios where id='$this->id'";
            $rc=pg_query($cap);
            $rcusu=pg_query($capusu);
            $res=pg_fetch_assoc($rc);
            $resusu=pg_fetch_assoc($rcusu);
            if($res > 0){
                JSON(false,'Ya existe un usuario con el mismo id. Por favor intente de nuevo');
              
            }elseif ($resusu) {

             echo $this->mensajes('Este nombre de usuario '.$this->usu.' ya se encuentra registrado. Por favor intente con otro<br>','rojo');
        echo '<center><a href="../vista/registro.php" class="btn"><strong>Intentar de Nuevo</strong></a></center>';

            }else{
             $query = "INSERT INTO usuarios(id,nombre,apellido,usuario,cedula,edad,email,password,sexo)VALUES ('$this->id','$nom','$ape','$usu','$cedula','$edad','$email','$pass','$sexo')";
            $r=pg_query($query)or die ('No se ha podido insertar el dato:'.pg_last_error());
            if($r){
               JSON(true,'Su cuenta fue registrada con exito. Se le ha enviado un email para activar su cuenta');
                
            }else{
               JSON(false,'el Usuario no pudo registrarse');
            }
            
            }

        }

        function editar(){
           
        }
    function mensajes($mensaje,$tipo){
    if($tipo=='verde'){
      $tipo='alert alert-success';
    }elseif($tipo=='rojo'){
      $tipo='alert alert-error';
    }elseif($tipo=='azul'){
      $tipo='alert alert-info';
    }
    return '<div class="'.$tipo.'" align="center">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>'.$mensaje.'</strong>
            </div>';
  }
  
}
class consultar_campo_persona{
    private $consulta;
    private $fetch;
    function __construct($codigo){
        $this->consulta = "SELECT * FROM usuarios where id='$codigo'";
        $sql=pg_query($this->consulta);
        $this->fetch = pg_fetch_array($sql);
    }
    function consultar($camp){
        return $this->fetch[$camp];
    }
}
function limpiar($tags){
        

        return $tags;
    }

 function JSON($exito,$msg){
        $R['exito'] = $exito;
        $R['msg'] = $msg;
        echo json_encode($R);
}
 ?>