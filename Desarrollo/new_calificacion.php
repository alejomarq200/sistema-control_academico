<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo de Calificaciones</title>
    <link rel="stylesheet" href="../css/modulos/moduloCalificaciones.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
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
                <div class="module-container">
                    <h1 class="module-title">Módulo de Calificaciones: Registrar calificaciones</h1>

                    <div class="buttons-container">
                        <a href="../Desarrollo/calificacion_primaria.php" class="action-button primary-button">
                            <i class="fas fa-pencil-alt button-icon"></i>
                            Registrar calificación primaria
                        </a>

                        <a href="../Desarrollo/calificacion_secundaria.php" class="action-button secondary-button">
                            <i class="fas fa-graduation-cap button-icon"></i>
                            Registrar calificación secundaria
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>