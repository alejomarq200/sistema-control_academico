<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo de Manuales</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../css/moduloMantenimiento.css">
</head>

<body>
    <div class="wrapper">
        <?php
        error_reporting(0);
        session_start();
        include("menu.php");
        ?>
        <div class="main p-3">
            <div class="text-center">
                <?php include("../Layout/mensajes.php");
                include("../Configuration/Configuration.php");
                include("../Configuration/functions_php/functionMantenimiento.php");
                ?>

                <!-- Título principal con estilo mejorado -->
                <div class="mb-4" style="max-width: 900px; margin: 0 auto; background-color:#F5F5F5; border-radius:15px; padding: 30px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); ">
                    <h1 class="display-5 fw-bold text-primary mb-3">Manuales de Uso del Sistema </h1>
                    <p class="lead text-muted">Manual para administrador y Usuario</p>
                    <div class="mx-auto" style="height: 48; width: 100px; background: linear-gradient(to right, #05357cff, #6c757d, #0d6efd);"></div>
                </div>

                <!-- Contenedor principal con flexbox -->
                <div class="d-flex justify-content-center align-items-start gap-4 flex-wrap" style="max-width: 900px; margin: 0 auto; background-color:#F5F5F5; border-radius:15px; padding: 30px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">

                    <!-- Manual de Administrador -->
                    <form action="#" method="post" id="backup-form">
                        <div class="admin-card" style="background-color: #FFF4A3;">
                            <button type="submit" id="backup_btn" name="backup_btn" class="card-btn">
                                <i class="fi fi-br-file-pdf" style="font-size: 80px; color: #5a4a00;"></i>
                            </button>
                            <p class="card-label">Manual del Administrador</p>
                        </div>
                    </form>

                    <!-- Manual de Usuario -->
                    <form method="post" action="#">
                        <div class="admin-card" style="background-color: #a2bee2ff;">
                            <div class="card-btn">
                                <i class="fi fi-rr-file-pdf" style="font-size: 80px; color: #ffffffff;"></i>
                            </div>
                            <div class="mt-3">
                                <input type="submit" name="restore" value="Restaurar" class="btn btn-primary w-100" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>