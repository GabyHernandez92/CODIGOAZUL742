<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
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
            background-color: #ffffff;
        }
    </style>
</head>
<?php include 'navegador.php'; ?>

<body>
    <div class="container w-75 mt-5">
        <div class="row">
            <div>
                <h1 align="center">NUEVO LLAMADO</h1>
            </div>
            <div>
                <div class="d-grid gap-2 d-md-flex center-content-md-end">
                <label class="col text-center">CLICK AQUÍ<a href="vista_nuevollamado.php" role="button" class="btn btn-danger regular-button"> NUEVO LLAMADO </a></label>              
                </div>
            </div>
        </div>
    </div>
</body>
<?php include 'footer.php'; ?>
<script src="bootstrap/js/bootstrap.min.js"></script>
</html>