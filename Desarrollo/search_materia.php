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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="../css/modulos/moduloAsignatura.css">
    <title>Consultar Asignaturas</title>
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
                    <h1 class="display-5 fw-bold" style='color: rgb(37, 64, 90);'>Módulo de Asignaturas</h1>
                    <p class="lead text-muted">Gestione y administre la información de las Asignaturas</p>
                </div>

                <div class="filters-container">
                    <!-- FILTROS CON DISEÑO MODERNO -->
                    <div class="filters-wrapper">
                        <!-- Filtro de Nivel Académico -->
                        <div class="filter-group">
                            <label for="estado_aulas" class="filter-label">
                                <i class='bx bx-check-circle'></i>Estado
                            </label>
                            <select name="estado_aulas" id="estado_aulas" class="form-select filter-select">
                                <option value="Seleccionar">Seleccionar</option>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                        </div>

                        <div class="filter-group">
                            <label for="nivel" class="filter-label">
                                <i class="fi fi-ss-book-arrow-up"></i>Nivel del Grado
                            </label>
                            <select name="nivel" id="nivel" class="form-select filter-select">
                                <option value="Seleccionar">Seleccionar</option>
                                <option value="Primaria">Primaria</option>
                                <option value="Secundaria">Secundaria</option>
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
                    <table id="tablaxMaterias" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">Nombre de la asignatura</th>
                                <th scope="col" style="display: none;">Nivel de la asignatura</th>
                                <th scope="col" style="display: none;">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include("../Configuration/functions_php/functionsCRUDMaterias.php");
                            include("../Layout/modalesMaterias/modalMEdit.php");
                            include("../Layout/modalesMaterias/modalMDisable.php");
                            include("../Layout/modalesMaterias/modalMEnable.php");
                            $materias = consultarMateriasCRUD($pdo); // Obtener los usuarios

                            if (!empty($materias)) {
                                foreach ($materias as $materia) { // Iterar sobre cada usuario
                                    if ($materia['id_estado'] == 1) {
                                        $materia['id_estado'] = 'Inactivo';
                                    } elseif ($materia['id_estado'] == 2) {
                                        $materia['id_estado'] = 'Activo';
                                    }
                            ?>
                                    <tr>
                                        <td><?php echo ($materia['nombre']); ?></td>
                                        <td style="display: none;"><?php echo ($materia['nivel_materia']); ?></td>
                                        <td style="display: none;"><?php echo ($materia['id_estado']); ?></td>

                                        <td>
                                            <a href="#ModalFormMEdit" class="btn btn-dark" data-bs-toggle="modal" style="font-size: 15px;"
                                                data-bs-target="#ModalFormMEdit" data-id="<?php echo $materia['id_materia']; ?>"
                                                data-nombre="<?php echo $materia['nombre']; ?>"
                                                data-nivel="<?php echo $materia['nivel_materia']; ?>">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal" style="font-size: 15px;"
                                                data-bs-target="#ModalFormEnableM"
                                                data-id="<?php echo $materia['id_materia']; ?>"
                                                data-nombre="<?php echo $materia['nombre']; ?>"
                                                data-nivel="<?php echo $materia['nivel_materia']; ?>">
                                                <i class='bx  bx-check-circle'></i>
                                            </button>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" style="font-size: 15px;"
                                                data-bs-target="#ModalFormDisableM"
                                                data-id="<?php echo $materia['id_materia']; ?>"
                                                data-nombre="<?php echo $materia['nombre']; ?>"
                                                data-nivel="<?php echo $materia['nivel_materia']; ?>">
                                                <i class="bi bi-x-circle"></i>
                                            </button>
                                            <button type="button" class="btn btn-secondary" style="font-size: 15px;"
                                                data-id="<?php echo $materia['id_materia']; ?>" onclick="confirmDeleteMateria(this)">
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
    <script src="../js/validarDeleteAsignatura.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#tablaxMaterias').DataTable({
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

            $('#estado_aulas').on('change', function() {
                const valor = $(this).val();

                if (!valor) {
                    table.column(2).search('').draw();
                    return;
                }
                table.column(2).search('^' + valor + '$', true, false).draw();
            });

            $('#nivel').on('change', function() {
                const valor = $(this).val();

                if (!valor) {
                    table.column(1).search('').draw();
                    return;
                }
                table.column(1).search('^' + valor + '$', true, false).draw();
            });
        });

        let recargar = document.getElementById('recargar');

        recargar.addEventListener('click', function() {
            window.location.href = "search_materia.php";
        })
    </script>
</body>

</html>