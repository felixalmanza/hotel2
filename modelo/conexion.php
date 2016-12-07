<?php  
#class conexion{
    #Declarando variables globales
  #  var $h; var $port; var $user; var $pass; var $dbname; var $link;
    #function __construct($h='localhost',$port='5432',$dbname='registro',$user='postgres',$pass='admin'){
     #   $this->h=$h; $this->port=$port; $this->dbname=$dbname; $this->user=$user; $this->pass=$pass;
   # }
     class Conexion extends PDO { 
   private $tipo_de_base = 'pgsql';
   private $host = 'localhost';
   private $nombre_de_base = 'hotel';
   private $usuario = 'postgres';
   private $contrasena = 'america'; 
   public function __construct() {
      //Sobreescribo el método constructor de la clase PDO.
      try{
         parent::__construct($this->tipo_de_base.':host='.$this->host.';dbname='.$this->nombre_de_base, $this->usuario, $this->contrasena);
      }catch(PDOException $e){
         echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
         exit;
      }
   } 
 }
    /*function conexionm(){
        $cadena="host='$this->h' port='$this->port' dbname='$this->dbname' user='$this->user' password='$this->pass'";
        $link = pg_connect($cadena) or die('No se ha podido conectar:'.pg_last_error());
        $this->link=$link;
        if(!$link){
           echo "<p><i>No conecta</i></p>";
        }
        else {
           return $link;
        }  
    }
    	/*function __destruct(){
        	 pg_close($this->link);
           
    	}
}*/
 ?>