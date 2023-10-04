<?php 
include_once ("bd_codigo_azul.php");
include_once ("usuario.class.php");
include_once ("paciente.class.php");

class Llamado {
    private $id_llamado;
    private $dni_paciente;
    private $dni_usuario;
    private $id_area;
    private $tipo_llamado;
    private $fecha_ingreso;
	private $hora_ingreso;
    private $fecha_atencion;
	private $hora_atencion;
    private $origen;
	private $estado;
	private $tiempo_espera;
	private $conexion;

//CONSTRUCTOR
    function __construct($id_llamado, $dni_paciente, $dni_usuario, $id_area, $tipo_llamado,$fecha_ingreso,$hora_ingreso, $fecha_atencion,$hora_atencion,$origen,$estado, $tiempo_espera) {
      	$this->setIdLlamado($id_llamado);
		$this->setDni_Paciente($dni_paciente);
		$this->setDni_Usuario($dni_usuario);
		$this->setIdArea($id_area);
		$this->setTipoLlamado($tipo_llamado);
        $this->setFecha_ingreso($fecha_ingreso);
		$this->setHora_ingreso($hora_ingreso);
		$this->setFecha_atencion($fecha_atencion);
		$this->setHora_atencion($hora_atencion);
        $this->setOrigen($origen);
		$this->setEstado($estado);	
		$this->setTiempo_espera($tiempo_espera);	
	}
//GETTER Y SETTER
    public function getIdLlamado(){
		return $this->id_llamado;
	}
	public function setIdLlamado($id_llamado){
		$this->id_llamado=$id_llamado;
	}

    public function getIdArea(){
		return $this->id_area;
	}
	public function setIdArea($id_area){
		$this->id_area=$id_area;
	}

    public function getTipoLlamado(){
		return $this->tipo_llamado;
	}
	public function setTipoLlamado($tipo_llamado){
		$this->tipo_llamado=$tipo_llamado;
	}

    public function getFecha_ingreso(){
		return $this->fecha_ingreso;
	}
	public function setFecha_ingreso($fecha_ingreso){
		$this->fecha_ingreso=$fecha_ingreso;
	}
	public function gethora_ingreso(){
		return $this->hora_ingreso;
	}
	public function sethora_ingreso($hora_ingreso){
		$this->hora_ingreso=$hora_ingreso;
	}

    public function getFecha_atencion(){
		return $this->fecha_atencion;
	}
	public function setFecha_atencion($fecha_atencion){
		$this->fecha_atencion=$fecha_atencion;
	}
	public function getHora_atencion(){
		return $this->hora_atencion;
	}
	public function setHora_atencion($hora_atencion){
		$this->hora_atencion=$hora_atencion;
	}

    public function getOrigen(){
		return $this->origen;
	}
	public function setOrigen($origen){
		$this->origen=$origen;
	}

    public function getDni_paciente()
    {
        return $this->dni_paciente;
    }

    public function setDni_paciente($dni_paciente)
    {
        $this->dni_paciente = $dni_paciente;

    }

    public function getDni_usuario()
    {
        return $this->dni_usuario;
    }

    public function setDni_usuario($dni_usuario)
    {
        $this->dni_usuario = $dni_usuario;

    }

	public function getEstado()
	{
		return $this->estado;
	}

	public function setEstado($estado)
	{
		$this->estado = $estado;

	}
	public function getTiempo_espera(){
		return $this->tiempo_espera;
	}
	public function setTiempo_espera($tiempo_espera){
		$this->tiempo_espera=$tiempo_espera;
	}

//FUNCIONES 
	public function getLlamados() {
        $this->conexion = new bd_codigo_azul();
        $resultado = $this->conexion->consultar("SELECT * FROM `llamado` ");
        $llamados = array();
        while ($registro = $this->conexion->obtenerConsulta()){
                $llamado=new llamado('','','','','','','','','','','','');
                $llamado->setIdLlamado($registro->id_llamado);
				$llamado->setDni_paciente($registro->dni_paciente);
				$llamado->setDni_usuario($registro->dni_usuario);
				$llamado->setIdArea($registro->id_area);
				$llamado->setTipoLlamado($registro->tipo_llamado);
				$llamado->setFecha_ingreso($registro->fecha_ingreso);
				$llamado->setHora_ingreso($registro->hora_ingreso);
				$llamado->setFecha_atencion($registro->fecha_atencion);
				$llamado->setHora_atencion($registro->hora_atencion);
				$llamado->setOrigen($registro->origen);
				$llamado->setEstado($registro->estado);
				$llamado->setTiempo_espera($registro->tiempo_espera);
                $llamados[]=$llamado;
		}
        $this->conexion->desconectar();
        return $llamados;
    }
//////////////////////////////////////////////////////////////////////////////////////
	public static function obtener_nombre_area($id) {
		$conexion = new bd_codigo_azul();
		$resultado = $conexion->consultar("SELECT * FROM area where id_area = '".$id."'");
		while ($registro = $conexion->obtenerConsulta()){
			$nombre_area= $registro->nombre_area;
		}
		$conexion->desconectar();
		return $nombre_area;
	}
//////////////////////////////////////////////////////////////////////////////////////
	public static function join_resultado() {
		$conexion = new bd_codigo_azul();
		$resultado = $conexion->consultar("SELECT * FROM llamado as l inner JOIN usuario as u on l.dni_usuario = u.dni");
		$array_resultado = array();
		while ($registro = $conexion->obtenerConsulta()){
			$objeto = new stdClass;
			$objeto->id_llamado = $registro->id_llamado;
			$objeto->dni_paciente= $registro->dni_paciente;
			$objeto->nombre = $registro->nombre;
			$objeto->area= llamado::obtener_nombre_area($registro->id_area);
			$objeto->fecha_ingreso = $registro->fecha_ingreso;
			$objeto->hora_ingreso = $registro->hora_ingreso;
			$objeto->fecha_atencion = $registro->fecha_atencion;
			$objeto->hora_atencion = $registro->hora_atencion;
			$objeto->origen = $registro->origen;
			$objeto->estado = $registro->estado;
			$objeto->tiempo_espera = $registro->tiempo_espera;
			$array_resultado[]=$objeto;
		}
		$conexion->desconectar();
		return $array_resultado;
}

}
?>