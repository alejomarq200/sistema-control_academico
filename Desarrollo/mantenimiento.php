<?php
session_start();
error_reporting(0);

include("../Configuration/functions_php/functionsCRUDUser.php");
validarRolyAccesoAdmin($_SESSION['rol'], $_SESSION['estado'], 'Desarrollo/dashboard.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo de Mantenimiento</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../css/moduloMantenimiento.css">
    <style>
        /* Estilos para el contenedor principal con bordes azules pronunciados y relleno azul suave */
        .main-container {
            max-width: 1000px;
            margin: 2rem auto;
            padding: 2rem 1.5rem;
            background-color: #e7f0ff;
            /* relleno azul claro */
            border: 4px solid #0d6efd;
            /* borde azul pronunciado */
            border-radius: 24px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        /* Título decorado */
        .title-block {
            background-color: #ffffffcc;
            backdrop-filter: blur(2px);
            border-radius: 20px;
            padding: 24px 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        /* Tarjetas de acción (Backup y Restore) */
        .admin-card {
            background-color: white;
            border-radius: 24px;
            padding: 25px 20px 20px;
            min-width: 200px;
            width: 100%;
            max-width: 260px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.08);
            transition: transform 0.2s ease;
            border: 1px solid #dee2e6;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .admin-card:hover {
            transform: translateY(-4px);
        }

        /* Botón tipo "carta" para Backup */
        .card-btn {
            background: transparent;
            border: none;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100%;
            cursor: pointer;
            padding: 0;
        }

        /* Ícono de carpeta azul (tamaño grande) */
        .folder-icon {
            font-size: 80px;
            color: #0d6efd;
            /* azul Bootstrap primary */
            line-height: 1;
        }

        /* Ícono de nube azul (tamaño grande) */
        .cloud-icon {
            font-size: 80px;
            color: #0d6efd;
            line-height: 1;
        }

        .card-label {
            font-weight: 600;
            font-size: 1.1rem;
            margin-top: 8px;
            color: #0a2647;
        }

        /* Estilos para el input file y botón Restaurar */
        .custom-file-input {
            border: 2px solid #0d6efd;
            border-radius: 30px;
            padding: 6px 12px;
            background-color: white;
            color: #0d6efd;
            font-weight: 500;
            width: 100%;
            cursor: pointer;
            transition: 0.2s;
        }

        .custom-file-input:hover {
            background-color: #f0f7ff;
        }

        .btn-restore {
            background-color: #0d6efd;
            border: 2px solid #0d6efd;
            color: white;
            border-radius: 30px;
            padding: 8px 0;
            font-weight: 600;
            width: 100%;
            transition: 0.2s;
        }

        .btn-restore:hover {
            background-color: #0b5ed7;
            border-color: #0b5ed7;
            color: white;
        }

        /* Botón "Seleccionar archivo" (blanco con borde azul) lo aplicamos al input file,
       pero usamos clase personalizada para que el botón nativo sea blanco con borde azul */
        input[type="file"]::file-selector-button {
            background-color: white;
            border: 2px solid #0d6efd;
            border-radius: 30px;
            padding: 6px 16px;
            color: #0d6efd;
            font-weight: 500;
            transition: 0.2s;
            margin-right: 12px;
        }

        input[type="file"]::file-selector-button:hover {
            background-color: #f0f7ff;
            border-color: #0a58ca;
            color: #0a58ca;
        }

        /* Ajuste para que el input file se vea limpio */
        .form-control-custom {
            border: 2px solid #0d6efd;
            border-radius: 30px;
            padding: 4px 8px;
            background-color: white;
        }

        /* Espaciado entre tarjetas */
        .cards-wrapper {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: stretch;
            gap: 30px;
        }

        /* Ajuste para pantallas pequeñas */
        @media (max-width: 576px) {
            .admin-card {
                max-width: 100%;
            }
        }
    </style>
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
                <?php include("../Layout/mensajes.php");
                include("../Configuration/Configuration.php");
                include("../Configuration/functions_php/functionMantenimiento.php");
                ?>
                <div class="container-fluid py-4">
                    <!-- Contenedor principal con borde azul, relleno azul y bordes pronunciados -->
                    <div class="main-container">
                        <!-- Título (similar al original pero integrado) -->
                        <div class="text-center title-block mb-4">
                            <h1 class="display-5 fw-bold text-primary mb-2">Administrador de Base de Datos</h1>
                            <p class="lead text-muted">Gestión y mantenimiento de copias de seguridad</p>
                            <div class="mx-auto" style="height: 4px; width: 100px; background: linear-gradient(to right, #05357cff, #6c757d, #0d6efd); border-radius: 4px;"></div>
                        </div>

                        <!-- Contenedor de tarjetas (Backup y Restore) centrado -->
                        <div class="cards-wrapper">
                            <!-- Tarjeta de Backup -->
                            <form action="../controller_php/controlador_Mantenimiento.php" method="post" id="backup-form" style="display: contents;">
                                <div class="admin-card">
                                    <button type="submit" id="backup_btn" name="backup_btn" class="card-btn">
                                        <!-- Ícono de carpeta color azul -->
                                        <i class="bi bi-folder2-open folder-icon"></i>
                                        <p class="card-label">Generar Backup</p>
                                    </button>
                                </div>
                            </form>

                            <!-- Tarjeta de Restore -->
                            <form method="post" action="" enctype="multipart/form-data" id="restore-form" style="display: contents;">
                                <div class="admin-card">
                                    <!-- Ícono de nube azul -->
                                    <div class="mb-2">
                                        <i class="bi bi-cloud-upload cloud-icon"></i>
                                    </div>
                                    <div class="w-100" style="display: flex; flex-direction: column; gap: 10px;">
                                        <!-- Input file con estilo: botón blanco con borde azul, texto "Seleccionar Archivo" -->
                                        <input type="file" name="backup_file" id="backup_file" class="form-control-custom" accept=".sql" required />
                                        <div id="file-error" class="text-danger small" style="display: none;"></div>
                                        <!-- Botón Restaurar azul con borde azul (texto blanco) -->
                                        <input type="submit" name="restore" value="Restaurar" class="btn-restore" />
                                    </div>
                                </div>
                            </form>
                        </div>
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