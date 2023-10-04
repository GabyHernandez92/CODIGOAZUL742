
var formulario = document.forms["registro"];


var btnGuardar = document.querySelector('[name="btnRegistrar"]');

btnGuardar.addEventListener("click", function (event) {

    event.preventDefault();
    var dni = document.getElementById('txtDNI').value;
    var nombre = document.getElementById('txtNombre').value;
    var apellido = document.getElementById('txtApellido').value;
    var obrasocial = document.getElementById('txtObraSocial').value;
    var telefono = document.getElementById('txtTelefono').value;
    var gruposang = document.getElementById('txtGrupoSanguineo').value;
    var alergias = document.getElementById('txtAlergias').value;
    var patologiasprev = document.getElementById('txtPatologiasPrevias').value;
    var cirugias = document.getElementById('txtCirugias').value;
    var novalidos = document.getElementsByClassName('novalido');

    var paciente = Array(
        document.getElementById('txtDNI'),
        document.getElementById('txtNombre'),
        document.getElementById('txtApellido'),
        document.getElementById('txtObraSocial'),
        document.getElementById('txtTelefono'),
        document.getElementById('txtGrupoSanguineo'),
        document.getElementById('txtAlergias'),
        document.getElementById('txtPatologiasPrevias'),
        document.getElementById('txtCirugias'),
        document.getElementsByClassName('novalido')
    );

    if (dni === '' || nombre === '' || apellido === '' || obrasocial === '' || telefono === '' || 
    gruposang === '' || alergias === '' || patologiasprev === '' || cirugias === '') {
        for (var i = 0; i < paciente.length; i++) {
            if (paciente[i].value === '') {
                paciente[i].style.background = 'pink';
                paciente[i].style.border = '2px solid red';
                novalidos[i].style.color = 'red';
                novalidos[i].innerHTML = 'Debe completar este campo'
            }
            else {
                paciente[i].style.background = '';
                paciente[i].style.border = '';
                novalidos[i].style.color = '';
                novalidos[i].innerHTML = ''
            }
        }
    } else {
            var continuar = confirm('El documento ingresado es: ' + dni + ' ¿Desea continuar?');

            if (continuar) {
                formulario.submit();
                window.location.href = 'vista_pacientes.php';
            } else {
                document.getElementById('txtDNI').style.background = 'pink';
                document.getElementById('txtDNI').style.border = '2px solid red';
                document.getElementById('txtDNI').focus();
            }
        }
});
