<?php include 'area.class.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- JavaScript -->
    <script src="validar.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <!-- Estilo personalizado CSS -->
    <link rel="stylesheet" type="text/css" href="css/miestilo.css">
    <title>Código Azul</title>
</head>

<body>
    <?php include 'navegador.php';
    ?>

    <div class="container my-5">
        <p class="display-4">Ingreso/Modificación</p>
        <div class="row">
            <div class="col-md-8 mx-auto">
                <form name="registro" class="" action="procesa_area.php" method="POST">
                    <div class="form-group">
                        <h3>Nombre</h3>
                        <?php
                        if (isset($_GET['id_area'])) {
                            $area = new Area("");
                            $area->setId($_GET['id_area']);
                            $resultado = $area->get_por_id();
                            echo '<input type="text" name="opcion" id="opcion" value="2" hidden >';
                            echo '<input type="text" name="id_area" id="id_area" value="'.$area->getId().'" hidden >';
                            echo '<input type="text" name="nombreArea" id="nombreArea" value="'.$resultado[0].'" class="form-control" required>';
                        }
                        else{
                            echo '<input type="text" name="opcion" id="opcion" value="1" hidden >';
                            echo '<input type="text" name="nombreArea" id="nombreArea" pattern="[a-zA-Z\s]{2,254}" placeholder="Nombre del área Ej: Quirófano, Habitación, etc." class="form-control" required>';
                        }
                        ?>
                        
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a class="btn btn-secondary mr-3" href="vista_areas.php" role="button">Volver</a>
                        <button class="btn btn-success" type="submit" onsubmit="validarcampos();">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
                                <path d="M11 2H9v3h2V2Z" />
                                <path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0ZM1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5Zm3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4v4.5ZM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5V15Z" />
                            </svg>
                            Guardar
                        </button>

                    </div>
                </form>
            </div>
        </div>


    </div>
    <?php include 'footer.php'; ?>

    <script src="css/bootstrap.min.js"></script>
</body>

</html>