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
        include("menu_1.php");
        ?>
        <div class="main p-3">
            <div class="text-center">
                <?php
                include("../Layout/mensajes.php");
                include("../Configuration/Configuration.php");
                include("../Configuration/functions_php/functionMantenimiento.php");
                ?>

                <!-- Título principal -->
                <div class="mb-4" style="max-width: 900px; margin: 0 auto; background-color: #CBC6E0; border-radius:15px; padding: 30px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                    <h1 class="display-5 fw-bold text-primary mb-3">Manuales de Uso del Sistema</h1>
                    <p class="lead text-muted">Manual para administrador y Usuario</p>
                    <div class="mx-auto" style="height: 48; width: 100px; background: linear-gradient(to right, #05357cff, #6c757d, #0d6efd);"></div>
                </div>

                <!-- Contenedor principal -->
                <div style="max-width: 450px; margin: 0 auto; background-color: #F5F5F5; border-radius: 15px 10px 10px 14px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); margin-bottom: 50px;">

                    <?php if ($_SESSION['rol'] == 1 && $_SESSION['estado'] == 2): ?>
                        <!-- Manual de Administrador - Contenedor individual -->
                        <div style="background-color: #cbc6e1; border-radius: 12px; padding: 25px; text-align: center; transition: transform 0.3s ease;"
                            onmouseover="this.style.transform='scale(1.02)'"
                            onmouseout="this.style.transform='scale(1)'">
                            <button onclick="window.location.href='../controller_php/controller_manuales.php?ref=ManualAdmin'"
                                style="background: none; border: none; cursor: pointer; display: flex; flex-direction: column; align-items: center; width: 100%;">
                                <i class="fi fi-br-file-pdf" style="font-size: 80px; color: #000000; margin-bottom: 10px;"></i>
                                <i class="fi fi-rr-user-crown" style="font-size: 30px; color: #000000; margin-bottom: 5px;"></i>
                                <p style="margin: 0; font-size: 18px; font-weight: bold; color: #070707;">Manual del Administrador</p>
                                <p style="margin: 5px 0 0 0; font-size: 14px; color: #000000;">Acceso exclusivo para administradores</p>
                            </button>
                        </div>
                    <?php endif; ?>
                </div>
                <div style="max-width: 450px; margin: 0 auto; background-color: #F5F5F5; border-radius: 15px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">

                    <!-- Manual de Usuario - Contenedor individual -->
                    <div style="background-color: #fdd965; border-radius: 12px; padding: 25px; text-align: center; transition: transform 0.3s ease;"
                        onmouseover="this.style.transform='scale(1.02)'"
                        onmouseout="this.style.transform='scale(1)'">
                        <button onclick="window.location.href='../controller_php/controller_manuales.php?ref=ManualUser'"
                            style="background: none; border: none; cursor: pointer; display: flex; flex-direction: column; align-items: center; width: 100%;">
                            <i class="fi fi-rr-file-pdf" style="font-size: 80px; color: rgb(43, 30, 30); margin-bottom: 10px;"></i>
                            <i class="fi fi-rr-user" style="font-size: 30px; color: rgb(22, 22, 22); margin-bottom: 5px;"></i>
                            <p style="margin: 0; font-size: 18px; font-weight: bold; color: rgb(0, 0, 0);">Manual del Usuario</p>
                            <p style="margin: 5px 0 0 0; font-size: 14px; color: #000000;">Guía básica para todos los usuarios</p>
                        </button>
                    </div>
                </div>

            </div>
        </div>

</html>