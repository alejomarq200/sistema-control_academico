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
                            </div>
                            <div class="filter-inputs">
                                <select class="filter-input" id="categoriaGrado" name="categoriaGrado"
                                    onchange="buscarGradodeMaterias()">
                                    <option value>Nivel</option>
                                    <option value="Secundaria">Secundaria</option>
                                </select>
                                <select class="filter-input" name="nombreGrado" id="nombreGrado"
                                    onchange="cargarSelectMateriasxProfesor()">
                                    <option value>Grados</option>
                                    <option value="Seleccionar">Seleccionar</option>
                                </select>
                                <select class="filter-input" id="lapso" name="lapso">
                                    <option value>Lapso</option>
                                    <option value="1er Lapso">1er Lapso</option>
                                    <option value="2do Lapso">2do Lapso</option>
                                    <option value="3er Lapso">3er Lapso</option>
                                </select>
                                <select class="filter-input" name="docente" id="docente"
                                    onchange="cargarProfesorxGrado()">
                                    <option value>Docente</option>
                                </select>
                                <select class="filter-input" id="materias" name="materias">
                                    <option value>Asignaturas</option>
                                </select>
                                <input type="text" class="filter-input" placeholder="Año escolar" id="anio_escolar"
                                    name="anio_escolar" readonly>
                                <input type="hidden" id="selectLapso" name="selectLapso"
                                    value="<?php echo $_POST['lapso']; ?>">
                                <button class="filter-btn">Filtrar</button>
                            </div>
                        </section>
                    </form>
                    <div class="contenedor-calificaciones">
                        <label for="numCalificaciones">Cantidad de calificaciones:</label>
                        <input type="number" id="numCalificaciones" class="input-calificaciones" min="1" max="10"
                            value="1" placeholder="N° calificaciones" >
                        <button id="btnAgregarColumnas" class="filter-btn">Agregar</button>
                    </div>
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

                            <?php if (!$busquedaEstudiante && !$idGrado && !$lapso && !$materia && !$docente && !$anioEscolar): ?>
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
                                            <th>Total</th>
                                            <th class="acciones-col">Acciones</th>
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
                                                        <td class="total">0.00</td>
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
    $(document).ready(function () {
        // Calcular y asignar el año escolar
        const añoActual = new Date().getFullYear();
        $('#anio_escolar').val(`${añoActual}-${añoActual + 1}`);

        // Generar columnas de calificaciones al presionar Agregar
        $('#btnAgregarColumnas').click(function () {
            const numCalificaciones = parseInt($('#numCalificaciones').val()) || 1;

            // Limpiar encabezados y columnas de calificaciones existentes
            $('#calificaciones-table thead tr th.calificacion-col').remove();
            $('#calificaciones-table tbody tr td.calificacion-col').remove();

            // Crear encabezados de calificaciones
            let headers = '';
            for (let i = 1; i <= numCalificaciones; i++) {
                headers += `<th class="calificacion-col">Calif. ${i}</th>`;
            }

            // Insertar encabezados después de "Total"
            $('#calificaciones-table thead tr th:nth-child(4)').after(headers);

            // Insertar inputs en cada fila
            $('#calificaciones-table tbody tr').each(function () {
                const $tr = $(this);
                let inputs = '';
                for (let i = 1; i <= numCalificaciones; i++) {
                    inputs += `<td class="calificacion-col">
                               <input type="number" class="form-control calificacion" 
                                      min="0" max="20" step="0.01" data-indice="${i}">
                           </td>`;
                }
                $tr.find('td:nth-child(4)').after(inputs);
            });
        });

        // Calcular promedio en tiempo real
        $(document).on('input', '.calificacion', function () {
            const $tr = $(this).closest('tr');
            let suma = 0;
            let cantidad = 0;

            $tr.find('.calificacion').each(function () {
                const valor = parseFloat($(this).val()) || 0;
                suma += valor;
                cantidad++;
            });

            const promedio = cantidad > 0 ? (suma / cantidad).toFixed(2) : '0.00';
            $tr.find('.total').text(promedio);
        });

        $(document).on('click', '.btn-guardar', function () {
            const $tr = $(this).closest('tr');

            const estudianteId = $tr.data('estudiante-id');
            const gradoId = $tr.data('grado-id');
            const materiaId = $tr.data('materia-id');
            const profesorId = $tr.data('profesor-id');

            const lapso = $('#selectLapso').val();
            const anioEscolar = $('#anio_escolar').val();

            const calificaciones = [];
            // Asumo que tienes inputs con clase .calificacion en cada fila para capturar las notas
            $tr.find('.calificacion').each(function () {
                calificaciones.push(parseFloat($(this).val()) || 0);
            });

            if (calificaciones.length === 0) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Advertencia',
                    text: 'Debes generar las columnas de calificación primero.',
                    confirmButtonColor: '#3085d6'
                });
                return;
            }

            $.ajax({
                url: "../AJAX/AJAX_Calificaciones/guardarCalificacion.php",
                type: 'POST',
                data: {
                    estudiante_id: estudianteId,
                    grado_id: gradoId,
                    lapso_academico: lapso,
                    profesor_id: profesorId,
                    materia_id: materiaId,
                    anioEscolar: anioEscolar,
                    calificaciones: calificaciones
                },
                success: function (respuesta) {
                    if (respuesta.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Guardado',
                            text: respuesta.message,
                            confirmButtonColor: '#3085d6'
                        });
                    } else if (respuesta.error && respuesta.message.includes('Ya existe un registro')) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Atención',
                            text: respuesta.message,
                            confirmButtonColor: '#f0ad4e'  // color tipo warning (amarillo)
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: respuesta.message || 'Error desconocido',
                            confirmButtonColor: '#d33'
                        });
                    }
                },

                error: function () {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Hubo un problema al guardar las calificaciones',
                        confirmButtonColor: '#d33'
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
</script>

</html>