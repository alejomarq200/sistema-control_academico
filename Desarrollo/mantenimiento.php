<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo de Mantenimiento</title>
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
                    <h1 class="display-5 fw-bold text-primary mb-3">Administrador de Base de Datos</h1>
                    <p class="lead text-muted">Gestión y mantenimiento de copias de seguridad</p>
                    <div class="mx-auto" style="height: 48; width: 100px; background: linear-gradient(to right, #05357cff, #6c757d, #0d6efd);"></div>
                </div>

                <!-- Contenedor principal con flexbox -->
                <div class="d-flex justify-content-center align-items-start gap-4 flex-wrap" style="max-width: 900px; margin: 0 auto; background-color:#F5F5F5; border-radius:15px; padding: 30px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">

                    <!-- Tarjeta de Backup -->
                    <form action="../controller_php/controlador_Mantenimiento.php" method="post" id="backup-form">
                        <div class="admin-card" style="background-color: #FFF4A3;">
                            <button type="submit" id="backup_btn" name="backup_btn" class="card-btn">
                                <i class="bi bi-database-check" style="font-size: 80px; color: #5a4a00;"></i>
                            </button>
                            <p class="card-label">Generar Backup</p>
                        </div>
                    </form>

                    <!-- Tarjeta de Restore -->
                    <form method="post" action="" enctype="multipart/form-data" id="restore-form">
                        <div class="admin-card" style="background-color: #D8BFD8;">
                            <div class="card-btn">
                                <i class="bi bi-database-down" style="font-size: 80px; color: #4b2e4b;"></i>
                            </div>
                            <div class="mt-3">
                                <input type="file" name="backup_file" id="backup_file" class="form-control mb-2" accept=".sql" required />
                                <div id="file-error" class="text-danger small mb-2" style="display: none;"></div>
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
<script src="../js/moduloMantenimiento.js"></script>
<?php

if (!empty($_FILES)) {
    // Validating SQL file type by extensions
    if (
        !in_array(strtolower(pathinfo($_FILES["backup_file"]["name"], PATHINFO_EXTENSION)), array(
            "sql"
        ))
    ) {
        $response = array(
            "type" => "error",
            "message" => "Invalid File Type"
        );
    } else {
        if (is_uploaded_file($_FILES["backup_file"]["tmp_name"])) {
            move_uploaded_file($_FILES["backup_file"]["tmp_name"], $_FILES["backup_file"]["name"]);
            $response = restoreMysqlDB($_FILES["backup_file"]["name"], $pdo);
            $_SESSION['mensaje'] = 'Se realizó la restauración con éxito.';
            $_SESSION['icono'] = 'success';
            $_SESSION['titulo'] = 'Success';
            header("Location: ../Desarrollo/prueba_mant.php");
        } else {
            $_SESSION['mensaje'] = 'Error';
            $_SESSION['icono'] = 'error';
            $_SESSION['titulo'] = 'Error';
            header("Location: ../Desarrollo/prueba_mant.php");
        }
    }
}
?>