<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Aulas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-bold-straight/css/uicons-bold-straight.css'>
    <link rel="stylesheet" href="../css/modalesAulas/regAulas.css">
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
                            <i class="fi fi-bs-school"></i>
                        </div>
                        <h1 class="form-title">Registro de Aulas</h1>
                        <form action="../controller_php/controller_createAula.php" method="POST"
                            id="form-RegisterAula">
                            <div class="mb-4">
                                <label for="anioAula" class="form-label"><i class="fi fi-rr-calendar-day"></i> Año escolar</label>
                                <input type="text" class="form-control" name="anioAula" id="anioAula"
                                    placeholder="Ej: 2025-2026" pattern="\d{4}-\d{4}" title="Formato: AAAA-AAAA" required readonly>
                                <p class="error" id="anioErrorCreateA"></p>
                            </div>
                            <div class="mb-4">
                                <label for="nombreAula" class="form-label"><i class="fas fa-font"></i> Nombre del Aula</label>
                                <input type="text" class="form-control" name="nombreAula" id="nombreAula"
                                    placeholder="Ej: Aula 12, Laboratorio 1, etc.">
                                <p class="error" id="nombreErrorCreateA"></p>
                            </div>
                            <div class="mb-4">
                                <label for="capacidadAula" class="form-label"><i class="fi fi-rr-age-restriction-thirteen"></i> Capacidad del Aula</label>
                                <input type="number" class="form-control" name="capacidadAula" id="capacidadAula"
                                    placeholder="Ej: 15, 30, etc." min="1" max="30">
                                <p class="error" id="capacidadErrorCreateA"></p>
                            </div>
                            <div class="mb-4">
                                <label for="gradoAula" class="form-label"><i class="fi fi-bs-square-g"></i> Grado del Aula:</label>
                                <select class="form-select" name="gradoAula" id="gradoAula">
                                </select>
                                <p class="error" id="gradoErrorCreateA"></p>
                            </div>
                            <button type="submit" class="btn btn-submit">
                                <i class="fas fa-plus-circle"></i> Registrar Aula
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/crearAulas.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>