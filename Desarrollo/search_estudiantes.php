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
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-solid-straight/css/uicons-solid-straight.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/modulos/moduloEstud.css">
    <title>Consultar Estudiantes</title>
</head>

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
                <h1 class="display-5 fw-bold" style='color: rgb(37, 64, 90);'>Módulo de Estudiantes</h1>
                <p class="lead text-muted">Gestione y administre la información y prosecución de los estudiantes</p>
            </div>
            <!-- CONTENEDOR CENTRADO CON ESTILOS MEJORADOS -->
            <div class="container-table">
                <div class="custom-table-Estudiantes">
                    <table class="table table-hover" id="tablaxEstudiante">
                        <thead>
                            <tr>
                                <th scope="col">Cédula</th>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Edad</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="tablaEstudiantes">
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
                                echo "<tr><td colspan='8'>No se encontraron estudiantes.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            </main>
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
        <!--  !-- JQUERY -->
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
            document.addEventListener("DOMContentLoaded", function() {
                $(document).ready(function() {
                    $('#tablaxEstudiante').DataTable({
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

                $(document).ready(function() {
                    $(document).on('click', '.btn-promocion', function() {
                        const idEstudiante = $(this).data('id');
                        const gradoEst = parseInt($(this).data('grado_est'));

                        console.log('Botón clickeado', {
                            idEstudiante,
                            gradoEst
                        }); // Debug

                        // Solo procesar si está entre 1 y 6 (Primaria)
                        if (gradoEst >= 1 && gradoEst <= 6) {
                            // Mostrar modal
                            const modal = new bootstrap.Modal(document.getElementById('verificacionModal'));
                            modal.show();

                            // Configurar mensaje inicial
                            $('#mensajeCarga').html(`
                                <div class="d-flex align-items-center">
                                <div class="spinner-border text-primary me-3" role="status"></div>
                                <span>Comprobando calificaciones del estudiante...</span>
                                </div>
                            `);

                            $('#modalFooter').empty();

                            // Realizar petición AJAX
                            $.ajax({
                                url: 'verificar_calificaciones.php',
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    id_estudiante: idEstudiante,
                                    id_grado: gradoEst
                                },
                                success: function(response) {
                                    console.log('Respuesta recibida:', response); // Debug

                                    if (response.estado === 'promovido') {
                                        $('#mensajeCarga').html(`
                                            <div class="text-center">
                                                <div class="alert alert-success border-2 d-inline-block">
                                                    <div class="d-flex align-items-center">
                                                        <i class="fas fa-check-circle fa-2x me-3 text-success"></i>
                                                        <div>
                                                            <h4 class="alert-heading mb-1">¡Promoción Exitosa!</h4>
                                                            <p class="mb-0">El estudiante ha sido promovido al</p>
                                                            <h2 class="fw-bold text-success mb-3">Grado ${response.nuevo_grado}</h2>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="d-flex justify-content-center gap-3 mt-3">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                            <i class="fas fa-times me-1"></i> Cerrar
                                                        </button>
                                                         <a href="../reportes/gnerar_constancia_prosecusion_individual.php?id=${idEstudiante}&grado=${response.nuevo_grado}" 
                                                        class="btn btn-primary" 
                                                        target="_blank">
                                                            <i class="fas fa-file-pdf me-1"></i> Generar Reporte PDF
                                                        </a>
                                                    </div>
                                                </div>
                                                
                                                <div class="mt-4 text-center">
                                                    <div class="d-inline-flex align-items-center bg-light rounded-pill px-3 py-1">
                                                        <i class="fas fa-info-circle text-primary me-2"></i>
                                                        <small>Este registro ha sido actualizado en el sistema</small>
                                                    </div>
                                                </div>
                                            </div>
                                        `);

                                        // Actualizar el botón en la tabla
                                        $(`button[data-id="${idEstudiante}"]`)
                                            .data('grado_est', response.nuevo_grado)
                                            .find('i').removeClass('fa-thumbs-up').addClass('fa-check');
                                    } else if (response.estado === 'pendiente') {
                                        let materiasHTML = response.materias_pendientes.map(m =>
                                            `<li class="list-group-item d-flex justify-content-between align-items-center">
                                            ${m.nombre_materia}
                                            <span class="badge bg-danger rounded-pill">${m.actividades_faltantes} faltantes</span>
                                        </li>`
                                        ).join('');

                                        $('#mensajeCarga').html(`
                                        <div class="alert alert-warning">
                                            <i class="fas fa-exclamation-triangle me-2"></i>
                                            No se puede promover al estudiante
                                        </div>
                                        <p>Faltan calificaciones en:</p>
                                        <ul class="list-group mt-2">${materiasHTML}</ul>
                                        `);
                                    } else if (response.error) {
                                        $('#mensajeCarga').html(`
                                        <div class="alert alert-danger">
                                            <i class="fas fa-times-circle me-2"></i>
                                            ${response.error}
                                        </div>
                                        `);
                                    }

                                    // Botón de cierre
                                    $('#modalFooter').html(`
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    `);
                                },
                                error: function(xhr, status, error) {
                                    console.error('Error en AJAX:', error); // Debug
                                    $('#mensajeCarga').html(`
                                    <div class="alert alert-danger">
                                    <i class="fas fa-times-circle me-2"></i>
                                    Error al verificar calificaciones: ${error}
                                    </div>
                                    `);
                                }
                            });
                        } else {
                            console.log('Grado fuera de rango:', gradoEst); // Debug
                        }
                    });


                });
                $(document).ready(function() {
                    $(document).on('click', '.btn-promocion-secundaria', function() {
                        const idEstudiante = $(this).data('id');
                        const gradoEst = $(this).data('grado_est');

                        const modal = new bootstrap.Modal(document.getElementById('verificacionModalSecundaria'));
                        modal.show();

                        $('#mensajeCargaSecundaria').html(`
                            <div class="d-flex align-items-center">
                                <div class="spinner-border text-primary me-3" role="status"></div>
                                <span>Comprobando calificaciones del estudiante...</span>
                            </div>
                        `);

                        $('#modalFooterSecundaria').empty();

                        $.ajax({
                            url: 'verificar_calificaciones_secundaria.php',
                            type: 'POST',
                            dataType: 'json',
                            data: {
                                id_estudiante: idEstudiante,
                                id_grado: gradoEst
                            },
                            success: function(response) {
                                if (response.estado === 'promovido') {
                                    mostrarPromocionExitosa(response, gradoEst);
                                } else {
                                    mostrarMateriasPendientes(response);
                                }
                            },
                            error: function(xhr, status, error) {
                                $('#mensajeCargaSecundaria').html(`
                    <div class="alert alert-danger">
                        <i class="fas fa-times-circle me-2"></i>
                        Error al verificar calificaciones: ${error}
                    </div>
                `);
                            }
                        });
                    });

                    function mostrarPromocionExitosa(response, gradoActual) {
                        let materiasAprobadasHTML = response.materias_aprobadas.map(m => `
                        <tr>
                            <td>${m.nombre_materia}</td>
                            <td class="text-center">${m.promedio_final}</td>
                            <td class="text-center"><span class="badge bg-success">Aprobada</span></td>
                        </tr>
                    `).join('');

                        $('#mensajeCargaSecundaria').html(`
                        <div class="alert alert-success">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-check-circle fa-2x me-3"></i>
                                <div>
                                    <h4 class="alert-heading mb-1">¡Promoción Exitosa!</h4>
                                    <p class="mb-0">El estudiante ha sido promovido de <strong>${gradoActual}</strong> a <strong>${response.nuevo_grado}</strong></p>
                                </div>
                            </div>
                        </div>
            
                            <div class="mt-4">
                                <h5 class="mb-3">Resumen de materias:</h5>
                                
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Materia</th>
                                                <th class="text-center">Promedio</th>
                                                <th class="text-center">Estado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            ${materiasAprobadasHTML}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        `);

                        $('#modalFooterSecundaria').html(`
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fas fa-times me-1"></i> Cerrar
                        </button>
                        <a href="../reportes/generar_constancia_secundaria.php?id=${idEstudiante}&grado=${encodeURIComponent(response.nuevo_grado)}" 
                        class="btn btn-success" 
                        target="_blank">
                            <i class="fas fa-file-pdf me-1"></i> Generar Constancia
                        </a>
                    `);
                    }

                    function mostrarMateriasPendientes(response) {
                        let motivosHTML = response.motivos.map(m => `<li>${m}</li>`).join('');

                        let calificacionesPendientesHTML = '';
                        if (response.materias_con_calificaciones_pendientes.length > 0) {
                            calificacionesPendientesHTML = `
                            <div class="mt-4">
                                <h5 class="mb-3">Materias con calificaciones pendientes (${response.materias_con_calificaciones_pendientes.length}):</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Materia</th>
                                                <th class="text-center">Motivo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            ${response.materias_con_calificaciones_pendientes.map(m => `
                                                <tr>
                                                    <td>${m.nombre_materia}</td>
                                                    <td class="text-center"><span class="badge bg-warning">${m.motivo}</span></td>
                                                </tr>
                                            `).join('')}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        `;
                        }

                        let pendientesAcademicasHTML = '';
                        if (response.materias_pendientes_academicamente.length > 0) {
                            pendientesAcademicasHTML = `
                                <div class="mt-4">
                                    <h5 class="mb-3">Materias pendientes académicamente (${response.materias_pendientes_academicamente.length}):</h5>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Materia</th>
                                                    <th class="text-center">Promedio</th>
                                                    <th class="text-center">Motivo</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                ${response.materias_pendientes_academicamente.map(m => `
                                                    <tr>
                                                        <td>${m.nombre_materia}</td>
                                                        <td class="text-center">${m.promedio_final}</td>
                                                        <td class="text-center"><span class="badge bg-danger">${m.motivo}</span></td>
                                                    </tr>
                                                `).join('')}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            `;
                        }

                        let pendientesRegistradasHTML = '';
                        if (response.materias_pendientes_registradas.length > 0) {
                            pendientesRegistradasHTML = `
                            <div class="mt-4">
                                <h5 class="mb-3">Materias pendientes registradas (${response.materias_pendientes_registradas.length}):</h5>
                                <ul class="list-group">
                                    ${response.materias_pendientes_registradas.map(m => `
                                        <li class="list-group-item">${m.nombre_materia}</li>
                                    `).join('')}
                                </ul>
                            </div>
                        `;
                        }

                        let materiasAprobadasHTML = '';
                        if (response.materias_aprobadas.length > 0) {
                            materiasAprobadasHTML = `
                                <div class="mt-4">
                                    <h5 class="mb-3">Materias aprobadas (${response.materias_aprobadas.length}):</h5>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Materia</th>
                                                    <th class="text-center">Promedio</th>
                                                    <th class="text-center">Estado</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                ${response.materias_aprobadas.map(m => `
                                                    <tr>
                                                        <td>${m.nombre_materia}</td>
                                                        <td class="text-center">${m.promedio_final}</td>
                                                        <td class="text-center"><span class="badge bg-success">Aprobada</span></td>
                                                    </tr>
                                                `).join('')}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            `;
                        }

                        $('#mensajeCargaSecundaria').html(`
                            <div class="alert alert-danger">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-exclamation-triangle fa-2x me-3"></i>
                                    <div>
                                        <h4 class="alert-heading mb-1">No se puede promover al estudiante</h4>
                                        <p>Motivos:</p>
                                        <ul>
                                            ${motivosHTML}
                                        </ul>
                                    </div>
                                </div>
                            </div>
            
                            ${calificacionesPendientesHTML}
                            ${pendientesAcademicasHTML}
                            ${pendientesRegistradasHTML}
                            ${materiasAprobadasHTML}
                        `);

                        $('#modalFooterSecundaria').html(`
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fas fa-times me-1"></i> Cerrar
                        </button>
                    `);
                    }
                });
            });
        </script>
</html>