<?php // include_once('usuario.class.php');
?>
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
          <h3>Registrarse</h3>
        </div>
      </div>
      <form name="registro" class="" action="registrar_usuario.php" method="post">
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label for="usuario" class="form-label">Nombre</label>
              <input type="text" name="txtNombre" id="txtNombre" value="" placeholder="Nombre" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="usuario" class="form-label">Apellido</label>
              <input type="text" name="txtApellido" id="txtApellido" value="" placeholder="Apellido" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="usuario" class="form-label">DNI</label>
              <input type="number" name="txtDni" id="txtDni" value="" placeholder="DNI" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="usuario" class="form-label">Usuario</label>
              <input type="text" name="txtUsuario" id="txtUsuario" value="" placeholder="Usuario" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="usuario" class="form-label">Contraseña</label>
              <input type="text" name="txtClave" id="txtClave" value="" placeholder="Contraseña" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="usuario" class="form-label">Correo electrónico</label>
              <input type="text" name="txtCorreo" id="txtTipo" class="form-control" placeholder="Correo electrónico" required>
              <br>
            <div class="text-center">
              <button type="submit" name="btnRegistrar" class="btn btn-success btn-block w-25" onclick="alert ('El usuario ha sido registrado correctamente')">
                REGISTRARSE</button>
            </div>
          </div><!--row-->
        </div>
      </form>

  </section>
  <?php include 'footer.php'; ?>
  <script src="bootstrap.bundle.min.js"></script>
</body>

</html>