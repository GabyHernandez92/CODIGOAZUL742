<?php

class bd_codigo_azul {
	private $servidor;
	private $usr;
	private $contrasenia;
	private $bd;
	private $consulta;
	private $enlace;
	private $resultado;

	function __construct() {

		$this->servidor= "localhost";
		$this->usr= "root";
		$this->contrasenia= "";
		$this->bd= "bd_codigo_azul";
		$this->conectar();
	}

	public function conectar () {

		if ($this->enlace=mysqli_connect($this->servidor, $this->usr, $this->contrasenia)) {
			if (mysqli_select_db($this->enlace, $this->bd)) {
				return true; //si se conecta a la bd retorna true.
			} else {
				echo "No se ha podido conectar a la base de datos"; //retorna mensaje de error.
			}
		} else {
			echo "No se ha podido conectar con la base de datos";
		}

	}

	public function consultar($query) {
		$sql= $this->consulta= mysqli_query($this->enlace, $query);
		return $sql;
	}

	public function obtenerConsulta() {
		$this->resultado = mysqli_fetch_object($this->consulta);
		return $this->resultado;
	}

	public function desconectar(){
		mysqli_close($this->enlace);
	}

}
?>