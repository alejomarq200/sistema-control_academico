<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dispositivos</title>
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
                <?php
                include("../Layout/mensajes.php");
                include("../Layout/modalesSeguridad/modalRegDispositivo.php");    
                ?>

                <!-- Título principal con estilo mejorado -->
                <div class="mb-4" style="max-width: 900px; margin: 0 auto; background-color:#F5F5F5; border-radius:15px; padding: 30px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); ">
                    <h1 class="display-5 fw-bold text-primary mb-3">Administrador de Accesos</h1>
                    <p class="lead text-muted">Registe los dispositivos los cuales desea puedan acceder al sistema</p>
                    <div class="mx-auto" style="height: 48; width: 100px; background: linear-gradient(to right, #05357cff, #6c757d, #0d6efd);"></div>
                </div>

                <!-- Contenedor principal con flexbox -->
                <div class="d-flex justify-content-center align-items-start gap-4 flex-wrap" style="max-width: 900px; margin: 0 auto; background-color:#F5F5F5; border-radius:15px; padding: 30px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">

                    <!-- Tarjeta de Backup -->

                    <div class="admin-card" style="background-color: #ebe8ccff;">
                        <button type="submit" id="backup_btn" name="backup_btn" class="card-btn" data-bs-toggle="modal" style="font-size: 15px;"
                            data-bs-target="#formModalVer">
                            <img src="../imgs/computer-solid-full.svg" alt="" style="width: 80px; height:80px; color:rebeccapurple;">
                        </button>
                        <p class="card-label">Registre los dispositivos permitidos</p>
                    </div>

                    <div class="admin-card" style="background-color: #ebe8ccff;">
                        <button type="submit" id="backup_btn" name="backup_btn" class="card-btn">
                            <img src="../imgs/magnifying-glass-solid-full.svg" alt="" style="width: 80px; height:80px; color:rebeccapurple;">
                        </button>
                        <p class="card-label">Consulte los dispositivos permitidos</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>