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
                <div class="filters-container">
                    <h1 class="my-3" id="titulo">Módulo de Inscripciones</h1>
                    <!-- FILTROS CON DISEÑO MODERNO -->
                    <div class="filters-wrapper">
                        <!-- Filtro de Nivel Académico -->
                        <div class="filter-group">
                            <label for="filtroGrado" class="filter-label">
                                <i class="bi bi-book-half"></i> Grado Académico
                            </label>
                            <select id="filtroGrado" class="form-select filter-select">
                                <option value="">Todos los grados</option>
                                <option value="1">1er grado</option>
                                <option value="2">2do grado</option>
                                <option value="3">3er grado</option>
                                <option value="4">4to grado</option>
                                <option value="5">5to grado</option>
                                <option value="6">6to grado</option>
                                <option value="7">1er año</option>
                                <option value="8">2do año</option>
                                <option value="9">3er año</option>
                                <option value="10">4to año</option>
                                <option value="11">5to año</option>
                            </select>
                        </div>
                        <!-- Filtro de Género con estilo mejorado -->
                        <div class="filter-group">
                            <label for="filtroGenero" class="filter-label">
                                <i class="bi bi-gender-ambiguous"></i> Género
                            </label>
                            <select id="filtroGenero" class="form-select filter-select">
                                <option value="">Todos los géneros</option>
                                <option value="F">Femenino</option>
                                <option value="M">Masculino</option>
                            </select>
                        </div>
                        <div class="filter-group">
                            <label for="filtroAnioEscolar" class="filter-label">
                                <i class="bi bi-calendar3"></i> Año Escolar
                            </label>
                            <select id="filtroAnioEscolar" class="form-select filter-select">
                                <option value="">Todos los años</option>
                                <option value="2025-2026">2025-2026</option>
                            </select>
                        </div>
                        <div class="filter-group">
                            <label for="fechaInicio" class="filter-label">
                                <i class="bi bi-calendar-range"></i> Fecha Desde:
                            </label>
                            <input type="date" id="fechaInicio" class="form-control">

                            <label for="fechaFin" class="filter-label mt-2">
                                <i class="bi bi-calendar-range"></i> Fecha Hasta:
                            </label>
                            <input type="date" id="fechaFin" class="form-control">
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
                                    <th style="display: none;">Año Escolar</th>
                                    <th>Fecha Inscripción</th>
                                    <th>Representante 1</th>
                                    <th>Representante 2</th>
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
                                        <tr data-grado-id="<?php echo $insc['grado_estudiante']; ?>" data-anio="<?php echo $insc['anio_escolar']; ?>" data-genero="<?php echo $insc['sexo']; ?>">
                                            <td><?php echo $insc['nombres_est'] . ' ' . $insc['apellidos_est']; ?></td>
                                            <td><?php echo $insc['cedula_est']; ?></td>
                                            <td><?php echo $insc['edad_est']; ?></td>
                                            <td style="display: none;"><?php echo $insc['sexo']; ?></td>
                                            <td style="display: none;"><?php echo $insc['grado_estudiante']; ?></td>
                                            <td style="display: none;"><?php echo $insc['anio_escolar']; ?></td>
                                            <td><?php echo date('d/m/Y', strtotime($insc['fecha_inscripcion'])); ?></td>
                                            <td><?php echo $insc['representante1']; ?></td>
                                            <td><?php echo $insc['representante2']; ?></td>
                                            <td>
                                                <button class="btn btn-primary" onclick="descargarPlanillaInscripcion()" data-id-est="<?php echo $insc['id_estudiante']; ?>">
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
<script>
    $(document).ready(function() {
        $('#tablaxInscripcion').DataTable({
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
<script>
    function mostrarModalCarga() {
        document.getElementById('modalCarga').style.display = 'flex';
    }

    function ocultarModalCarga() {
        document.getElementById('modalCarga').style.display = 'none';
    }

    function descargarPlanillaInscripcion() {
        mostrarModalCarga();
        const button = event.target.closest('button');
        const id = button.getAttribute('data-id-est');
        // Simula el tiempo de descarga real (ej: PDF generado en backend)
        setTimeout(() => {
            ocultarModalCarga();
            alert("📄 La planilla de inscripción se ha descargado exitosamente.\n¡Gracias por confiar en nuestra institución educativa!");

            // Aquí puedes activar la descarga real si usas un enlace
            window.location.href = "../reportes/reportePlanillaInscripcionI.php?id=" + id;
        }, 2500); // tiempo simulado en milisegundos
    }

    document.addEventListener('DOMContentLoaded', () => {
        const fechaInicioInput = document.getElementById('fechaInicio');
        const fechaFinInput = document.getElementById('fechaFin');

        function parseFechaDDMMYYYY(fechaStr) {
            const [dia, mes, anio] = fechaStr.split('/');
            return new Date(`${anio}-${mes}-${dia}`);
        }

        function filtrarPorFechas() {
            const fechaInicio = new Date(fechaInicioInput.value);
            const fechaFin = new Date(fechaFinInput.value);
            const filas = document.querySelectorAll('table tbody tr');

            filas.forEach(fila => {
                const textoFecha = fila.querySelector('td:nth-child(7)')?.textContent.trim();
                const fechaFila = parseFechaDDMMYYYY(textoFecha);

                if (!fechaInicioInput.value && !fechaFinInput.value) {
                    fila.style.display = '';
                } else if (!isNaN(fechaFila)) {
                    const enRango = (!isNaN(fechaInicio) ? fechaFila >= fechaInicio : true) &&
                        (!isNaN(fechaFin) ? fechaFila <= fechaFin : true);
                    fila.style.display = enRango ? '' : 'none';
                } else {
                    fila.style.display = 'none';
                }
            });
        }

        fechaInicioInput.addEventListener('change', filtrarPorFechas);
        fechaFinInput.addEventListener('change', filtrarPorFechas);
    });


    document.getElementById('filtroGrado').addEventListener('change', function() {
        const valorSeleccionado = this.value;
        const filas = document.querySelectorAll('table tbody tr');

        filas.forEach(fila => {
            const gradoFila = fila.getAttribute('data-grado-id');

            if (valorSeleccionado === '' || gradoFila === valorSeleccionado) {
                fila.style.display = '';
            } else {
                fila.style.display = 'none';
            }
        });
    });

    document.getElementById('filtroAnioEscolar').addEventListener('change', function() {
        const valorSeleccionado = this.value;
        const filas = document.querySelectorAll('table tbody tr');

        filas.forEach(fila => {
            const gradoFila = fila.getAttribute('data-anio');

            if (valorSeleccionado === '' || gradoFila === valorSeleccionado) {
                fila.style.display = '';
            } else {
                fila.style.display = 'none';
            }
        });
    });


    document.getElementById('filtroGenero').addEventListener('change', function() {
        const valorSeleccionado = this.value;
        const filas = document.querySelectorAll('table tbody tr');

        filas.forEach(fila => {
            const gradoFila = fila.getAttribute('data-genero');

            if (valorSeleccionado === '' || gradoFila === valorSeleccionado) {
                fila.style.display = '';
            } else {
                fila.style.display = 'none';
            }
        });
    });
</script>

</html>