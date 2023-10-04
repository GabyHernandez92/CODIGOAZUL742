<?php
include_once 'bd_codigo_azul.php';

class Paciente
{
    private $dni;
    private $nombre;
    private $apellido;
    private $obra_social;
    private $telefono;
    private $grupo_sanguineo;
    private $alergias;
    private $patologias_previas;
    private $cirugias;
    private $conexion;

    function __construct($dni, $nombre, $apellido, $obra_social, $telefono, $grupo_sanguineo, $alergias, $patologias_previas, $cirugias)
    {
        $this->setDni($dni);
        $this->setNombre($nombre);
        $this->setApellido($apellido);
        $this->setObra_social($obra_social);
        $this->setTelefono($telefono);
        $this->setGrupo_sanguineo($grupo_sanguineo);
        $this->setAlergias($alergias);
        $this->setPatologias_previas($patologias_previas);
        $this->setCirugias($cirugias);
    }


    public function getDni()
    {
        return $this->dni;
    }

    public function setDni($dni)
    {
        $this->dni = $dni;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    public function getObra_social()
    {
        return $this->obra_social;
    }

    public function setObra_social($obra_social)
    {
        $this->obra_social = $obra_social;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function getGrupo_sanguineo()
    {
        return $this->grupo_sanguineo;
    }

    public function setGrupo_sanguineo($grupo_sanguineo)
    {
        $this->grupo_sanguineo = $grupo_sanguineo;
    }

    public function getAlergias()
    {
        return $this->alergias;
    }

    public function setAlergias($alergias)
    {
        $this->alergias = $alergias;
    }

    public function getPatologias_previas()
    {
        return $this->patologias_previas;
    }

    public function setPatologias_previas($patologias_previas)
    {
        $this->patologias_previas = $patologias_previas;
    }

    public function getCirugias()
    {
        return $this->cirugias;
    }

    public function setCirugias($cirugias)
    {
        $this->cirugias = $cirugias;
    }

    ///////////////////////////////////////////////////////////////////////////

    public function registrarPaciente()
    {
        $this->conexion = new bd_codigo_azul();
        $resultado = $this->conexion->consultar("INSERT INTO paciente (dni, nombre, apellido, obra_social, telefono, grupo_sanguineo, alergias, patologias_previas, cirugias) VALUES ('" . $this->getDni() . "','" . $this->getNombre() . "','" . $this->getApellido() . "','" . $this->getObra_social() . "','" . $this->getTelefono() . "','" . $this->getGrupo_sanguineo() . "','" . $this->getAlergias() . "','" . $this->getPatologias_previas() . "','" . $this->getCirugias() . "')");
        $this->conexion->desconectar();
    }
    public function modificarPaciente()
    {
        $this->conexion = new bd_codigo_azul();
        $resultado = $this->conexion->consultar("UPDATE paciente SET nombre='" . $this->getNombre() . "', apellido='" . $this->getApellido() . "', obra_social='" . $this->getObra_social() . "', telefono='" . $this->getTelefono() . "', grupo_sanguineo='" . $this->getGrupo_sanguineo() . "', alergias='" . $this->getAlergias() . "', patologias_previas='" . $this->getPatologias_previas() . "', cirugias='" . $this->getCirugias() . "' WHERE dni='" . $this->getDni() . "'");
        $this->conexion->desconectar();
    }
    public function getPacientes()
    {
        $this->conexion = new bd_codigo_azul();
        $resultado = $this->conexion->consultar("SELECT * FROM `paciente` ");
        $pacientes = array();
        while ($registro = $this->conexion->obtenerConsulta()) {
            $paciente = new Paciente(0, '', '', '', 0, '', '', '', '');
            $paciente->setDni($registro->dni);
            $paciente->setNombre($registro->nombre);
            $paciente->setApellido($registro->apellido);
            $paciente->setObra_social($registro->obra_social);
            $paciente->setTelefono($registro->telefono);
            $paciente->setGrupo_sanguineo($registro->grupo_sanguineo);
            $paciente->setAlergias($registro->alergias);
            $paciente->setPatologias_previas($registro->patologias_previas);
            $paciente->setCirugias($registro->cirugias);
            $pacientes[] = $paciente;
        }
        $this->conexion->desconectar();
        return $pacientes;
    }

    public static function getPacientesBD()
    {
        $conexion = new bd_codigo_azul();
        $resultado = $conexion->consultar("SELECT * FROM `paciente` ");
        $pacientes = array();
        while ($registro = $conexion->obtenerConsulta()) {
            $paciente = new Paciente(0, '', '', '', 0, '', '', '', '');
            $paciente->setDni($registro->dni);
            $paciente->setNombre($registro->nombre);
            $paciente->setApellido($registro->apellido);
            $paciente->setObra_social($registro->obra_social);
            $paciente->setTelefono($registro->telefono);
            $paciente->setGrupo_sanguineo($registro->grupo_sanguineo);
            $paciente->setAlergias($registro->alergias);
            $paciente->setPatologias_previas($registro->patologias_previas);
            $paciente->setCirugias($registro->cirugias);
            $pacientes[] = $paciente;
        }
        $conexion->desconectar();
        return $pacientes;
    }

    public static function buscarPaciente($dni)
    {
        $conexion = new bd_codigo_azul();
        $resultado = $conexion->consultar('SELECT * FROM paciente WHERE dni="' . $dni . 'LIMIT 1"');
        $listado = $resultado or die("No se pudo realizar la consulta");
        $unPaciente = null;
        while ($registro = $conexion->obtenerConsulta()) {
            $unPaciente = new paciente($registro->dni, $registro->nombre, $registro->apellido, $registro->obra_social, $registro->telefono, $registro->grupo_sanguineo, $registro->alergias, $registro->patologias_previas, $registro->cirugias);
        }
        $conexion->desconectar();
        return $unPaciente;
    }
    public function bajaPaciente()
    {
        $this->conexion = new bd_codigo_azul();
        $resultado = $this->conexion->consultar("DELETE FROM paciente WHERE dni='" . $this->getDni() . "'");
        $this->conexion->desconectar();
    }
}
