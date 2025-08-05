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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <title>Consultar Aulas</title>
    <link rel="stylesheet" href="../css/moduloAulas.css">
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
                <div class="filters-container">
                    <h1 class="my-3" id="titulo">Módulo de Aulas</h1>

                    <!-- FILTROS CON DISEÑO MODERNO -->
                    <div class="filters-wrapper">
                        <div class="filtro-container d-flex align-items-center">
                            <input type="text" id="txtFiltarr" class="filtro-input form-control"
                                placeholder="Buscar...">
                            <span class="lupa-icon ms-2">&#128269;</span> <!-- Icono de lupa -->
                        </div>

                        <div class="filter-group">
                            <label for="filtroEstado" class="filter-label">
                                <i class="bi bi-check-circle"></i> Estado
                            </label>
                            <select id="filtroEstado" class="form-select filter-select" style="width: 70%; margin:auto">
                                <option value="">Estado</option>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="custom-table">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Nombre del Aula</th>
                                <th scope="col">Capacidad</th>
                                <th scope="col">Grado</th>
                                <th scope="col">Estado</th>
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
                                        <td><?= htmlspecialchars($aula['nombre_grado']); ?></td>
                                        <td><?= htmlspecialchars($aula['nombre_estado']); ?></td>
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
                </main>
                <script src="../js/validarDeleteMaterias.js"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
            </div>
        </div>
    </div>
</body>
<script>
    document.getElementById('filtroEstado').addEventListener('change', function() {
        const nivelSeleccionado = this.value.toLowerCase();
        const filas = document.querySelectorAll('table tbody tr');

        filas.forEach(fila => {
            const nivelEstado = fila.querySelector('td:nth-child(4)').textContent.toLowerCase();

            if (nivelSeleccionado === '' || nivelEstado === nivelSeleccionado) {
                fila.style.display = '';
            } else {
                fila.style.display = 'none';
            }
        });
    });
</script>

</html>