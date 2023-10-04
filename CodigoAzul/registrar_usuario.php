
<?php
include_once("usuario.class.php");
	if(!empty($_POST)){

		if(isset($_POST["txtNombre"]) and isset($_POST["txtApellido"]) and isset($_POST["txtDni"]) and isset($_POST["txtUsuario"]) and isset($_POST["txtClave"]) and isset($_POST["txtCorreo"])) {
			$user = new usuario($_POST["txtDni"], $_POST["txtNombre"], $_POST["txtApellido"], $_POST["txtUsuario"], $_POST["txtClave"], $_POST["txtCorreo"]); 
			$user->registrarUsuario();	//si los campos del formulario están seteados (tienen datos) entones, crear un objeto de clase Usuario y llamar a la funcion que lo registra en la bd
	}
//falta redireccionar, queda pantalla en 
//blanco luego de registrar usuario
}
?>
