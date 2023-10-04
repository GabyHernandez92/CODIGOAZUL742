<?php include 'paciente.class.php'; ?>
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

<body>
  <?php include 'navegador.php'; ?>
  <section>
    <div class="container mt-5">
      <div class="row">
        <div class="col-12 centrado">
          <h3>Registrar Nuevo Paciente</h3>
        </div>
      </div>

      <form name="registro" action="procesa_paciente.php" method="post">
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <?php
              $p = new Paciente('', '', '', '', '', '', '', '', '');
              if (isset($_GET['id_paciente'])) {
                $p = paciente::buscarPaciente($_GET['id_paciente']);
                echo '<input type="text" name="opcion" id="opcion" value="2" hidden >';
              } else {
                echo '<input type="text" name="opcion" id="opcion" value="1" hidden >';
              }
              ?>
              <label for="txtDNI" class="form-label">DNI</label>
              <input type="number" name="txtDNI" id="txtDNI" value="<?php if (isset($_GET['id_paciente'])) {
                echo $p->getDni();
              } ?>" placeholder="DNI" class="form-control" required>
              <div class="novalido"></div>
            </div>
            <div class="form-group">
              <label for="txtNombre" class="form-label">Nombre</label>
              <input type="text" name="txtNombre" id="txtNombre" value="<?php echo $p->getNombre(); ?>" placeholder="Nombre" class="form-control" required>
              <div class="novalido"></div>
            </div>
            <div class="form-group">
              <label for="txtApellido" class="form-label">Apellido</label>
              <input type="text" name="txtApellido" id="txtApellido" value="<?php echo $p->getApellido(); ?>" placeholder="Apellido" class="form-control" required>
              <div class="novalido"></div>
            </div>
            <div class="form-group">
              <label for="txtObraSocial" class="form-label">Obra Social</label>
              <input type="text" name="txtObraSocial" id="txtObraSocial" value="<?php echo $p->getObra_social(); ?>" placeholder="Obra Social" class="form-control" required>
              <div class="novalido"></div>
            </div>
            <div class="form-group">
              <label for="txtTelefono" class="form-label">Telefono</label>
              <input type="number" name="txtTelefono" id="txtTelefono" value="<?php echo $p->getTelefono(); ?>" placeholder="Telefono" class="form-control" required>
              <div class="novalido"></div>
            </div>
            <div class="form-group">
              <label for="txtGrupoSanguineo" class="form-label">Grupo sanguineo</label>
              <input type="text" name="txtGrupoSanguineo" id="txtGrupoSanguineo" value="<?php echo $p->getGrupo_sanguineo(); ?>" placeholder="Grupo Sanguineo" class="form-control" required>
              <div class="novalido"></div>
            </div>
            <div class="form-group">
              <label for="txtAlergias" class="form-label">Alergias</label>
              <input type="text" name="txtAlergias" id="txtAlergias" value="<?php echo $p->getAlergias(); ?>" class="form-control" placeholder="Alergias" required>
              <div class="novalido"></div>
            </div>
            <div class="form-group">
              <label for="txtPatologiasPrevias" class="form-label">Patologias Previas</label>
              <input type="text" name="txtPatologiasPrevias" id="txtPatologiasPrevias" value="<?php echo $p->getPatologias_previas(); ?>" class="form-control" placeholder="Patologias Previas" required>
              <div class="novalido"></div>
            </div>
            <div class="form-group">
              <label for="txtCirugias" class="form-label">Cirugias</label>
              <input type="text" name="txtCirugias" id="txtCirugias" value="<?php echo $p->getCirugias(); ?>" class="form-control" placeholder="Cirugias" required>
              <div class="novalido"></div>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <a class="btn btn-secondary mr-3" href="vista_pacientes.php" role="button">Volver</a>
              <button type="submit" name="btnRegistrar" class="btn btn-success btn-block w-25">
                GUARDAR</button>
            </div>
          </div><!--row-->
        </div>
      </form>
  </section>
  <?php include 'footer.php'; ?>
  <script src="validar_ingreso.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>