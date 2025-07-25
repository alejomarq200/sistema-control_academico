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
    <title>Consultar Inscripcion</title>
    <style>
        .custom-table {
            margin: 0 auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            border: 1px solid #dee2e6;
            width: 100%;
        }

        .custom-table thead {
            background-color: rgb(37, 64, 90);
            color: #fff;
        }

        .custom-table th,
        .custom-table td {
            padding: 2rem;
            vertical-align: middle;
            border-color: #dee2e6;
        }

        .custom-table tbody tr {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .custom-table tbody tr:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #f8f9fa;
        }

        .filtro-container {
            background-color: #fff;
            border-radius: 6px;
            padding: 5px 10px;
            border: 1px solid #ddd;
            transition: all 0.3s;
        }

        .filtro-container:hover {
            border-color: #aaa;
        }

        .filtro-input {
            border: none;
            box-shadow: none;
            padding: 5px;
        }

        .filtro-input:focus {
            outline: none;
        }

        .lupa-icon {
            cursor: pointer;
            color: #666;
            font-size: 16px;
        }

        .filter-group {
            margin-bottom: 0;
            /* Elimina el margen inferior para alinear mejor */
        }

        .filter-label {
            font-size: 0.85rem;
            color: #555;
            margin-bottom: 3px;
            display: block;
        }

        .filter-select {
            border-radius: 6px;
            padding: 6px 12px;
            border: 1px solid #ddd;
        }

        .filters-container {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            margin: 2rem auto;
            max-width: 1200px;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .filters-wrapper {
            display: flex;
            gap: 1.5rem;
            align-items: flex-end;
        }

        .filter-group {
            flex: 1;
            min-width: 200px;
        }

        .filter-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #495057;
            font-size: 0.9rem;
        }

        .filter-select {
            border-radius: 8px;
            border: 1px solid #ced4da;
            padding: 0.65rem 1rem;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.03);
        }

        .filter-select:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15);
            outline: none;
        }

        /* Efecto hover para los selects */
        .filter-select:hover {
            border-color: #adb5bd;
        }

        /* Iconos */
        .bi {
            margin-right: 8px;
            font-size: 1.1em;
            vertical-align: middle;
        }
    </style>
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
                <h1 class="my-3" id="titulo">Módulo de Inscripciones</h1>
                <div class="filters-container">
                    <!-- FILTROS CON DISEÑO MODERNO -->
                    <div class="filters-wrapper">
                        <div class="filtro-container d-flex align-items-center">
                            <input type="text" id="txtFiltarr" class="filtro-input form-control"
                                placeholder="Buscar...">
                            <span class="lupa-icon ms-2">&#128269;</span> <!-- Icono de lupa -->
                        </div>
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
                                <?php cargarAniosEscolares($pdo); ?>
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
                <div class="custom-table">
                    <table class="table table-hover">
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
                            function cargarAniosEscolares($pdo)
                            {
                                $stmt = $pdo->query("SELECT DISTINCT anio_escolar FROM inscripciones");

                                if ($stmt && $stmt->rowCount() > 0) {
                                    echo '<option value="">Todos los años escolares</option>';
                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        $anio = htmlspecialchars($row['anio_escolar']);
                                        echo "<option value=\"$anio\">$anio</option>";
                                    }
                                } else {
                                    echo '<option value="">No hay años escolares</option>';
                                }
                            }
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
                </main>
                <script src="../js/validarDeleteMaterias.js"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>
<!-- Modal de Carga -->
<div id="modalCarga" class="modal-carga">
    <div class="modal-carga-content">
        <div class="spinner"></div>
        <p>Generando planilla de inscripción escolar, por favor espere...</p>
    </div>
</div>

<!-- Estilos -->
<style>
    .modal-carga {
        display: none;
        position: fixed;
        z-index: 9999;
        background-color: rgba(0, 0, 0, 0.6);
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        justify-content: center;
        align-items: center;
    }

    .modal-carga-content {
        background: #fff;
        padding: 30px;
        border-radius: 12px;
        text-align: center;
        font-family: 'Segoe UI', sans-serif;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        max-width: 400px;
        width: 90%;
    }

    .spinner {
        margin: 0 auto 15px;
        border: 6px solid #eee;
        border-top: 6px solid #0d6efd;
        border-radius: 50%;
        width: 45px;
        height: 45px;
        animation: girar 1s linear infinite;
    }

    @keyframes girar {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>

</div>
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