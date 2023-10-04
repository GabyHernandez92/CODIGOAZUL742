<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <!-- Estilo personalizado CSS -->
  <link rel="stylesheet" type="text/css" href="css/miestilo.css">
	<title>Código Azul</title>

  <style>
    .bg {
        background-image: url(img/LOGO742.png);
        background-position: center;
    }
    body {
  background-color: #FFE4C4; 
  background: linear-gradient(to right, #FFA751, #00ffff);
    }
    .container {
  background-color: #00ffff;
}
  </style>
</head>

<body>
<?php include 'navegador.php'; ?>
	<section>
    <div class="container w-75 mt-5">
      <div class="row">
        <div class="col py-5">
          <img src="img/LOGO742.png" width="500" alt="150">
        </div>

        <div class="col">
          <h2 class="fw-bold text-center py-5">Bienvenido</h2>
          <!--LOGIN-->
    <form action="autenticarUsuario.php" method="post">
      <div class="mb-4">
        <label for="usuario" class="form-label">Usuario</label>
        <input type="text" class="form-control" name="txtUsuarioInicio" required>
      </div>
       <div class="mb-4">
        <label for="contraseña" class="form-label">Contraseña</label>
        <input type="contraseña" class="form-control" name="txtContraseña" required>
      </div>

      <div class="d-grid"> <!--expandirse en el ancho de la pagina-->
        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
      </div>

      <div class="my-3">
        <span>¿No tenés cuenta? <a href="formulario_registro.php">Registrarse</a> </span>
        
      </div>

<!--BOTONES REDES SOCIALES-->

      <div class="container w-100 my-5">
        <div class="row text-center">
          <div class="col-12">Iniciar Sesión</div>
        </div> 

        <div class="row">
          <div class="col">
            <button class="btn btn-outline-primary w-100 my-1">
              <div class="row align-items-center">
                <div class="col-2">
                  <img src="img/logofb.png" width="32" alt="">
                </div>

                <div class="col-10 text-center">
                  Facebook
                </div>
              </div>
            </button>
          </div>

          <div class="col">
            <button class="btn btn-outline-danger w-100 my-1">
              <div class="row align-items-center">
                <div class="col-2">
                  <img src="img/logogle.png" width="32" alt="">
                </div>

                <div class="col-10 text-center">
                  Google
                </div>
              </div>
            </button>
        
          </div>
      </form>
        </div>
      </div>
      </div>

</div>
	</section>
  <?php include 'footer.php'; ?>
  <script src="bootstrap.bundle.min.js"></script>
</body>
</html>