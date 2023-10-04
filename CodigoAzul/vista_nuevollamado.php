<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <!-- font-awesome CSS -->
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <!-- Estilo personalizado CSS -->
  <link rel="stylesheet" type="text/css" href="css/miestilo.css">
  <title>Código Azul</title>
</head>
<?php include 'navegador.php'; ?>
<body>
    <div class="container mt-3">
      <div class="row">
        <div class="col-12 centrado">
          <h3>Registrar Nuevo llamado</h3>
        </div>
      </div>
      <form name="registro" class="" action="registrar_llamado.php" method="post">
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label for="usuario" class="form-label">DNI Paciente</label>
              <select name="cmbPacientes" id="cmbPacientes">
                    <option value="0">-----</option>
                    <?php
                    include_once 'paciente.class.php';
                    $lstPacientes = Paciente::getPacientesBD();
                    if (count($lstPacientes) > 0) {
                        foreach ($lstPacientes as $p) {
                            echo '<option value="' . $p->getDni() . '">' . $p->getDni() . '</option>';
                        }
                    }
                    ?>
                </select>    
            </div>
            <div class="form-group">
              <label for="usuario" class="form-label">DNI Usuario</label>
              <input type="number" readonly name="txtNombre" id="txtDNIusuario" class="form-control" value=<?php echo $_SESSION["dni"] ?> >
            </div>
            <div class="form-group">
              <label for="usuario" class="form-label">Nombre Area</label>
              <select name="cmbAreas" id="cmbAreas">
                    <option value="0">-----</option>
                    <?php
                    include_once 'area.class.php';
                    $lstAreas = Area::get_areasBD();
                    if (count($lstAreas) > 0) {
                        foreach ($lstAreas as $a) {
                            echo '<option value="' . $a->getId() . '">' . $a->getNombre() . '</option>';
                        }
                    }
                    ?>
                </select>                
            </div>
            <div class="form-group">
              <label for="usuario" class="form-label">Tipo llamado</label>
              <input type="radio" id="urgente" name="llamado" value="urgente" >
              <label for="urgente">URGENTE</label>
              <input type="radio" id="normal" name="llamado" value="normal">
              <label for="normal">NORMAL</label>
            </div>
            <div class="form-group">
              <input type="hidden" readonly name="txtFechaIngreso" id="txtFechaIngreso" value= <?php  $DateAndTime = date('d-m-Y', time()); echo "'$DateAndTime'"; ?> placeholder=" " class="form-control" required >
            </div> 
            <div class="form-group">
              <input type="hidden" readonly name="txtHoraIngreso" id="txtHoraIngreso" value= <?php  date_default_timezone_set("America/Argentina/Ushuaia"); $DateAndTime = date('h:i:s a', time()); echo "'$DateAndTime'"; ?> placeholder=" " class="form-control" required >
            </div> 
            <div class="form-group">
              <label for="usuario" class="form-label">Origen</label>
              <input type="radio" id="cama" name="origen" value="cama">
              <label for="cama">CAMA</label>
              <input type="radio" id="baño" name="origen" value="baño">
              <label for="baño">BAÑO</label>
            </div>
            <div class="text-center">
            <button type="submit" name="btnRegistrar" class="btn btn-success btn-block" onclick="alert ('El paciente ha sido registrado correctamente')">REGISTRAR LLAMADO</button>
            </div>
          </div><!--row-->
        </div>
      </form>

  <?php include 'footer.php'; ?>
  <script src="bootstrap.bundle.min.js"></script>
</body>
</html>