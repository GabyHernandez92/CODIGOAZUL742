<?php
    function liberarVariablesSesion () { //libera todas las variables de sesion
        unset ($_SESSION['nombre']);
        unset ($_SESSION['apellido']);
        unset ($_SESSION['dni']);
        unset ($_SESSION['usuario']);
        unset ($_SESSION['clave']);
        unset ($_SESSION['correo']);
        unset ($_SESSION['tipo_usuario']);
    }
?>

