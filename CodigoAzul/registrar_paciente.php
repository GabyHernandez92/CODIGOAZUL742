<?php
include_once ("paciente.class.php");
	if(!empty($_POST)){
        
		if(isset($_POST["txtDNI"]) and isset($_POST["txtNombre"]) and isset($_POST["txtApellido"]) and isset($_POST["txtObraSocial"]) and isset($_POST["txtTelefono"]) and isset($_POST["txtGrupoSanguineo"]) and isset($_POST["txtAlergias"])and isset($_POST["txtPatologiasPrevias"]) and isset($_POST["txtCirugias"])) {
			$paciente = new Paciente($_POST["txtDNI"], $_POST["txtNombre"], $_POST["txtApellido"], $_POST["txtObraSocial"], $_POST["txtTelefono"], $_POST["txtGrupoSanguineo"], $_POST["txtAlergias"],$_POST["txtPatologiasPrevias"], $_POST["txtCirugias"]); 
			$paciente->registrarPaciente();	//si los campos del formulario están seteados (tienen datos) entones, crear un objeto de clase Usuario y llamar a la funcion que lo registra en la bd
			header ("Location: vista_pacientes.php");
		}
	
}
//falta vista listar pacientes para asignarles enfermero
?>