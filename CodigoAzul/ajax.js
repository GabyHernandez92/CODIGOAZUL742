function ObtenerXHR() {
    req = false;
    if (window.XMLHttpRequest) { req = new XMLHttpRequest(); }
    else {
        if (window.ActiveXObject) { req = new ActiveXObject("Microsoft.XMLHTTP"); }
    }
    return req;
}
////////////////////////////////////tabla areas///////////////////////////////////////////////
function bajaArea(btn) {
    var peticion = ObtenerXHR();
    var id_area = btn.value;
    peticion.open("GET", "procesa_area.php?id_area=" + id_area, true);
    peticion.onreadystatechange = cargoDatos;
    peticion.send(null);
    function cargoDatos() {
        if (peticion.readyState === 4 && peticion.status === 200) {
            var data = peticion.responseText;
            document.getElementById('table_body').innerHTML = data;
        }
    }
}
////////////////////////////////////tabla pacientes///////////////////////////////////////////////
function bajaPaciente(btn) {
    var peticion = ObtenerXHR();
    var dni = btn.value;
    peticion.open("GET", "procesa_paciente.php?dni=" + dni, true);
    peticion.onreadystatechange = cargoDatos;
    peticion.send(null);
    function cargoDatos() {
        if (peticion.readyState === 4 && peticion.status === 200) {
            var data = peticion.responseText;
            document.getElementById('pacientes').innerHTML = data;
        }
    }
}