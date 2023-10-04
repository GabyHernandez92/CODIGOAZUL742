
<?php

include_once ("bd_codigo_azul.php");		
	$con = new bd_codigo_azul(); //conexión a la base de datos
	
	if(!empty($_POST)){ //si los campos usuario y clave del formulario del login no estan vacios entonces
		$usuario = $_POST["txtUsuarioInicio"]; //asignar a la variable $usaurio lo obtenido del formulario
		$contrasenia = $_POST["txtContraseña"];
		$rs = $con->consultar("SELECT * FROM usuario WHERE usuario = '$usuario' AND clave = '$contrasenia' ");
		//se obtienen los datos almacenados en la bd en la tabla del usuario 

		if($rs->num_rows>0){
			while($row = mysqli_fetch_array($rs)){
				
				session_start(); //iniciar sesion y asignar variables de sesión
				$_SESSION["nombre"]=$row["nombre"];
				$_SESSION["apellido"]=$row["apellido"];
				$_SESSION["dni"]=$row["dni"];
				$_SESSION["usuario"]=$row["usuario"];
				$_SESSION["clave"]=$row["clave"];
				$_SESSION["correo"]=$row["correo"];
				$_SESSION["tipo_usuario"]=$row["tipo_usuario"];
				header("Location: paginaPrincipal.php");
								
			}

		}else{ // si alguno de los campos del login estan vacios

			if (empty($_POST["txtUsuarioInicio"]) or empty($_POST["txtContraseña"])) {
				echo"<script type=\"text/javascript\">alert('Por favor complete los campos solicitados'); </script>"; //mensaje de alerta
				include 'index.php'; //recargar formulario de login
			}		
	
		}
		
	}else{ //si alguno de los datos ingresados en el login es invalido (verificado en la bd)
        //mensaje de alerta de datos invalidos
		echo "Por favor complete los datos!";
		include 'index.php';
	}
	$con->desconectar();
?>
