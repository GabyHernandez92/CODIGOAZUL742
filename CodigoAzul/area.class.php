<?php 
include_once ("bd_codigo_azul.php");

class Area {
	private $nombre;
    private $id;
    private $conexion;

	function __construct($nombre) {
		$this->setNombre($nombre);	
	}

	public function getNombre(){
		return $this->nombre;
	}
	public function setNombre($nombre){
		$this->nombre=$nombre;
	}
    public function getId(){
		return $this->id;
	}
	public function setId($id){
		$this->id=$id;
	}

//************************************************************************************************

    public function get_areas() {
        $this->conexion = new bd_codigo_azul();
        $resultado = $this->conexion->consultar("SELECT * FROM `area` WHERE id_area IS NOT null");
        $areas = array();
        while ($registro = $this->conexion->obtenerConsulta()){
                $area=new area($registro->nombre_area);
                $area->setId($registro->id_area);
                $areas[]=$area;
		}
        $this->conexion->desconectar();
        return $areas;
    }

    public static function get_areasBD() {
        $conexion = new bd_codigo_azul();
        $resultado = $conexion->consultar("SELECT * FROM `area` WHERE id_area IS NOT null");
        $areas = array();
        while ($registro = $conexion->obtenerConsulta()){
                $area=new area($registro->nombre_area);
                $area->setId($registro->id_area);
                $areas[]=$area;
		}
        $conexion->desconectar();
        return $areas;
    }


    public function get_por_id() {
        $this->conexion = new bd_codigo_azul();
        $resultado = $this->conexion->consultar("SELECT * FROM `area` WHERE id_area = '".$this->getId()."'");
        while ($registro = $this->conexion->obtenerConsulta()){
			$area=new area($registro->nombre_area);
            $area->setId($registro->id_area);
			$areas[]=$area->nombre;
		}
        $this->conexion->desconectar();
        return $areas;
    }

    public function alta() {
        $this->conexion = new bd_codigo_azul();
        $resultado = $this->conexion->consultar("INSERT INTO area (nombre_area) VALUES ('".$this->getNombre()."')");
        $this->conexion->desconectar();
    }

    public function modificacion($id) {
        $this->conexion = new bd_codigo_azul();
        $resultado = $this->conexion->consultar("UPDATE area SET nombre_area='".$this->getNombre()."' WHERE id_area=".$id);
        $this->conexion->desconectar();
    }

    public function baja() {
        $this->conexion = new bd_codigo_azul();
        $resultado = $this->conexion->consultar("DELETE FROM area WHERE id_area=".$this->getId());
        $this->conexion->desconectar();
    }

//************************************************************************************************
}
?>