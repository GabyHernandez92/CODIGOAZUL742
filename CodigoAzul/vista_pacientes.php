<?php include 'paciente.class.php'; ?>
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
    <script src="ajax.js"></script>
    <title>Código Azul</title>
</head>

<body>
    <?php include 'navegador.php'; ?>
    <div class="container my-5">
        <p class="display-4">Gestión de Pacientes</p>
        <form action="">
            <div class="mb-3">
                <div class="row">
                    <div class="col-3">
                        <label for="nombrePaciente" class="form-label justify-content-right">Paciente</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="nombrePaciente">
                    </div>
                </div>
            </div>
        </form>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">DNI</th>
                    <th scope="col">Paciente</th>
                    <th scope="col">Obra Social</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Grupo Sanguíneo</th>
                    <th scope="col">Alergias</th>
                    <th scope="col">Patologías previas</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody id="pacientes">
                <?php include 'procesa_paciente.php'; ?>
            </tbody>
        </table>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary" href="formularioPaciente.php" role="button">Nueva</a>
        </div>
    </div>
    <?php include 'footer.php'; ?>

    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>