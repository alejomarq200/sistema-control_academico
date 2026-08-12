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
    <!-- Scripts necesarios -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Auditoria de Usuarios</title>
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
        // error_reporting(0);
        include("../Desarrollo/menu_1.php");
        include("../Layout/modalesAuditoria/modalesConsultarAuditoria.php");
        include("../Layout/modalesAuditoria/modalExportarAuditoria.php");
        ?>
        <!-- CUERPO DEL HTML ESPACIO PARA TRABAJAR YA INCLUIDA LA BARRA -->
        <div class="main p-3">
            <div class="text-center">
                <main>
                    <?php include("../Layout/mensajes.php"); ?>
                    <div class="mb-4" style="max-width: 600px; margin: 0 auto; background-color: #CBC6E0; border-radius:15px; padding: 30px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); ">
                        <h1 class="display-10 fw-bold text-primary mb-2">Reportes de Auditoría de Usuarios</h1>
                        <p class="lead text-muted">Consulta los movimientos de auditoría del usuario seleccionado</p>
                        <div class="mx-auto" style="height: 48; width: 100px; background: linear-gradient(to right, #05357cff, #6c757d, #0d6efd);"></div>
                    </div>

                    <!-- Contenedor único para auditoría -->
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-6 mb-4">
                                <div class="card h-100 shadow-sm border-0">
                                    <div class="card-body text-center">
                                        <i class="bi bi-clipboard2-data-fill display-4 text-info mb-3"></i>
                                        <h3 class="card-title">Movimientos de Auditoría</h3>
                                        <p class="card-text">Consulta todos los registros de actividad del usuario</p>
                                        <div class="d-flex justify-content-center gap-3">
                                            <button class="btn btn-info btn-lg rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#modalAuditoria">
                                                <i class="bi bi-search me-2"></i>Consultar
                                            </button>
                                            <button class="btn btn-secondary btn-lg rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#modalAuditoriaPDF">
                                                <i class="bi bi-download me-2"></i>Exportar
                                            </button>
                                        </div>
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