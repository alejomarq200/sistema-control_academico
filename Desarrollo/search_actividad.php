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
                    <h1 class="display-5 fw-bold" style='color: rgb(37, 64, 90);'>Módulo de Actividades</h1>
                    <p class="lead text-muted">Gestione y administre la información de los Actividades</p>
                </div>
                <div class="container-table">
                    <table id="tablaxActividad" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">Cédula</th>
                                <th scope="col">Nombres</th>
                                <th scope="col" style="display: none;">Nivel del Grado</th>
                                <th scope="col">Número de Teléfono</th>
                                <th scope="col" style="display: none;">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            include("../Configuration/functions_php/functionsCRUDProfesor.php");
                            include("../Layout/modalesProfesores/modalPEdit.php");
                            include("../Layout/modalesProfesores/modalPEnable.php");
                            include("../Layout/modalesProfesores/modalPDisable.php");

                            $profesores = consultarProfesorCRUD($pdo); // Obtener los usuarios

                            if (!empty($profesores)) {
                                foreach ($profesores as $profesor) { // Iterar sobre cada usuario

                                    // Mapear id_estado a su valor correspondiente
                                    if ($profesor['estado'] == 1) {
                                        $profesor['estado'] = 'Inactivo';
                                    } elseif ($profesor['estado'] == 2) {
                                        $profesor['estado'] = 'Activo';
                                    }
                            ?>
                                    <tr>
                                        <td><?php echo ($profesor['cedula']); ?></td>
                                        <td><?php echo ($profesor['nombre']); ?></td>
                                        <td style="display: none;"><?php echo ($profesor['nivel_grado']); ?></td>
                                        <td><?php echo ($profesor['telefono']); ?></td>
                                        <td style="display: none;"><?php echo ($profesor['estado']); ?></td>
                                        <td>
                                            <a href="#ModalFormPEdit" class="btn btn-dark" data-bs-toggle="modal"
                                                data-bs-target="#ModalFormPEdit"
                                                data-idguia="<?php echo $profesor['id_profesor']; ?>"
                                                data-id="<?php echo $profesor['cedula']; ?>"
                                                data-nombre="<?php echo $profesor['nombre']; ?>"
                                                data-telefono="<?php echo $profesor['telefono']; ?>"
                                                data-nivelProfesor="<?php echo $profesor['nivel_grado'] ?>">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                data-bs-target="#ModalFormPEnable"
                                                data-idguia="<?php echo $profesor['id_profesor']; ?>"
                                                data-id="<?php echo $profesor['cedula']; ?>"
                                                data-nombre="<?php echo $profesor['nombre']; ?>"
                                                data-telefono="<?php echo $profesor['telefono']; ?>"
                                                data-estado="<?php echo $profesor['estado']; ?>"
                                                data-nivelProfesor="<?php echo $profesor['nivel_grado'] ?>">
                                                <i class='bx  bx-check-circle'></i>
                                            </button>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#ModalFormPDisable"
                                                data-idguia="<?php echo $profesor['id_profesor']; ?>"
                                                data-id="<?php echo $profesor['cedula']; ?>"
                                                data-nombre="<?php echo $profesor['nombre']; ?>"
                                                data-telefono="<?php echo $profesor['telefono']; ?>"
                                                data-estado="<?php echo $profesor['estado']; ?>"
                                                data-nivelProfesor="<?php echo $profesor['nivel_grado'] ?>">
                                                <i class="bi bi-x-circle"></i>
                                            </button>
                                            <button type="button" class="btn btn-secondary"
                                                data-id="<?php echo $profesor['id_profesor']; ?>"
                                                onclick="confirmDeleteProfesor(this)">
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
        $(document).ready(function() {
            $('#tablaxActividad').DataTable({
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