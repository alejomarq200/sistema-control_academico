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
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-solid-straight/css/uicons-solid-straight.css'>
    <title>Reportes del Sistema</title>
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
        include("../Layout/modalesReportes/modalReporteUsuarios.php");
        include("../Layout/modalesReportes/modalReporteAulas.php");
        include("../Layout/modalesReportes/modalReporteEstudiantes.php");
        include("../Layout/modalesReportes/modalReporteProfesor.php");
        include("../Layout/modalesReportes/modalReporteAsigantura.php");
        include("../Layout/modalesReportes/modalReporteHorarios.php");
        ?>
        <!-- CUERPO DEL HTML ESPACIO PARA TRABAJAR YA INCLUIDA LA BARRA -->
        <div class="main p-3">
            <div class="text-center">
                <main>
                    <?php include("../Layout/mensajes.php"); ?>
                    <div class="mb-4" style="max-width: 600px; margin: 0 auto; background-color:#F5F5F5; border-radius:15px; padding: 30px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); ">
                        <h1 class="display-5 fw-bold text-primary mb-3">Reportes del Sistema</h1>
                        <p class="lead text-muted">Descarga y visualiza los reportes del sistema disponibles</p>
                        <div class="mx-auto" style="height: 48; width: 100px; background: linear-gradient(to right, #05357cff, #6c757d, #0d6efd);"></div>
                    </div>

                    <!-- Contenedor de los reportes -->
                    <div class="container">
                        <div class="row justify-content-center">
                            <!-- Reportes de Usuarios -->
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 shadow-sm border-0">
                                    <div class="card-body text-center">
                                        <i class="fi fi-tr-clipboard-user display-4 text-primary mb-3"></i>
                                        <h3 class="card-title">Reporte de Usuarios</h3>
                                        <button class="btn btn-primary btn-lg rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#modalReporteUsuarios">
                                            <i class="bi bi-download me-2"></i>Generar
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Reportes de Aulas -->
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 shadow-sm border-0">
                                    <div class="card-body text-center">
                                        <i class="fi fi-tr-workshop display-4 text-danger mb-3"></i>
                                        <h3 class="card-title">Reporte de Aulas</h3>
                                        <button class="btn btn-danger btn-lg rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#modalReporteAulas">
                                            <i class="bi bi-download me-2"></i>Generar
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Reportes de Horarios -->
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 shadow-sm border-0">
                                    <div class="card-body text-center">
                                        <i class="fi fi-ss-time-quarter-past display-4 text-success mb-3"></i>
                                        <h3 class="card-title">Reporte de Horarios</h3>
                                        <button class="btn btn-success btn-lg rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#modalReporteHorarios">
                                            <i class="bi bi-download me-2"></i>Generar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row justify-content-center">

                         <!-- Reportes de Profesores -->
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 shadow-sm border-0">
                                    <div class="card-body text-center">
                                        <i class="fi fi-ss-lesson-class display-4 text-danger mb-3"></i>
                                        <h3 class="card-title">Reporte de Profesores</h3>
                                        <button class="btn btn-danger btn-lg rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#modalReporteProfesores">
                                            <i class="bi bi-download me-2"></i>Generar
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- Reportes de Asignaturas -->
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 shadow-sm border-0">
                                    <div class="card-body text-center">
                                        <i class="fi fi-tr-book-open-cover display-4 text-success mb-3"></i>
                                        <h3 class="card-title">Reporte de Asignaturas</h3>
                                        <button class="btn btn-success btn-lg rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#modalReporteAsignaturas">
                                            <i class="bi bi-download me-2"></i>Generar
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- Reportes de Estudiantes -->
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 shadow-sm border-0">
                                    <div class="card-body text-center">
                                        <i class="fi fi-rr-user-graduate display-4 text-primary mb-3"></i>
                                        <h3 class="card-title">Reporte de Estudiantes</h3>
                                        <button class="btn btn-primary btn-lg rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#modalReporteEst">
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
<script>
    function cargarGrados(nivel, select) {
        $.ajax({
            url: "../AJAX/AJAX_Horarios/cargarHorarios.php",
            type: "POST",
            data: {
                action: 'cargar_grados',
                nivelEducativo: $("#" + nivel).val()
            }, // Enviamos una acción específica
            success: function(resultado) {
                $("#" + select).html('<option value="Seleccionar" selected>Seleccionar</option>' + resultado);
            },
            error: function(xhr, status, error) {
                console.error("Error en la solicitud AJAX:", error);
                $("#" + select).html('<option value="Error">Error al cargar grados</option>');
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        const modalReporteAulas = document.getElementById('modalReporteAulas');
        // Cuando se abre la modal
        modalReporteAulas.addEventListener('shown.bs.modal', function() {

        });

    });
</script>