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
    <title>Consultar Actividades</title>
    <link rel="stylesheet" href="../css/modulos/moduloActividades.css">
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
                <div class="mb-4"
                    style="max-width: 600px; margin: 0 auto; background-color:#F5F5F5; border-radius:15px; padding: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); ">
                    <h1 class="display-5 fw-bold" style='color: rgb(37, 64, 90);'>Módulo de Actividades</h1>
                    <p class="lead text-muted">Gestione y administre la información de los Actividades</p>
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
                            <button
                                style="padding: 6px 12px; border:none; background-color: #86b7fe; border-radius:12px; color:white;"
                                id="recargar"><i class="fi fi-br-rotate-right"></i></button>
                        </div>

                    </div>
                </div>

                <div class="container-table">
                    <table id="tablaxActividad" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">Contenido</th>
                                <th scope="col">Nombre de la Materia</th>
                                <th scope="col">Grado de la Materia</th>
                                <th scope="col">Nombre Profesor</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            include("../Configuration/functions_php/functioncsCRUDActividades.php");
                            include("../Layout/modalesActividades/modalAEdit.php");
                            include("../Layout/modalesActividades/modalADisable.php");
                            include("../Layout/modalesActividades/modalAEnable.php");

                            $actividades = consultarActividadesCRUD($pdo); // Obtener las actividades
                            
                            if (!empty($actividades)) {
                                foreach ($actividades as $actividad) { // Iterar sobre cada actividad
                                    ?>
                                    <tr>
                                        <td style="text-align: left;">
                                            <?= htmlspecialchars($actividad['contenido']); ?>
                                        </td>
                                        <td><?= htmlspecialchars($actividad['nombre_materia']); ?></td>
                                        <td><?= htmlspecialchars($actividad['nombre_grado']); ?></td>
                                        <td><?= htmlspecialchars($actividad['nombre_profesor']); ?></td>
                                        <td><?= htmlspecialchars($actividad['estado']); ?></td>

                                        <td>
                                            <a href="#ModalFormAEdit" class="btn btn-dark" data-bs-toggle="modal"
                                                data-bs-target="#ModalFormAEdit"
                                                data-id="<?= htmlspecialchars($actividad['id_actividad']) ?>"
                                                data-nombreG="<?= htmlspecialchars($actividad['nombre_grado']) ?>"
                                                data-nombreM="<?= htmlspecialchars($actividad['nombre_materia']) ?>"
                                                data-nombreP="<?= htmlspecialchars($actividad['nombre_profesor']) ?>"
                                                data-contenido="<?= htmlspecialchars($actividad['contenido']) ?>">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                data-bs-target="#ModalFormEnableA"
                                                data-id="<?= htmlspecialchars($actividad['id_actividad']) ?>"
                                                data-nombreG="<?= htmlspecialchars($actividad['nombre_grado']) ?>"
                                                data-nombreM="<?= htmlspecialchars($actividad['nombre_materia']) ?>"
                                                data-nombreP="<?= htmlspecialchars($actividad['nombre_profesor']) ?>"
                                                data-contenido="<?= htmlspecialchars($actividad['contenido']) ?>">
                                                <i class='bx  bx-check-circle'></i>
                                            </button>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#ModalFormDisableA"
                                                data-id="<?= htmlspecialchars($actividad['id_actividad']) ?>"
                                                data-nombreG="<?= htmlspecialchars($actividad['nombre_grado']) ?>"
                                                data-nombreM="<?= htmlspecialchars($actividad['nombre_materia']) ?>"
                                                data-nombreP="<?= htmlspecialchars($actividad['nombre_profesor']) ?>"
                                                data-contenido="<?= htmlspecialchars($actividad['contenido']) ?>">
                                                <i class="bi bi-x-circle"></i>
                                            </button>
                                            <button type="button" class="btn btn-secondary"
                                                data-id="<?php echo $actividad['id_actividad']; ?>"
                                                onclick="confirmDeleteActividad(this)">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo "<tr><td colspan='8'>No se encontraron usuarios.</td></tr>";
                            }
                            ?>
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
    <script>
        $(document).ready(function () {
            var table = $('#tablaxActividad').DataTable({
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

                "initComplete": function (settings, json) {
                    // Añadir icono de lupa al buscador
                    $('.dataTables_filter label').prepend('<i class="bi bi-search" style="margin-right: 8px;"></i>');

                    // Añadir icono al select de registros por página
                    $('.dataTables_length label').append('<i class="bi bi-list-ol" style="margin-left: 8px;"></i>');
                }
            });

            $('#estado_aulas').on('change', function () {
                const valor = $(this).val();

                if (!valor) {
                    table.column(4).search('').draw();
                    return;
                }

                table.column(4).search('^' + valor + '$', true, false).draw();
            });

            $('#grado_aulas').on('change', function () {
                const valor = $(this).val();
                console.log('Valor seleccionado:', valor);

                if (!valor) {
                    table.column(2).search('').draw();
                    return;
                }

                table.column(2).search('^' + valor + '$', true, false).draw();
            });
        });
    </script>
    <script>
        function confirmDeleteActividad(button) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-danger ms-2",
                    cancelButton: "btn btn-secondary"
                },
                buttonsStyling: false
            });

            swalWithBootstrapButtons.fire({
                title: "¿Eliminar activdad?",
                text: "Esta acción no se puede deshacer y afectará los registros relacionados",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Confirmar eliminación",
                cancelButtonText: "Cancelar",
                reverseButtons: true,
                focusCancel: true
            }).then((result) => {
                if (result.isConfirmed) {
                    const idActividad = $(button).data("id");
                    console.log(idActividad);
                    deleteActividad(idActividad);
                }
            });
        }

        function deleteActividad(idActividad) {
            $.ajax({
                type: "POST",
                url: "../AJAX/AJAX_Actividades/DeleteActividades.php",
                data: {
                    id_actividad: idActividad
                },
                dataType: "json"
            })
                .done(function (response) {
                    if (response.success) {
                        Swal.fire({
                            title: response.title,
                            text: response.message,
                            icon: "success",
                            timer: 2000,
                            showConfirmButton: false
                        }).then(() => {
                            location.href = "search_actividad.php";
                        });
                    } else {
                        Swal.fire({
                            title: response.title,
                            text: response.message,
                            icon: response.icon || "error"
                        });
                    }
                })
                .fail(function (xhr) {
                    Swal.fire({
                        title: "Error",
                        text: "Ocurrió un error al procesar la solicitud",
                        icon: "error"
                    });
                    console.error("Error:", xhr.responseText);
                });
        }

        function cargarGrados() {
            $.ajax({
                url: "../AJAX/AJAX_Aulas/searchGradosFiltros.php",
                type: "POST",
                data: {
                    action: 'cargar_grados'
                }, // Enviamos una acción específica
                success: function (resultado) {
                    $("#grado_aulas").html('<option value="Seleccionar" selected>Seleccionar</option>' + resultado);
                },
                error: function (xhr, status, error) {
                    console.error("Error en la solicitud AJAX:", error);
                    $("#grado_aulas").html('<option value="Error">Error al cargar grados</option>');
                }
            });
        }

        cargarGrados();
        let recargar = document.getElementById('recargar');

        recargar.addEventListener('click', function () {
            window.location.href = "search_actividad.php";
        })
    </script>
</body>

</html>