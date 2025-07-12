<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo Estudiantes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Bundle JS (incluye Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* Estilos generales */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .student-module {
            margin-left: 100px;
            /* Ajusta según tu sidebar */
            padding: 15px;
        }

        /* Sección de Institución */
        .institution-info {
            background: #ffffff;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .institution-info h2 {
            margin-top: 0;
            color: #21608b;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 15px;
            margin-top: 15px;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #555;
        }

        .info-item i {
            color: #21608b;
        }

        /* Filtros de Búsqueda */
        .search-filters {
            background: #ffffff;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .search-bar {
            display: flex;
            margin-bottom: 15px;
        }

        .search-input {
            flex: 1;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 5px 0 0 5px;
            font-size: 1rem;
        }

        .search-btn {
            background: rgb(30, 114, 171);
            color: white;
            border: none;
            padding: 0 20px;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
        }

        .filter-inputs {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .filter-input {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 0.9rem;
            flex: 1;
            min-width: 150px;
        }

        .filter-btn {
            background: #15a451;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        /* Tabla de Estudiantes */
        .student-table {
            background: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th,
        td {
            padding: 12px 15px;
            text-align: center;
            border-bottom: 1px solid #eee;
        }

        th {
            background-color: #0e2238;

            color: rgb(255, 255, 255);
            font-weight: 600;
        }

        .status {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: bold;
        }

        .status.active {
            background: #e3f8e8;
            color: #2ecc71;
        }

        .status.inactive {
            background: #feeaea;
            color: #e74c3c;
        }

        .action-btn {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            margin: 0 5px;
            padding: 5px;
        }

        .action-btn.edit {
            color: #3498db;
        }

        .action-btn.delete {
            color: #e74c3c;
        }

        .action-btn.view {
            color: #2ecc71;
        }


        /* Celdas específicas */
        .profesor-cell,
        .materia-cell,
        .estudiante-cell {
            text-align: left;
            padding-left: 12px;
        }

        .estudiante-cell strong {
            font-weight: 600;
        }

        /* Estilos para notas */
        .nota-cell {
            font-weight: 500;
        }

        .nota-baja {
            color: #e74c3c;
            font-weight: bold;
        }

        .nota-alta {
            color: #2ecc71;
        }

        .nota-vacia {
            color: #95a5a6;
        }

        .total-cell {
            font-weight: bold;
            background-color: #f1f8fe;
        }

        /* Botón de editar */
        .btn-editar {
            background: none;
            border: 1px solid #3498db;
            color: #3498db;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.2s ease;
            font-size: 0.85rem;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .btn-editar:hover {
            background-color: #3498db;
            color: white;
            transform: scale(1.05);
        }

        .tfoot-content {
            display: flex;
            justify-content: flex-end;
            padding: 10px 0;
        }

        /* Botón de descargar */
        .btn-descargar {
            background-color: #27ae60;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-descargar:hover {
            background-color: #219653;
            transform: translateY(-2px);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-descargar i {
            font-size: 1rem;
        }

        .btn-promover {
            background-color: rgb(24, 26, 161);
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-left: 10px;
        }

        .btn-promover:hover {
            background-color: rgb(35, 33, 150);
            transform: translateY(-2px);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-promover i {
            font-size: 1rem;
        }

        .input-contador {
            width: 60px;
            padding: 6px;
            text-align: center;
            background-color: rgb(60, 81, 112);
            border: none;
            border-radius: 8px;
            outline: none;
            color: white;
            font-size: 16px;
            font-weight: bold;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-right: 15px;
        }

        .label-contador {
            font-weight: 600;
            color: #555;
            font-size: 16px;
        }

        .filtros-aplicados-inline {
            background-color: #f8f9fa;
            padding: 10px 12px;
            margin-bottom: 15px;
            border-radius: 6px;
            border-left: 4px solid #4caf50;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 8px;
        }

        .filtros-aplicados-inline strong {
            margin-right: 8px;
            color: #333;
        }

        .filtro-tag {
            background-color: #e0f2f1;
            color: #00695c;
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 13px;
            display: inline-block;
        }

        .no-data-content {
            text-align: center;
            padding: 15px;
            color: #d9534f;
        }

        .no-data-content i {
            font-size: 24px;
            margin-bottom: 8px;
            color: #d9534f;
        }

        .contenedor-calificaciones {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        /* Estilo para el input de número */
        .input-calificaciones {
            padding: 8px 12px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 16px;
            width: 120px;
            transition: border-color 0.15s ease-in-out;
        }

        .input-calificaciones:focus {
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .input-table {
            width: 65px;
            outline: none;
            border-radius: 5px;
            border-color: gainsboro;
            box-shadow: 0 0 0 0.2rem rgba(210, 211, 212, 0.25);
            padding-left: 5px;
            height: 35px;

        }

        .input-table:disabled {
            background-color: #cecece;
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
        ?>
        <!-- CUERPO DEL HTML ESPACIO PARA TRABAJAR YA INCLUIDA LA BARRA  -->
        <div class="main p-3">
            <div class="text-center">
                <?php
                include("../Layout/mensajes.php");
                /* CUERPO DEL MENÚ */
                ?>
                <main class="student-module">
                    <!-- Sección de Información de la Institución -->
                    <section class="institution-info">
                        <h2><i class="fas fa-school"></i> Institución Educativa
                            Ejemplo</h2>
                        <div class="info-grid">
                            <div class="info-item">
                                <i class="fas fa-id-card"></i>
                                <span>RIF: J-12345678-9</span>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Av. Principal, Ciudad, Estado</span>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-envelope"></i>
                                <span>contacto@instituto.edu</span>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-phone"></i>
                                <span>+58 412-1234567</span>
                            </div>
                        </div>
                    </section>
                    <!-- Filtros de Búsqueda -->
                    <form action method="POST" id="infoEstudiante">
                        <section class="search-filters">
                            <div class="search-bar">
                                <input type="text" placeholder="Buscar estudiante..." class="search-input"
                                    name="busquedaEstudiante">
                                <button class="search-btn"><i class="fas fa-search"></i></button>
                                <input type="text" class="filter-input" placeholder="Año escolar" id="anio_escolar"
                                    style="margin-left: 15px; text-align:center;outline:none;" name="anio_escolar"
                                    readonly>
                                <input type="hidden" id="selectLapso" name="selectLapso"
                                    value="<?php echo $_POST['lapso']; ?>">
                            </div>
                            <div class="filter-inputs">
                                <select class="filter-input" id="categoriaGrado" name="categoriaGrado"
                                    onchange="buscarGradodeMaterias()">
                                    <option value>Nivel</option>
                                    <option value="Primaria">Primaria</option>
                                </select>
                                <select class="filter-input" name="nombreGrado" id="nombreGrado"
                                    onchange="cargarSelectMateriasxProfesor()">
                                    <option value>Grados</option>
                                    <option value="Seleccionar">Seleccionar</option>
                                </select>
                                <select class="filter-input" id="lapso" name="lapso">
                                    <option value>Lapso</option>
                                    <option value="Lapso Único">Lapso Único</option>
                                </select>
                                <select class="filter-input" name="docente" id="docente"
                                    onchange="cargarProfesorxGrado()">
                                    <option value>Docente</option>
                                </select>
                                <select class="filter-input" id="materias" name="materias"
                                    onchange="buscarActividadxAsignatura()">
                                    <option value>Asignaturas</option>
                                </select>
                                <button class="filter-btn">Filtrar</button>
                            </div>
                            <div class="search-bar" style="margin-top: 15px;">
                                <select class="search-input" name="contenidos" id="contenidos">
                                    <option value>Contenido</option>
                                </select>

                            </div>
                        </section>
                    </form>

                    <!-- Tabla de Estudiantes -->
                    <section class="student-table">
                        <?php
                        include("../Configuration/Configuration.php");
                        include("../Configuration/functions_php/functionsCRUDEstudiantes.php");
                        include("../Layout/modalesCalificaciones/modallDescargarC.php");
                        include("../Layout/modalesCalificaciones/modalEditarC.php");

                        $idGrado = $_POST['nombreGrado'] ?? null;
                        $lapso = $_POST['lapso'] ?? null;
                        $materia = $_POST['materias'] ?? null;
                        $docente = $_POST['docente'] ?? null;
                        $anioEscolar = $_POST['anio_escolar'] ?? null;
                        $busquedaEstudiante = $_POST['busquedaEstudiante'] ?? null;
                        $contenido = $_POST['contenidos'];

                        ?>
                        <div class="filtros-aplicados-inline">
                            <strong>Filtros aplicados:</strong>

                            <?php if ($busquedaEstudiante): ?>
                                <span class="filtro-tag">Búsqueda: <?= htmlspecialchars($busquedaEstudiante) ?></span>
                            <?php endif; ?>

                            <?php if ($idGrado): ?>
                                <span class="filtro-tag">Grado: <?= htmlspecialchars($idGrado) ?></span>
                            <?php endif; ?>

                            <?php if ($lapso): ?>
                                <span class="filtro-tag">Lapso: <?= htmlspecialchars($lapso) ?></span>
                            <?php endif; ?>

                            <?php if ($materia): ?>
                                <span class="filtro-tag">Materia: <?= htmlspecialchars($materia) ?></span>
                            <?php endif; ?>

                            <?php if ($docente): ?>
                                <span class="filtro-tag">Docente: <?= htmlspecialchars($docente) ?></span>
                            <?php endif; ?>

                            <?php if ($anioEscolar): ?>
                                <span class="filtro-tag">Año escolar: <?= htmlspecialchars($anioEscolar) ?></span>
                            <?php endif; ?>

                            <?php if ($contenido): ?>
                                <span class="filtro-tag" id="contenido" data-valor="<?= htmlspecialchars($contenido) ?>">
                                    Contenidos: <?= htmlspecialchars($contenido) ?>
                                </span>
                            <?php endif; ?>

                            <?php if (!$busquedaEstudiante && !$idGrado && !$lapso && !$materia && !$docente && !$anioEscolar && !$contenido): ?>
                                <span class="filtro-tag">Sin filtros aplicados.</span>
                            <?php endif; ?>
                        </div>
                        <div class="tabla-calificaciones-container">
                            <div class="table-responsive">
                                <table class="calificaciones-table" id="calificaciones-table">
                                    <thead>
                                        <tr>
                                            <th>Cédula Estudiante</th>
                                            <th>Nombre Estudiante</th>
                                            <th>Apellido Estudiante</th>
                                            <th colspan="4">Calificación</th>
                                            <!-- colspan="4" para abarcar las 4 subcolumnas -->
                                            <th class="acciones-col">Acciones</th>
                                        </tr>
                                        <tr>
                                            <th colspan="3"></th> <!-- Celdas vacías para las primeras 3 columnas -->
                                            <th>EX</th>
                                            <th>MB</th>
                                            <th>B</th>
                                            <th>DM</th>
                                            <th></th> <!-- Celda vacía para acciones -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $idProfesor = $_POST['docente'] ?? null;
                                        $idMateria = $_POST['materias'] ?? null;
                                        $idGrado = $_POST['nombreGrado'] ?? null;

                                        if ($idProfesor && $idMateria && $idGrado) {

                                            $sql = "SELECT e.id, e.cedula_est, e.nombres_est, e.apellidos_est
                                            FROM estudiantes e
                                            JOIN profesor_materia_grado pmg ON pmg.id_grado = e.grado_est
                                            WHERE pmg.id_profesor = ?
                                            AND pmg.id_materia = ?
                                            AND pmg.id_grado = ?";

                                            $stmt = $pdo->prepare($sql);
                                            $stmt->execute([$idProfesor, $idMateria, $idGrado]);
                                            $estudiantes = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                            if ($estudiantes) {
                                                foreach ($estudiantes as $estudiante) {
                                                    ?>
                                                    <tr data-estudiante-id="<?= htmlspecialchars($estudiante['id']) ?>"
                                                        data-grado-id="<?= htmlspecialchars($idGrado) ?>"
                                                        data-materia-id="<?= htmlspecialchars($idMateria) ?>"
                                                        data-profesor-id="<?= htmlspecialchars($idProfesor) ?>">
                                                        <td><?= htmlspecialchars($estudiante['cedula_est']) ?></td>
                                                        <td><?= htmlspecialchars($estudiante['nombres_est']) ?></td>
                                                        <td><?= htmlspecialchars($estudiante['apellidos_est']) ?></td>
                                                        <td><input type="text" class="input-table nota-ex"
                                                                onblur="validarNota(this, 'EX')"
                                                                onkeyup="this.value = this.value.toUpperCase();" data-columna="EX">
                                                        </td>
                                                        <td><input type="text" class="input-table nota-mb"
                                                                onblur="validarNota(this, 'MB')"
                                                                onkeyup="this.value = this.value.toUpperCase();" data-columna="MB">
                                                        </td>
                                                        <td><input type="text" class="input-table nota-b"
                                                                onblur="validarNota(this, 'B')"
                                                                onkeyup="this.value = this.value.toUpperCase();" data-columna="B">
                                                        </td>
                                                        <td><input type="text" class="input-table nota-dm"
                                                                onblur="validarNota(this, 'DM')"
                                                                onkeyup="this.value = this.value.toUpperCase();" data-columna="DM">
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-success btn-guardar">
                                                                <i class="bi bi-save"></i> Guardar
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            } else {
                                                echo "<tr><td colspan='5'>No se encontraron estudiantes para los filtros seleccionados.</td></tr>";
                                            }

                                        } else {
                                            echo "<tr><td colspan='5'>Por favor, selecciona profesor, materia y grado.</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </section>
            </div>
        </div>
        </main>
    </div>
    </div>
    </div>
</body>
<script>

    function validarNota(inputElement, valorPermitido) {
        const valorIngresado = inputElement.value.trim().toUpperCase();
        const fila = inputElement.closest('tr');
        const inputsFila = fila.querySelectorAll('.input-table');

        // Validación del valor permitido
        if (valorIngresado === valorPermitido) {
            inputElement.style.borderColor = "green";
            inputElement.setCustomValidity("");

            // Deshabilitar otros inputs si este tiene valor
            if (valorIngresado !== "") {
                inputsFila.forEach(input => {
                    if (input !== inputElement) {
                        input.disabled = true;
                        input.value = ""; // Limpiar otros campos
                        input.style.borderColor = ""; // Resetear borde
                    }
                });
            } else {
                // Si se borra, habilitar todos
                inputsFila.forEach(input => {
                    input.disabled = false;
                });
            }

            return true;
        } else if (valorIngresado === "") {
            // Si está vacío, habilitar todos
            inputsFila.forEach(input => {
                input.disabled = false;
                input.style.borderColor = "";
            });
            return false;
        } else {
            // Valor incorrecto
            inputElement.style.borderColor = "red";
            inputElement.setCustomValidity(`Solo se permite: ${valorPermitido}`);
            inputElement.reportValidity();
            return false;
        }
    }

    $(document).ready(function () {
        // Calcular y asignar el año escolar
        const añoActual = new Date().getFullYear();
        $('#anio_escolar').val(`${añoActual}-${añoActual + 1}`);

        $(document).on('click', '.btn-guardar', function () {
            const $tr = $(this).closest('tr');
            const $btn = $(this);
            //$btn.prop('disabled', true).html('<i class="bi bi-hourglass"></i> Procesando...');

            // Obtener datos de la fila
            const estudianteId = $tr.data('estudiante-id');
            const gradoId = $tr.data('grado-id');
            const materiaId = $tr.data('materia-id');
            const profesorId = $tr.data('profesor-id');
            const lapso = $('#selectLapso').val();
            const anioEscolar = $('#anio_escolar').val();
            const actividad = document.getElementById('contenido').dataset.valor;

            // Obtener la calificación seleccionada
            let calificacion = '';
            let columnaSeleccionada = '';

            // Asegurarse que sea un número
            if (!/^\d+$/.test(actividad)) {
                Swal.fire('Error', 'El contenido debe ser un número válido', 'error');
                return;
            }

            // Buscar qué input tiene valor en esta fila
            $tr.find('.input-table').each(function () {
                const valor = $(this).val().trim();
                if (valor !== '') {
                    calificacion = valor;
                    columnaSeleccionada = $(this).data('columna'); // EX, MB, B o DM
                }
            });

            // Validar que se haya seleccionado una calificación
            if (calificacion === '') {
                Swal.fire('Error', 'Debe seleccionar una calificación para el estudiante', 'error');
                $btn.prop('disabled', false).html('<i class="bi bi-save"></i> Guardar');
                return;
            }

            // Validar que la calificación coincida con la columna
            if (calificacion !== columnaSeleccionada) {
                Swal.fire('Error', `La calificación debe ser exactamente "${columnaSeleccionada}" para esta columna`, 'error');
                $btn.prop('disabled', false).html('<i class="bi bi-save"></i> Guardar');
                return;
            }

            // Preparar datos para enviar
            const datos = {
                estudiante_id: estudianteId,
                grado_id: gradoId,
                materia_id: materiaId,
                profesor_id: profesorId,
                lapso: lapso,
                anio_escolar: anioEscolar,
                calificacion: calificacion,
                actividad: actividad,
                accion: 'guardar_calificacion'
            };

            $.ajax({
                url: '../AJAX/AJAX_Calificaciones/guardarNota.php',
                type: 'POST',
                data: datos,
                dataType: 'json',
                success: function (response) {
                    if (response.type === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: response.message,
                            timer: 2000,
                            showConfirmButton: false
                        });
                        // Opcional: Limpiar campos después de guardar
                        $tr.find('.input-table').val('').prop('disabled', false).css('border-color', '');
                    }
                    else if (response.type === 'warning') {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Advertencia',
                            text: response.message,
                            showConfirmButton: true,
                            confirmButtonText: 'Entendido'
                        });
                    }
                    else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.message,
                            showConfirmButton: true
                        });
                    }
                },
                error: function (xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error de conexión',
                        text: 'No se pudo contactar al servidor: ' + xhr.statusText,
                        showConfirmButton: true
                    });
                }
            });
        });
    });


    function buscarGradodeMaterias() {
        const categoriaGrado = document.getElementById('categoriaGrado').value.trim();
        $.ajax({
            url: "../AJAX/AJAX_Grados/searchGradoxMateria.php",
            type: "POST",
            data: $("#infoEstudiante").serialize(),
            success: function (resultado) {
                $("#nombreGrado").html(resultado);
            },
            error: function (xhr, status, error) {
                console.error("Error en la solicitud AJAX:", error);
            }
        });
    }

    function cargarSelectMateriasxProfesor() {
        $.ajax({
            type: "POST",
            url: "../AJAX/AJAX_Calificaciones/consultarPrCalificacion.php",
            data: $("#infoEstudiante").serialize(),
            success: function (resultado) {
                $("#docente").html(resultado);
                cargarProfesorxGrado();
            },
            error: function (xhr, status, error) {
                console.error("Error en la solicitud AJAX:", error);
            }
        });
    }

    function cargarProfesorxGrado() {
        $.ajax({
            type: "POST",
            url: "../AJAX/AJAX_Calificaciones/consultarPrDocente.php",
            data: $("#infoEstudiante").serialize(),
            success: function (resultado) {
                $("#materias").html(resultado);
            },
            error: function (xhr, status, error) {
                console.error("Error en la solicitud AJAX:", error);
            }
        });
    }

    function buscarActividadxAsignatura() {
        $.ajax({
            url: "../AJAX/AJAX_Calificaciones/actividadxAsignatura.php",
            type: "POST",
            data: $("#infoEstudiante").serialize(),
            success: function (resultado) {
                $("#contenidos").html(resultado);
            },
            error: function (xhr, status, error) {
                console.error("Error en la solicitud AJAX:", error);
            }
        });
    }
</script>

</html>