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
    <link rel="stylesheet" href="../css/modulos/moduloInscripcion.css">
    <title>Consultar Inscripcion</title>
</head>

<body>
    <!-- DIV PARA TRABAJAR CON EL MENÚ Y EL FORMULARIO RESPECTIVO  -->
    <div class="wrapper">
        <?php
        error_reporting(0);
        session_start();
        include("menu.php");
        include("../Configuration/Configuration.php");
        ?>
        <!-- CUERPO DEL HTML ESPACIO PARA TRABAJAR YA INCLUIDA LA BARRA  -->
        <div class="main p-3">
            <div class="text-center">
                <?php
                include("../Layout/mensajes.php");
                /* CUERPO DEL MENÚ */
                ?>
                <div class="mb-4"
                    style="max-width: 600px; margin: 0 auto; background-color:#F5F5F5; border-radius:15px; padding: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); ">
                    <h1 class="display-5 fw-bold" style='color: rgb(37, 64, 90);'>Módulo de Inscripción</h1>
                    <p class="lead text-muted">Gestione y administre la información de las inscripciones</p>
                </div>
                <div class="filters-container">
                    <!-- FILTROS CON DISEÑO MODERNO -->
                    <div class="filters-wrapper">
                        <!-- Filtro de Nivel Académico -->
                        <div class="filter-group">
                            <label for="genero" class="filter-label">
                                <i class="fi fi-rr-venus-mars"></i>Género
                            </label>
                            <select name="genero" id="genero" class="form-select filter-select">
                                <option value="Seleccionar">Seleccionar</option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>
                        </div>
                        <!-- Filtro de Grado con estilo mejorado -->
                        <div class="filter-group">
                            <label for="grado_aulas" class="filter-label">
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
                    <div class="custom-table">
                        <table class="table table-hover" id="tablaxInscripcion">
                            <thead>
                                <tr>
                                    <th>Estudiante</th>
                                    <th>Cédula</th>
                                    <th>Edad</th>
                                    <th style="display: none;">Sexo</th>
                                    <th style="display: none;">Grado</th>
                                    <th>Año Escolar</th>
                                    <th>Fecha Inscripción</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include("../Configuration/functions_php/functionsCRUDInscripciones.php");

                                $inscripciones = consultarInscripcionesUnificadas($pdo);

                                if (!empty($inscripciones)) {
                                    foreach ($inscripciones as $insc) {
                                        ?>
                                        <tr data-grado-id="<?php echo $insc['grado_estudiante']; ?>"
                                            data-anio="<?php echo $insc['anio_escolar']; ?>"
                                            data-genero="<?php echo $insc['sexo']; ?>">
                                            <td><?php echo $insc['nombres_est'] . ' ' . $insc['apellidos_est']; ?></td>
                                            <td><?php echo $insc['cedula_est']; ?></td>
                                            <td><?php echo $insc['edad_est']; ?></td>
                                            <td style="display: none;"><?php echo $insc['sexo']; ?></td>
                                            <td style="display: none;"><?php echo $insc['grado']; ?></td>
                                            <td><?php echo $insc['anio_escolar']; ?></td>
                                            <td><?php echo date('d/m/Y', strtotime($insc['fecha_inscripcion'])); ?></td>

                                            <td>
                                                <button class="btn btn-primary" onclick="descargarPlanillaInscripcion()"
                                                    data-id-est="<?php echo $insc['id_estudiante']; ?>">
                                                    <i class="bi bi-download"></i> Descargar Planilla
                                                </button>

                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo "<tr><td colspan='10'>No se encontraron inscripciones.</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Modal de Carga -->
                <div id="modalCarga" class="modal-carga">
                    <div class="modal-carga-content">
                        <div class="spinner"></div>
                        <p>Generando planilla de inscripción escolar, por favor espere...</p>
                    </div>
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
</body>
<script src="../js/moduloInscripciones.js"></script>

</html>