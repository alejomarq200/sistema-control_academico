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
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <title>Consultar Aulas</title>
    <link rel="stylesheet" href="../css/modulos/moduloAulas.css">
    <style>
        .filter-group {
            margin-bottom: 0;
            /* Elimina el margen inferior para alinear mejor */
        }

        .filter-label {
            font-size: 0.85rem;
            color: #555;
            margin-bottom: 3px;
            display: block;
        }

        .filter-select {
            border-radius: 6px;
            padding: 6px 12px;
            border: 1px solid #ddd;
        }

        .filters-container {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            margin: 2rem auto;
            max-width: 1200px;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .filters-wrapper {
            display: flex;
            gap: 1.5rem;
            align-items: flex-end;
        }

        .filter-group {
            flex: 1;
            min-width: 200px;
        }

        .filter-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #495057;
            font-size: 0.9rem;
        }

        .filter-select {
            border-radius: 8px;
            border: 1px solid #ced4da;
            padding: 0.65rem 1rem;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.03);
        }

        .filter-select:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15);
            outline: none;
        }
    </style>
</head>

<body>
    <!-- DIV PARA TRABAJAR CON EL MENÚ Y EL FORMULARIO RESPECTIVO  -->
    <div class="wrapper">
        <?php
        include("menu.php");
        ?>
        <!-- CUERPO DEL HTML ESPACIO PARA TRABAJAR YA INCLUIDA LA BARRA  -->
        <div class="main p-3">
            <div class="text-center">
                <?php
                include("../Layout/mensajes.php");
                /* CUERPO DEL MENÚ */
                ?>
                <!-- Título principal con estilo mejorado -->
                <div class="mb-4" style="max-width: 600px; margin: 0 auto; background-color:#F5F5F5; border-radius:15px; padding: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); ">
                    <h1 class="display-5 fw-bold" style='color: rgb(37, 64, 90);'>Módulo de Aulas</h1>
                    <p class="lead text-muted">Gestione y administre la información de las Aulas</p>
                </div>
                
                <div class="filters-container">
                    <!-- FILTROS CON DISEÑO MODERNO -->
                    <div class="filters-wrapper">
                        <!-- Filtro de Nivel Académico -->
                        <div class="filter-group">
                            <label for="filtroGenero" class="filter-label">
                                <i class='bx bx-check-circle'></i>Estado
                            </label>
                            <select name="estado_aulas" id="estado_aulas" class="form-select filter-select">
                                <option value="Seleccionar">Seleccionar</option>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                        </div>
                        <!-- Filtro de Grado con estilo mejorado -->
                        <div class="filter-group">
                            <label for="filtroGenero" class="filter-label">
                                <i class="bi bi-book-half"></i> Grado Académico
                            </label>
                            <select name="grado_aulas" id="grado_aulas" class="form-select filter-select">

                            </select>
                        </div>
                        <div class="filter-group">
                            <label for="recargar" class="filter-label">
                                Limpiar
                            </label>
                            <button style="padding: 6px 12px; border:none; background-color: #86b7fe; border-radius:12px; color:white;" id="recargar"><i class="fi fi-br-rotate-right"></i></button>
                        </div>

                    </div>
                </div>

                <div class="container-table">
                    <table id="tablaxAulas" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">Nombre del Aula</th>
                                <th scope="col">Capacidad</th>
                                <th scope="col" style="display: none;">Grado</th>
                                <th scope="col" style="display: none;">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            include("../Configuration/Configuration.php");
                            include("../Layout/modalesAulas/modalAulaEdit.php");
                            include("../Layout/modalesAulas/modalAEnable.php");
                            include("../Layout/modalesAulas/modalADisable.php");
                            include("../Configuration/functions_php/functionesCRUDAulas.php");

                            $aulas = consultarAulas($pdo); // Obtener los usuarios
                            if (!empty($aulas)): ?>
                                <?php foreach ($aulas as $aula): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($aula['nombre']); ?></td>
                                        <td><?= htmlspecialchars($aula['capacidad']); ?></td>
                                        <td style="display: none;"><?= htmlspecialchars($aula['nombre_grado']); ?></td>
                                        <td style="display: none;"><?= htmlspecialchars($aula['nombre_estado']); ?></td>
                                        <td>
                                            <!-- Botón Editar -->
                                            <a href="#ModalFormEditaAula" class="btn btn-dark" data-bs-toggle="modal"
                                                data-bs-target="#ModalFormEditaAula"
                                                data-id="<?= htmlspecialchars($aula['id_aula']); ?>"
                                                data-nombre="<?= htmlspecialchars($aula['nombre']); ?>"
                                                data-capacidad="<?= htmlspecialchars($aula['capacidad']); ?>"
                                                data-id_grado="<?= htmlspecialchars($aula['nombre_grado']); ?>"
                                                data-estado="<?= htmlspecialchars($aula['nombre_estado']); ?>">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>

                                            <!-- Botón Activar -->
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                data-bs-target="#ModalFormEnableA"
                                                data-id="<?= htmlspecialchars($aula['id_aula']); ?>"
                                                data-nombre="<?= htmlspecialchars($aula['nombre']); ?>"
                                                data-capacidad="<?= htmlspecialchars($aula['capacidad']); ?>"
                                                data-id_grado="<?= htmlspecialchars($aula['nombre_grado']); ?>"
                                                data-estado="<?= htmlspecialchars($aula['nombre_estado']); ?>">
                                                <i class='bx bx-check-circle'></i>
                                            </button>

                                            <!-- Botón Desactivar -->
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#ModalFormDisableA"
                                                data-id="<?= htmlspecialchars($aula['id_aula']); ?>"
                                                data-nombre="<?= htmlspecialchars($aula['nombre']); ?>"
                                                data-capacidad="<?= htmlspecialchars($aula['capacidad']); ?>"
                                                data-id_grado="<?= htmlspecialchars($aula['nombre_grado']); ?>"
                                                data-estado="<?= htmlspecialchars($aula['nombre_estado']); ?>">
                                                <i class="bi bi-x-circle"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5">No se encontraron aulas.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous">
    </script>
    <!-- DATATABLES -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js">
    </script>
    <!-- BOOTSTRAP -->
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js">
    </script>
    <script src="../js/moduloAulas.js"></script>
</body>

</html>