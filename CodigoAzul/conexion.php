<?php

class conexion {
	
	private $link;
	private $result;
	static $_instance;
	/**
	private function __construct(){
		include ("configuracion.php");
		$this->usuario=USER;
		$this->password=PASS;
		$this->servidor=HOST;
		$this->base_datos=DB;
		$this->conectar();
	}
	
	private function __clone(){}	
	public static function getInstance(){
		if(!(self::$_instance instanceof self)){
			self::$_instance=new self();
		}
		return self::$_instance;
	}
	**/
	private function __construct(){
		
	}
	public function conexion() {

	}
	// Conexion base de datos
	public function conectarDB(){
		include ("configuracion.php");		
		$this->link=mysqli_connect($servidor,$userbd,$passbd,$nombdb);
		if ("$this->link") {
			echo "Error en la conexión a la base de datos";
		}		
	}
		//
	public function ejecutar($sql){
		$this->result=mysqli_query($this->link,$sql);		
		return $this->result;
	}
	/* metodo para obtener una fila de resultados de la sentencia sql */
	public function resultados($result){
	if (!empty($result)){
		$this->array=mysqli_fetch_assoc($result);
		return $this->array;
	}
	}
	public function desconectarDB() {
		mysqli_close($this->link);
	}
	public function filas($result){
		$this->array=mysqli_fetch_array($result);
		return $this->array;
	}
	
	public function cantidad($result){
		$numero_filas = mysqli_num_rows($result);
	return $numero_filas;
	}
	
	
	

}

?>

