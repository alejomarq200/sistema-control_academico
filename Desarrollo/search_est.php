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
    <title>Consultar Reresentantes</title>
    <link rel="stylesheet" href="../css/modulos/moduloRepresentantes.css">
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
                    <h1 class="display-5 fw-bold" style='color: rgb(37, 64, 90);'>Módulo de Estudiantes</h1>
                    <p class="lead text-muted">Gestione y administre la información de los estudiantes</p>
                </div>
                <div class="container-table">
                    <table id="tablaxRepresentante" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">Cédula</th>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Edad</th>
                                <th scope="col">Género</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include("../Configuration/functions_php/functionsCRUDEstudiantes.php");
                            include("../Layout/modalesEstudiantes/modalEditEstudiante.php");
                            include("../Layout/modalesEstudiantes/modalVerEst.php");

                            $estudiantes = consultarEstudiantes($pdo); // Obtener los representantes

                            if (!empty($estudiantes)) {
                                foreach ($estudiantes as $estudiante) { // Iterar sobre cada usuario
                            ?>
                                    <tr>
                                        <td><?php echo ($estudiante['cedula_est'] == null ? "No aplica" : $estudiante['cedula_est']); ?>
                                        </td>
                                        <td><?php echo ($estudiante['nombres_est']); ?>
                                        <td><?php echo ($estudiante['apellidos_est']); ?></td>
                                        <td><?php echo ($estudiante['edad_est']); ?>
                                        <td>
                                            <?php echo ($estudiante['sexo']); ?>
                                        </td>
                                        <td>
                                            <a href="#formModalEditEst" class="btn btn-dark" data-bs-toggle="modal"
                                                data-bs-target="#formModalEditEst" data-id="<?php echo $estudiante['id']; ?>"
                                                data-cedula_est="<?php echo $estudiante['cedula_est']; ?>"
                                                data-nombres_est="<?php echo $estudiante['nombres_est'] ?>"
                                                data-apellidos_est="<?php echo $estudiante['apellidos_est']; ?>"
                                                data-sexo="<?php echo $estudiante['sexo']; ?>"
                                                data-f_nacimiento_est="<?php echo $estudiante['f_nacimiento_est']; ?>"
                                                data-edad_est="<?php echo $estudiante['edad_est']; ?>"
                                                data-direccion_est="<?php echo $estudiante['direccion_est']; ?>"
                                                data-lugar_nac_est="<?php echo $estudiante['lugar_nac_est']; ?>"
                                                data-colegio_ant_est="<?php echo $estudiante['colegio_ant_est']; ?>"
                                                data-motivo_ret_est="<?php echo $estudiante['motivo_ret_est'] ?>"
                                                data-nivelacion_est="<?php echo $estudiante['nivelacion_est']; ?>"
                                                data-explicacion_est="<?php echo $estudiante['explicacion_est']; ?>"
                                                data-grado_est="<?php echo $estudiante['id_grado']; ?>"
                                                data-turno_est="<?php echo $estudiante['turno_est']; ?>"
                                                data-problem_resp_est="<?php echo $estudiante['problem_resp_est']; ?>"
                                                data-alergias_est="<?php echo $estudiante['alergias_est']; ?>"
                                                data-vacunas_est="<?php echo $estudiante['vacunas_est']; ?>"
                                                data-enfermedad_est="<?php echo $estudiante['enfermedad_est']; ?>">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <button type="button" class="btn btn-primary btn-promocion"
                                                data-id="<?php echo $estudiante['id']; ?>"
                                                data-grado_est="<?php echo $estudiante['id_grado']; ?>">
                                                <i class="fi fi-tr-thumbs-up-trust"></i>
                                            </button>
                                            <?php
                                            // Verificar si el grado está entre 1er y 5to año
                                            $mostrarBoton = false;
                                            $grado = $estudiante['id_grado'];

                                            if (in_array($grado, ['1er año', '2do año', '3er año', '4to año', '5to año'])) {
                                                $mostrarBoton = true;
                                            }
                                            ?>

                                            <?php if ($mostrarBoton): ?>
                                                <button type="button" class="btn btn-success btn-promocion-secundaria"
                                                    data-id="<?php echo $estudiante['id']; ?>"
                                                    data-grado_est="<?php echo htmlspecialchars($estudiante['id_grado'], ENT_QUOTES); ?>">
                                                    <i class="fi fi-tr-thumbs-up-trust"></i>
                                                </button>
                                            <?php endif; ?>
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

    <!-- Modal de verificación -->
    <div class="modal fade" id="verificacionModal" tabindex="-1" aria-labelledby="verificacionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="verificacionModalLabel">Verificación de Promoción</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="mensajeCarga">
                    <!-- El contenido se cargará dinámicamente -->
                </div>
                <div class="modal-footer" id="modalFooter">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal para Secundaria -->
    <div class="modal fade" id="verificacionModalSecundaria" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">Verificación de Promoción - Secundaria</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="mensajeCargaSecundaria">
                    <!-- Contenido dinámico se insertará aquí -->
                </div>
                <div class="modal-footer" id="modalFooterSecundaria">
                    <!-- Botones dinámicos se insertarán aquí -->
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
            $('#tablaxRepresentante').DataTable({
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