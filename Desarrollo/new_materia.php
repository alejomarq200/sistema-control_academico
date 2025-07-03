<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Asignaturas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/modalesMaterias/regMateria.css">
</head>
<body>
    <!-- DIV PARA TRABAJAR CON EL MENÚ Y EL FORMULARIO RESPECTIVO  -->
    <div class="wrapper">
        <?php
        error_reporting(0);
        session_start();
        include("menu.php");
        ?>
        <!-- CUERPO DEL HTML ESPACIO PARA TRABAJAR YA INCLUIDA LA BARRA  -->
        <div class="main p-3">
            <div class="text-center">
                <?php
                include("../Layout/mensajes.php");
                /* CUERPO DEL MENÚ */
                ?>
                <div class="container">
                    <div class="form-container">
                        <div class="education-icon">
                            <i class="fas fa-book-open"></i>
                        </div>
                        <h1 class="form-title">Registro de Asignaturas</h1>
                        <form action="../controller_php/controller_CreateMateria.php" method="POST"
                            id="form-RegisterMateria">
                            <div class="mb-4">
                                <label for="nombreCreateM" class="form-label"><i class="fas fa-font"></i> Nombre de la
                                    Asignatura</label>
                                <input type="text" class="form-control" name="nombreCreateM" id="nombreCreateM"
                                    placeholder="Ej: Matemáticas">
                                <p class="error1" id="nombreErrorCreateM"></p>
                            </div>

                            <div class="mb-4">
                                <label for="nivelCreateM" class="form-label"><i class="fas fa-layer-group"></i> Nivel de
                                    la
                                    Asignatura</label>
                                <select class="form-select" name="nivelCreateM" id="nivelCreateM">
                                    <option value="Seleccionar" selected>Seleccione un nivel...</option>
                                    <option value="Primaria">Primaria</option>
                                    <option value="Secundaria">Secundaria</option>
                                </select>
                                <p class="error1" id="nivelErrorCreateM"></p>
                            </div>

                            <button type="submit" class="btn btn-submit">
                                <i class="fas fa-plus-circle"></i> Registrar Asignatura
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SCRIPT -->
    <script src="../js/crearMateria.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>