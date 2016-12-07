<?php  require_once 'conexion.php';

class session{

function acceso($usuario,$passq){
   $con = new Conexion();
    error_reporting(E_ALL);
    ini_set('display_errors','1');
    $pass1 = md5($passq);

    $query_acce="SELECT * FROM usuarios where (email='$usuario' OR usuario='$usuario' and password='$pass1' )";
    $sql=$con->query($query_acce);
    $resqq ='';
    $resq = $sql->fetchAll();
      foreach ($resq as $zz=> $value) {
        # code...
        $resqq = $value;
        
        
        
      }
      if($resqq>0){
         
        $_SESSION['usuario'] = $resqq[1];
      }else{
        $resqq[0]=0;
      }
     

      return $resqq;
      $con=null;
    }
    function listar(){
      $con = new Conexion();
      $sql ="SELECT * FROM usuarios";
      $sen= $con->query($sql);
      $arreglo = "";
      $resq = $sen->fetchAll();
      foreach ($resq as $zz=> $value) {
        # code...
        $arreglo = $value;
        
        
        
      }
      json_encode($arreglo);
      return $arreglo;
      $con=NULL;
    }
    
  
  function cerrar(){
  	 session_start();
     $_SESSION['usuario'] = NULL;
     session_destroy();


 header('location: ../index.html');
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
?>