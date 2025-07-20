<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo Calificaciones: Secundaria</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="../css/moduloCalificacion_s.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Bundle JS (incluye Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
                        <h2><i class="fas fa-school"></i>UNIDAD EDUCATIVA COLEGIO “PRADO DEL NORTE”	</h2>
                        <div class="info-grid">
                            <div class="info-item">
                                <i class="fas fa-id-card"></i>
                                <span>Cód.DEA: PD00361303</span>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>AV. INTERCOMUNAL TAMACA EL CUJI KM. 08 VÍA DUACA</span>
                            </div>
                          
                            <div class="info-item">
                                <i class="fas fa-phone"></i>
                                <span>0251-8145640</span>
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
                            value="1" placeholder="N° calificaciones">
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

                        $grado = obtenerValorUnico($pdo, 'grados', 'id_grado', 'id', $idGrado);
                        $nombreMateria = obtenerValorUnico($pdo, 'materias', 'nombre', 'id_materia', $materia);
                        $profesor = obtenerValorUnico($pdo, 'profesores', 'nombre', 'id_profesor', $docente);
                        ?>
                        <div class="filtros-aplicados-inline">
                            <strong>Filtros aplicados:</strong>

                            <?php if ($busquedaEstudiante): ?>
                                <span class="filtro-tag">Búsqueda: <?= htmlspecialchars($busquedaEstudiante) ?></span>
                            <?php endif; ?>

                            <?php if ($grado): ?>
                                <span class="filtro-tag">Grado: <?= htmlspecialchars($grado) ?></span>
                            <?php endif; ?>

                            <?php if ($lapso): ?>
                                <span class="filtro-tag">Lapso: <?= htmlspecialchars($lapso) ?></span>
                            <?php endif; ?>

                            <?php if ($nombreMateria): ?>
                                <span class="filtro-tag">Materia: <?= htmlspecialchars($nombreMateria) ?></span>
                            <?php endif; ?>

                            <?php if ($profesor): ?>
                                <span class="filtro-tag">Docente: <?= htmlspecialchars($profesor) ?></span>
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
            const total = $tr.find('.total').text();
            const lapso = $('#selectLapso').val();
            const anioEscolar = $('#anio_escolar').val();

            const calificaciones = [];
            console.log(total);
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
                    calificaciones: calificaciones,
                    total: total
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
                    } else if (respuesta.error && respuesta.message.includes('Su materia se registró ')) {
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