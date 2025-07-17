<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Asignatura: Pendiente</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="../css/moduloCalificacion_s.css" rel="stylesheet" />
    <style>
        .estado-badge {
            display: inline-block;
            padding: 4px 10px;
            font-size: 0.85rem;
            font-weight: 600;
            border-radius: 12px;
            color: white;
            text-transform: capitalize;
            text-align: center;
        }

        /* Estado: Pendiente (amarillo) */
        .estado-pendiente {
            background-color: #f0ad4e;
        }

        /* Estado: Recuperada (verde) */
        .estado-recuperada {
            background-color: #5cb85c;
        }

        /* Estado: Repetida (rojo) */
        .estado-repetida {
            background-color: #d9534f;
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
                                <!-- Tabla de Materias Pendientes -->
                                <section class="materias-pendientes-table">
                                    <h3>Asignatura Pendientes</h3>
                                    <div class="table-responsive">
                                        <table class="calificaciones-table" id="materias-pendientes-table">
                                            <thead>
                                                <tr>
                                                    <th>Cédula Estudiante</th>
                                                    <th>Nombre</th>
                                                    <th>Apellido</th>
                                                    <th style="display: none;">Materia</th>
                                                    <th style="display: none;">Grado</th>
                                                    <th>Promedio</th>
                                                    <th>Estado</th>
                                                    <th style="display:none">Año Escolar</th>
                                                    <th>Fecha Registro</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if ($materia && $idGrado && $anioEscolar) {
                                                    $sql = "SELECT  mp.*, 
                                                    e.cedula_est, 
                                                    e.nombres_est, 
                                                    e.apellidos_est,
                                                    m.nombre AS nombre_materia,
                                                    g.id_grado AS nombre_grado
                                                    FROM materias_pendientes mp
                                                    JOIN estudiantes e ON mp.id_estudiante = e.id
                                                    JOIN materias m ON mp.id_materia = m.id_materia
                                                    JOIN grados g ON mp.id_grado = g.id
                                                    JOIN profesor_materia_grado pmg ON pmg.id_materia = mp.id_materia 
                                                        AND pmg.id_grado = mp.id_grado 
                                                    WHERE 
                                                    mp.id_materia = ?
                                                    AND mp.id_grado = ?
                                                    AND mp.anio_escolar = ?";

                                                    $stmt = $pdo->prepare($sql);
                                                    $stmt->execute([$materia, $idGrado, $anioEscolar]);
                                                    $pendientes = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                    if ($pendientes) {
                                                        foreach ($pendientes as $row) {
                                                            ?>
                                                            <tr>
                                                                <td><?= htmlspecialchars($row['cedula_est']) ?></td>
                                                                <td><?= htmlspecialchars($row['nombres_est']) ?></td>
                                                                <td><?= htmlspecialchars($row['apellidos_est']) ?></td>
                                                                <td style="display: none;">
                                                                    <?= htmlspecialchars($row['nombre_materia']) ?>
                                                                </td>
                                                                <td style="display: none;">
                                                                    <?= htmlspecialchars($row['nombre_grado']) ?>
                                                                </td>
                                                                <td><?= htmlspecialchars($row['promedio_final']) ?></td>
                                                                <td>
                                                                    <?php
                                                                    $estado = htmlspecialchars($row['estado']);
                                                                    $class = '';
                                                                    switch ($estado) {
                                                                        case 'pendiente':
                                                                            $class = 'estado-pendiente';
                                                                            break;
                                                                        case 'recuperada':
                                                                            $class = 'estado-recuperada';
                                                                            break;
                                                                        case 'repetida':
                                                                            $class = 'estado-repetida';
                                                                            break;
                                                                    }
                                                                    ?>
                                                                    <span
                                                                        class="estado-badge <?= $class ?>"><?= ucfirst($estado) ?></span>
                                                                </td>

                                                                <td style="display:none">
                                                                    <?= htmlspecialchars($row['anio_escolar']) ?>
                                                                </td>
                                                                <td><?= htmlspecialchars($row['fecha_registro']) ?></td>
                                                                <td>
                                                                    <button type="button" class="btn btn-success">
                                                                       <img src="up.png" style="color:rebeccapurple;">
                                                                    </button>
                                                                </td>

                                                            </tr>
                                                            <?php
                                                        }
                                                    } else {
                                                        echo "<tr><td colspan='9'>No se encontraron materias pendientes con los filtros seleccionados.</td></tr>";
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='9'>Por favor, selecciona docente, grado, materia y año escolar.</td></tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
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
    const añoActual = new Date().getFullYear();
    $('#anio_escolar').val(`${añoActual}-${añoActual + 1}`);
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