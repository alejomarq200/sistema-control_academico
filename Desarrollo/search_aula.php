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
    <!-- DATATABLES -->
    <!--  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"> -->
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
     <title>Consultar Aulas</title>
    <link rel="stylesheet" href="../css/modulos/moduloAulas.css">
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
                <!-- Título principal con estilo mejorado -->
                <div class="mb-4" style="max-width: 600px; margin: 0 auto; background-color:#F5F5F5; border-radius:15px; padding: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); ">
                    <h1 class="display-5 fw-bold" style='color: rgb(37, 64, 90);'>Módulo de Aulas</h1>
                    <p class="lead text-muted">Gestione y administre la información de las Aulas</p>
                </div>
                <div class="container-table">
                    <table id="tablaxAulas" class="display" style="width:100%">
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
    <script src="../js/validarDeleteUsuarios.js"></script>

    <script>
        $(document).ready(function() {
            $('#tablaxAulas').DataTable({
                "dom": '<"top"<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>>rt<"bottom"<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>><"clear">',
                "language": {
                    "decimal": "",
                    "emptyTable": "No hay datos disponibles en la tabla",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                    "infoEmpty": "Mostrando 0 a 0 de 0 registros",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "No se encontraron registros coincidentes",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                    "aria": {
                        "sortAscending": ": activar para ordenar columna ascendente",
                        "sortDescending": ": activar para ordenar columna descendente"
                    }
                },

                "initComplete": function(settings, json) {
                    // Añadir icono de lupa al buscador
                    $('.dataTables_filter label').prepend('<i class="bi bi-search" style="margin-right: 8px;"></i>');

                    // Añadir icono al select de registros por página
                    $('.dataTables_length label').append('<i class="bi bi-list-ol" style="margin-left: 8px;"></i>');
                }
            });
        });
    </script>
</body>

</html>