<?php

include_once('paciente.class.php');

function recargarPacientes()
{
    $pac = new paciente(0, '', '', '', 0, '', '', '', '');

    $pacientes = $pac->getPacientes();
    if (count($pacientes) == 0) {
        echo '<td class="text-danger" colspan=3>No existen pacientes registrados</td>';
    } else {
        foreach ($pacientes as $p) {
            echo '<tr>
            <td scope="row">' . $p->getDni() . '</td>
            <td>' . $p->getApellido() . " " . $p->getNombre() . '</td>
            <td>' . $p->getObra_social() . '</td>
            <td>' . $p->getTelefono() . '</td>
            <td>' . $p->getGrupo_sanguineo() . '</td>
            <td>' . $p->getAlergias() . '</td>
            <td>' . $p->getPatologias_previas() . '</td>
            <td>
                <a class="btn btn-secondary" href="formularioPaciente.php?id_paciente=' . $p->getDni() . '" role="button" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                    </svg>
                Editar</a>
                <button class="btn btn-danger" href="#" data-id="baja" value="' . $p->getDni() . '" onclick="bajaPaciente(this);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                    </svg>
                Borrar</button>
            </td>
        </tr>';
        }
    }
}

if (isset($_POST['opcion'])) {
    $opcion = $_POST['opcion'];
    if (isset($_POST["txtDNI"]) and isset($_POST["txtNombre"]) and isset($_POST["txtApellido"]) and isset($_POST["txtObraSocial"]) and isset($_POST["txtTelefono"]) and isset($_POST["txtGrupoSanguineo"]) and isset($_POST["txtAlergias"]) and isset($_POST["txtPatologiasPrevias"]) and isset($_POST["txtCirugias"])) {
        $paciente = new Paciente($_POST["txtDNI"], $_POST["txtNombre"], $_POST["txtApellido"], $_POST["txtObraSocial"], $_POST["txtTelefono"], $_POST["txtGrupoSanguineo"], $_POST["txtAlergias"], $_POST["txtPatologiasPrevias"], $_POST["txtCirugias"]);
        switch ($opcion) {
            case '1': {
                    $paciente->registrarPaciente(); //si los campos del formulario están seteados (tienen datos) entones, crear un objeto de clase Usuario y llamar a la funcion que lo registra en la bd
                }
                break;
            case '2':
                $paciente->modificarPaciente();
                break;
            default:
                recargarPacientes();
                break;
        }
    }
} else if (isset($_GET["dni"])) {
    $paciente = new Paciente($_GET["dni"], '', '', '', 0, '', '', '', '');
    $paciente->bajaPaciente();
    recargarPacientes();
} else {
    recargarPacientes();
}
/*
if (isset($_POST["nombreArea"])) {
    $nombre_paciente = $_POST["nombreArea"];
    $area = new Area($nom_area);
    $area->alta();
    header("Location: vista_areas.php");
} else if (isset($_GET["id_area"])) {
    $area = new Area($nom_area);
    $area->setId($_GET["id_area"]);
    $area->baja();
    recargarPacientes();
} else {
    recargarPacientes();
}*/