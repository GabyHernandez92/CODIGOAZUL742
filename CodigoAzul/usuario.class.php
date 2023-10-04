<?php 
include_once ("bd_codigo_azul.php");

class usuario {
	private $nombre;
	private $apellido;
	private $dni;
	private $usuario;
	private $clave;
	private $correo;
	private $tipo_usuario;
	private $conexion;

	function __construct($dni, $nombre, $apellido, $usuario, $clave,$correo) {
		$this->setDni($dni);
		$this->setNombre($nombre);
		$this->setApellido($apellido);
		$this->setUsuario($usuario);
		$this->setClave($clave);
		$this->setCorreo($correo);		
	}

	public function getNombre(){
		return $this->nombre;
	}
	public function setNombre($nombre){
		$this->nombre=$nombre;
	}

	public function getApellido(){
		return $this->apellido;
	}
	public function setApellido($apellido){
		$this->apellido=$apellido;
	}

	public function getDni(){
		return $this->dni;
	}
	public function setDni($dni){
		$this->dni=$dni;
	}

	public function getUsuario(){
		return $this->usuario;
	}
	public function setUsuario($usuario){
		$this->usuario=$usuario;
	}
	public function getClave(){
		return $this->clave;
	}
	public function setClave($clave){
		$this->clave=$clave;
	}
	public function getCorreo(){
		return $this->correo;
	}
	public function setCorreo($correo){
		$this->correo=$correo;
	}

	public function getTipo_usuario(){
		return $this->tipo_usuario;
	}
	public function setTipo_usuario($tipo_usuario){
		$this->tipo_usuario=$tipo_usuario;
	}

//************************************************************************************************
public function registrarUsuario() {
	$this->conexion = new bd_codigo_azul();
	$resultado = $this->conexion->consultar("INSERT INTO usuario (dni, nombre, apellido, usuario, clave, correo)VALUES ('".$this->getDni()."','".$this->getNombre()."','".$this->getApellido()."','".ucfirst($this->getUsuario())."','".$this->getClave()."','".$this->getCorreo()."')");
	$this->conexion->desconectar();
}
//************************************************************************************************
public function getEnfermeros(){
	$this->conexion = new bd_codigo_azul();
	$resultado =$this->conexion->consultar("SELECT * FROM usuario WHERE tipo_usuario='enfermero'");

	$enfermeros = array();
	while ($registro = $this->conexion->obtenerConsulta()){
		$enfermero=new Usuario(0,'','','','','');
		$enfermero->setDni($registro->dni);
		$enfermero->setNombre($registro->nombre);
		$enfermero->setApellido($registro->apellido);
		$enfermero->setCorreo($registro->correo);
		$enfermero->setTipo_usuario($registro->tipo_usuario);
		$enfermeros[]=$enfermero;
}
$this->conexion->desconectar();
return $enfermeros;
}
//************************************************************************************************
public function get_por_dni() {
	$this->conexion = new bd_codigo_azul();
	$resultado = $this->conexion->consultar("SELECT * FROM `usuario` WHERE dni = '".$this->getDni()."'");
	while ($registro = $this->conexion->obtenerConsulta()){
		$usuario=new Usuario(0,'','','','','');
		$usuario->setDni($registro->dni);
		$usuario->setNombre($registro->nombre);
		$usuario->setApellido($registro->apellido);
		$usuario->setCorreo($registro->correo);
		$usuario->setTipo_usuario($registro->tipo_usuario);
		$usuarios[]=$usuario;
	}
	$this->conexion->desconectar();
	return $usuarios;
}
//************************************************************************************************
public function getUsuarios(){
	$this->conexion = new bd_codigo_azul();
	$resultado =$this->conexion->consultar("SELECT * FROM usuario");

	$usuarios = array();
	while ($registro = $this->conexion->obtenerConsulta()){
		$usuario=new Usuario(0,'','','','','');
		$usuario->setDni($registro->dni);
		$usuario->setNombre($registro->nombre);
		$usuario->setApellido($registro->apellido);
		$usuario->setCorreo($registro->correo);
		$usuario->setTipo_usuario($registro->tipo_usuario);
		$usuarios[]=$usuario;
}
$this->conexion->desconectar();
return $usuarios;
}
//************************************************************************************************
public function modificacion($dni) {
	$this->conexion = new bd_codigo_azul();
	$resultado= $this->conexion->consultar ("UPDATE usuario SET nombre='".$this->getNombre()."',apellido='".$this->getApellido()."',usuario='".$this->getUsuario()."',clave='".$this->getClave()."',correo='".$this->getCorreo()."',tipo_usuario='".$this->getTipo_usuario()."' WHERE dni=".$dni);
	$this->conexion->desconectar();
}

}
?>