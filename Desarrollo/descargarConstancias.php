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
    <!-- Scripts necesarios -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Reportes de Constancias</title>
    <style>
        /* Estilos para las tarjetas de constancias */
        .card {
            transition: all 0.3s ease;
            border-radius: 15px;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 2rem;
        }

        .display-4 {
            font-size: 3rem;
        }

        .btn-lg {
            padding: 0.5rem 1.5rem;
            font-size: 1.1rem;
        }

        /* Responsividad */
        @media (max-width: 768px) {
            .col-md-4 {
                margin-bottom: 1.5rem;
            }
        }
    </style>
    </style>
</head>

<body>
    <!-- DIV PARA TRABAJAR CON EL MENÚ Y EL FORMULARIO RESPECTIVO -->
    <div class="wrapper">
        <?php
        error_reporting(0);
        session_start();
        include("../Desarrollo/menu.php");
        ?>
        <!-- CUERPO DEL HTML ESPACIO PARA TRABAJAR YA INCLUIDA LA BARRA -->
        <div class="main p-3">
            <div class="text-center">
                <main>
                    <?php include("../Layout/mensajes.php"); ?>
                    <div class="mb-4" style="max-width: 600px; margin: 0 auto; background-color:#F5F5F5; border-radius:15px; padding: 30px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); ">
                        <h1 class="display-5 fw-bold text-primary mb-3">Reportes de Constancias</h1>
                        <p class="lead text-muted">Descarga y visualiza los reportes de constancias disponibles</p>
                        <div class="mx-auto" style="height: 48; width: 100px; background: linear-gradient(to right, #05357cff, #6c757d, #0d6efd);"></div>
                    </div>

                    <!-- Contenedor de las constancias -->
                    <div class="container">
                        <div class="row justify-content-center">
                            <!-- Constancia de Estudio -->
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 shadow-sm border-0">
                                    <div class="card-body text-center">
                                        <i class="bi bi-file-earmark-text-fill display-4 text-primary mb-3"></i>
                                        <h3 class="card-title">Constancia de Estudio</h3>
                                        <p class="card-text">Certifica la condición de estudiante regular</p>
                                        <button class="btn btn-primary btn-lg rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#modalConstanciaEstudio">
                                            <i class="bi bi-download me-2"></i>Generar
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Constancia de Retiro -->
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 shadow-sm border-0">
                                    <div class="card-body text-center">
                                        <i class="bi bi-file-earmark-excel-fill display-4 text-danger mb-3"></i>
                                        <h3 class="card-title">Constancia de Retiro</h3>
                                        <p class="card-text">Documenta la salida del estudiante</p>
                                        <button class="btn btn-danger btn-lg rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#modalConstanciaRetiro">
                                            <i class="bi bi-download me-2"></i>Generar
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Constancia de Prosecución -->
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 shadow-sm border-0">
                                    <div class="card-body text-center">
                                        <i class="bi bi-file-earmark-check-fill display-4 text-success mb-3"></i>
                                        <h3 class="card-title">Constancia de Prosecución</h3>
                                        <p class="card-text">Certifica la continuidad de estudios</p>
                                        <button class="btn btn-success btn-lg rounded-pill px-4"  data-bs-toggle="modal" data-bs-target="#modalConstanciaProsecusion">
                                            <i class="bi bi-download me-2"></i>Generar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</body>
<!-- Modal para Constancia de Estudio -->
<div class="modal fade" id="modalConstanciaEstudio" tabindex="-1" aria-labelledby="modalConstanciaEstudioLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalConstanciaEstudioLabel">Generar Constancia de Estudio</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="selectGrado" class="form-label">Nivel del Grado:</label>
                        <select class="form-select" id="nivelEducativo" name="nivelEducativo" onchange="cargarGrados()">
                            <option value="" selected>Seleccionar</option>
                            <option value="Primaria">Primaria</option>
                            <option value="Secundaria">Secundaria</option>
                        </select>
                        <label for="selectGrado" class="form-label">Grado:</label>
                        <select class="form-select" id="selectGrado" name="gradosS">
                            <option value="" selected>Seleccionar</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="selectAnio" class="form-label">Año Escolar:</label>
                        <select class="form-select" id="selectAnio" name="anioS">
                            <option value="2023-2024">2023-2024</option>
                            <option value="2024-2025">2024-2025</option>
                            <option value="2025-2026" selected>2025-2026</option>
                        </select>
                    </div>
                </div>

                <div id="tablaEstudiantesContainer">
                    <!-- Aquí se cargará la tabla dinámica -->
                    <div class="alert alert-info">Seleccione un grado y año escolar para mostrar los estudiantes</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" id="btnGenerarConstancias" class="btn btn-primary" disabled>
                    <i class="bi bi-download me-2"></i>Generar Constancias Seleccionadas
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalConstanciaRetiro" tabindex="-1" aria-labelledby="modalConstanciaRetiroLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="modalConstanciaRetiroLabel">Generar Constancia de Retiro</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="nivelEducativoRetiro" class="form-label">Nivel del Grado:</label>
                        <select class="form-select" id="nivelEducativoRetiro" name="nivelEducativoRetiro" onchange="cargarGradosRetiro()">
                            <option value="" selected>Seleccionar</option>
                            <option value="Primaria">Primaria</option>
                            <option value="Secundaria">Secundaria</option>
                        </select>
                        <label for="selectGradoRetiro" class="form-label">Grado:</label>
                        <select class="form-select" id="selectGradoRetiro" name="selectGradoRetiro">
                            <option value="" selected>Seleccionar</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="selectAnioRetiro" class="form-label">Año Escolar:</label>
                        <select class="form-select" id="selectAnioRetiro" name="selectAnioRetiro">
                            <option value="2023-2024">2023-2024</option>
                            <option value="2024-2025">2024-2025</option>
                            <option value="2025-2026" selected>2025-2026</option>
                        </select>
                    </div>
                </div>

                <div id="tablaEstudiantesContainerRetiro">
                    <!-- Aquí se cargará la tabla dinámica -->
                    <div class="alert alert-info">Seleccione un grado y año escolar para mostrar los estudiantes</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" id="btnGenerarConstanciasRetiro" class="btn btn-danger" disabled>
                    <i class="bi bi-download me-2"></i>Generar Constancias Seleccionadas
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalConstanciaProsecusion" tabindex="-1" aria-labelledby="modalConstanciProsecusionLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="modalConstanciaProsecusionLabel">Generar Constancia de Prosecusión</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="nivelEducativoProsecusion" class="form-label">Nivel del Grado:</label>
                        <select class="form-select" id="nivelEducativoProsecusion" name="nivelEducativoProsecusion" onchange="cargarGradosProsecusión()">
                            <option value="" selected>Seleccionar</option>
                            <option value="Primaria">Primaria</option>
                        </select>
                        <label for="selectGradoProsecusion" class="form-label">Grado:</label>
                        <select class="form-select" id="selectGradoProsecusion" name="selectGradoProsecusion">
                            <option value="" selected>Seleccionar</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="selectAnioProsecucion" class="form-label">Año Escolar:</label>
                        <select class="form-select" id="selectAnioProsecucion" name="selectAnioProsecucion">
                            <option value="2023-2024">2023-2024</option>
                            <option value="2024-2025">2024-2025</option>
                            <option value="2025-2026" selected>2025-2026</option>
                        </select>
                    </div>
                </div>

                <div id="tablaEstudiantesContaineriProsecucion">
                    <!-- Aquí se cargará la tabla dinámica -->
                    <div class="alert alert-info">Seleccione un grado y año escolar para mostrar los estudiantes</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" id="btnGenerarConstanciasProsecusion" class="btn btn-success" disabled>
                    <i class="bi bi-download me-2"></i>Generar Constancias Seleccionadas
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function cargarGrados() {
        $.ajax({
            url: "../AJAX/AJAX_Horarios/cargarHorarios.php",
            type: "POST",
            data: {
                action: 'cargar_grados',
                nivelEducativo: $("#nivelEducativo").val()
            }, // Enviamos una acción específica
            success: function(resultado) {
                $("#selectGrado").html('<option value="Seleccionar" selected>Seleccionar</option>' + resultado);
            },
            error: function(xhr, status, error) {
                console.error("Error en la solicitud AJAX:", error);
                $("#selectGrado").html('<option value="Error">Error al cargar grados</option>');
            }
        });
    }

    function cargarGradosRetiro() {
        $.ajax({
            url: "../AJAX/AJAX_Horarios/cargarHorarios.php",
            type: "POST",
            data: {
                action: 'cargar_grados',
                nivelEducativo: $("#nivelEducativoRetiro").val()
            },
            success: function(resultado) {
                console.log("Respuesta del servidor:", resultado); // Para depuración
                $("#selectGradoRetiro").html('<option value="Seleccionar" selected>Seleccionar</option>' + resultado);
            },
            error: function(xhr, status, error) {
                console.error("Error en la solicitud AJAX:", error);
                $("#selectGradoRetiro").html('<option value="Error">Error al cargar grados</option>');
            }
        });
    }

    function cargarGradosProsecusión() {
        $.ajax({
            url: "../AJAX/AJAX_Horarios/cargarHorarios.php",
            type: "POST",
            data: {
                action: 'cargar_grados',
                nivelEducativo: $("#nivelEducativoProsecusion").val()
            },
            success: function(resultado) {
                console.log("Respuesta del servidor:", resultado); // Para depuración
                $("#selectGradoProsecusion").html('<option value="Seleccionar" selected>Seleccionar</option>' + resultado);
            },
            error: function(xhr, status, error) {
                console.error("Error en la solicitud AJAX:", error);
                $("#selectGradoProsecusion").html('<option value="Error">Error al cargar grados</option>');
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        const modalConstancia = document.getElementById('modalConstanciaEstudio');
        // Cuando se abre la modal
        modalConstancia.addEventListener('shown.bs.modal', function() {

        });
        $(document).ready(function() {
            // Cargar estudiantes cuando cambien los selects
            $('#selectGrado, #selectAnio').change(function() {
                const grado = $('#selectGrado').val();
                const anio = $('#selectAnio').val();

                if (grado && anio) {
                    cargarEstudiantes(grado, anio);
                }
            });

            // Habilitar/deshabilitar botón de generar según selección
            $(document).on('change', '.planilla-check', function() {
                const haySeleccionados = $('.planilla-check:checked').length > 0;
                $('#btnGenerarConstancias').prop('disabled', !haySeleccionados);
            });

            // Función para cargar estudiantes
            function cargarEstudiantes(grado, anio) {
                $.ajax({
                    url: '../AJAX/AJAX_Estudiantes/cargar_estudiantes_constancia.php',
                    type: 'POST',
                    data: {
                        gradosS: grado,
                        anioS: anio
                    },
                    beforeSend: function() {
                        $('#tablaEstudiantesContainer').html('<div class="text-center my-4"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Cargando...</span></div></div>');
                    },
                    success: function(response) {
                        $('#tablaEstudiantesContainer').html(response);
                    },
                    error: function(xhr, status, error) {
                        $('#tablaEstudiantesContainer').html('<div class="alert alert-danger">Error al cargar estudiantes: ' + error + '</div>');
                    }
                });
            }

            // En tu modal donde seleccionas los estudiantes
            $('#btnGenerarConstancias').click(function() {
                const seleccionados = $('.planilla-check:checked').map(function() {
                    return $(this).val();
                }).get();

                if (seleccionados.length > 0) {
                    // Pasar los IDs como parámetro en la URL
                    window.open(`../reportes/generar_constancia_estudio.php?ids=${seleccionados.join(',')}`, '_blank');
                }
            });
        });

        //CARGAMOS MODAL CONSTANCIAS RETIRO
        $(document).ready(function() {
            // Cargar estudiantes cuando cambien los selects
            $('#selectGradoRetiro, #selectAnioRetiro').change(function() {
                const grado = $('#selectGradoRetiro').val();
                const anio = $('#selectAnioRetiro').val();

                if (grado && anio) {
                    cargarEstudiantes(grado, anio);
                }
            });

            // Habilitar/deshabilitar botón de generar según selección
            $(document).on('change', '.planilla-check1', function() {
                const haySeleccionados = $('.planilla-check1:checked').length > 0;
                $('#btnGenerarConstanciasRetiro').prop('disabled', !haySeleccionados);
            });

            // Función para cargar estudiantes
            function cargarEstudiantes(grado, anio) {
                $.ajax({
                    url: '../AJAX/AJAX_Estudiantes/cargar_estudiantes_constancia_retiro.php',
                    type: 'POST',
                    data: {
                        gradosS: grado,
                        anioS: anio
                    },
                    beforeSend: function() {
                        $('#tablaEstudiantesContainerRetiro').html('<div class="text-center my-4"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Cargando...</span></div></div>');
                    },
                    success: function(response) {
                        $('#tablaEstudiantesContainerRetiro').html(response);
                    },
                    error: function(xhr, status, error) {
                        $('#tablaEstudiantesContainerRetiro').html('<div class="alert alert-danger">Error al cargar estudiantes: ' + error + '</div>');
                    }
                });
            }

            // En tu modal donde seleccionas los estudiantes
            $('#btnGenerarConstanciasRetiro').click(function() {
                const seleccionados = $('.planilla-check1:checked').map(function() {
                    return $(this).val();
                }).get();

                if (seleccionados.length > 0) {
                    // Pasar los IDs como parámetro en la URL
                    window.open(`../reportes/generar_constancia_retiro.php?ids=${seleccionados.join(',')}`, '_blank');
                }
            });
        });

         //CARGAMOS MODAL CONSTANCIAS PROSECUSIÓN
        $(document).ready(function() {
            // Cargar estudiantes cuando cambien los selects
            $('#selectGradoProsecusion, #selectAnioProsecucion').change(function() {
                const grado = $('#selectGradoProsecusion').val();
                const anio = $('#selectAnioProsecucion').val();

                if (grado && anio) {
                    cargarEstudiantes(grado, anio);
                }
            });

            // Habilitar/deshabilitar botón de generar según selección
            $(document).on('change', '.planilla-check2', function() {
                const haySeleccionados = $('.planilla-check2:checked').length > 0;
                $('#btnGenerarConstanciasProsecusion').prop('disabled', !haySeleccionados);
            });

            // Función para cargar estudiantes
            function cargarEstudiantes(grado, anio) {
                $.ajax({
                    url: '../AJAX/AJAX_Estudiantes/cargar_estudiantes_constancia_prosecusion.php',
                    type: 'POST',
                    data: {
                        gradosS: grado,
                        anioS: anio
                    },
                    beforeSend: function() {
                        $('#tablaEstudiantesContaineriProsecucion').html('<div class="text-center my-4"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Cargando...</span></div></div>');
                    },
                    success: function(response) {
                        $('#tablaEstudiantesContaineriProsecucion').html(response);
                    },
                    error: function(xhr, status, error) {
                        $('#tablaEstudiantesContaineriProsecucion').html('<div class="alert alert-danger">Error al cargar estudiantes: ' + error + '</div>');
                    }
                });
            }

            // En tu modal donde seleccionas los estudiantes
            $('#btnGenerarConstanciasProsecusion').click(function() {
                const seleccionados = $('.planilla-check2:checked').map(function() {
                    return $(this).val();
                }).get();

                if (seleccionados.length > 0) {
                    // Pasar los IDs como parámetro en la URL
                    window.open(`../reportes/gnerar_constancia_prosecusion.php?ids=${seleccionados.join(',')}`, '_blank');
                }
            });
        });
    });
</script>