<?php

include_once('llamado.class.php');

function recargarTbody()
{
    $array_resultado= llamado::join_resultado();

    if (count($array_resultado) == 0) {
        echo '<td class="text-danger" colspan=3>No existen llamados</td>';
    } else {
        foreach ($array_resultado as $r) {
    
            echo '<tr>
            <td scope="row">' . $r->id_llamado. '</td>
            <td scope="row">' . $r->dni_paciente. '</td>
            <td scope="row">' . $r->nombre. '</td>
            <td scope="row">' . $r->area. '</td>
            <td scope="row">' . $r->fecha_ingreso. '</td>
            <td scope="row">' . $r->hora_ingreso. '</td>
            <td scope="row">' . $r->fecha_atencion. '</td>
            <td scope="row">' . $r->hora_atencion. '</td>
            <td scope="row">' . $r->origen. '</td>
            <td scope="row">' . $r->estado. '</td>
            <td scope="row">' . $r->tiempo_espera. '</td>

            <td>
                <a class="btn btn-warning" href="formularioEditarEstado.php?id_llamado=' . $r->id_llamado . '" role="button" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                    </svg>
                Atender llamado</a>
            </td>
        </tr>';
        } 
    }
}

cargarTabla();

function cargarTabla()
{
    echo '<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">DNI Paciente</th>
            <th scope="col">Usuario</th>
            <th scope="col">Area</th>
            <th scope="col">Fecha Ingreso</th>
            <th scope="col">Hora Ingreso</th>
            <th scope="col">Fecha Atencion</th>
            <th scope="col">Hora Atencion</th>
            <th scope="col">Origen</th>
            <th scope="col">Estado</th>
            <th scope="col">Tiempo espera</th>
        </tr>
    </thead>
    <tbody id="table_body">
    ';
    recargarTbody();
    echo '</tbody>
    </table>';
}




//$nom_llamado = "";

//if (isset($_POST[""])) {
//    $nom_area = $_POST["nombreArea"];
//    $area = new Area($nom_area);
//    $area->alta();
//    header("Location: vista_areas.php");
//} else if (isset($_GET["id_area"])) {
//    $area = new Area($nom_area);
//    $area->setId($_GET["id_area"]);
//    $area->baja();
//    recargarTbody();
//} else {
//    cargarTabla();
//}
//