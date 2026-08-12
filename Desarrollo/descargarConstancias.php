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
        include("../Desarrollo/menu_1.php");
        ?>
        <!-- CUERPO DEL HTML ESPACIO PARA TRABAJAR YA INCLUIDA LA BARRA -->
        <div class="main p-3">
            <div class="text-center">
                <main>
                    <?php
                    include("../Layout/modalesConstancias/modalConstanciaEstudio.php");
                    include("../Layout/modalesConstancias/modalConstaniaRetiro.php");
                    include("../Layout/modalesConstancias/modalConstaniaProsecusion.php");
                    include("../Layout/mensajes.php");
                    ?>
                    <div class="mb-4" style="max-width: 600px; margin: 0 auto; background-color: #CBC6E0; border-radius:15px; padding: 30px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); ">
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
                                        <button class="btn btn-success btn-lg rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#modalConstanciaProsecusion">
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
    <!-- Modal para Constancia de Prosecusion -->
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
</body>
<script src="../js/moduloConstancias.js"></script>