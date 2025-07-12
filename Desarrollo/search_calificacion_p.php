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
            width: 100%;
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

        .tabla-calificaciones-container {
            width: 100%;
            overflow-x: auto;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .calificaciones-table {
            width: auto;
            /* Cambiado de 100% a auto */
            min-width: 100%;
            /* Asegura que use todo el espacio disponible */
            border-collapse: collapse;
            table-layout: auto;
            /* Permite que las celdas se expandan según contenido */
        }

        .calificaciones-table th {
            position: sticky;
            z-index: 10;
            padding: 12px 15px;
            text-align: left;
            border-bottom: 2px solid #dee2e6;
            font-weight: 600;
            white-space: normal;
            /* Permite múltiples líneas */
            word-wrap: break-word;
            max-width: 300px;
            /* Ancho máximo para los encabezados */
        }

        .calificaciones-table td {
            padding: 10px 15px;
            border-bottom: 1px solid #dee2e6;
            vertical-align: middle;
            white-space: nowrap;
            /* Evita que el contenido de celdas se divida */
        }

        .calificaciones-table tr:hover {
            background-color: #f5f5f5;
        }

        /* Estilos para las calificaciones */
        .nota-alta {
            color: #28a745;
            font-weight: bold;
        }

        .nota-media {
            color: #ffc107;
        }

        .nota-baja {
            color: #dc3545;
        }

        /* Scrollbar personalizada */
        .tabla-calificaciones-container::-webkit-scrollbar {
            height: 10px;
        }

        .tabla-calificaciones-container::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }

        .tabla-calificaciones-container::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 4px;
        }

        .tabla-calificaciones-container::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        .is-invalid {
            border-color: red;
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
                            <div class="search-box">
                                <input type="text" autocomplete="off" placeholder="Buscar estudiante..."
                                    class="search-input" name="busquedaEstudiante" /> <button class="search-btn"><i
                                        class="fas fa-search" style="display: none;"></i></button>
                                <div class="result"></div>
                            </div>
                            <div class="filter-inputs">
                                
                                <input type="text" class="filter-input" placeholder="Año escolar" id="anio_escolar"
                                    style="margin-left: 15px; text-align:center;outline:none;" name="anio_escolar"
                                    readonly>
                                <input type="hidden" id="selectLapso" name="selectLapso"
                                    value="<?php echo $_POST['lapso']; ?>" required>
                                <select class="filter-input" id="categoriaGrado" name="categoriaGrado"
                                    onchange="buscarGradodeMaterias()" required>
                                    <option>Nivel</option>
                                    <option value="Primaria">Primaria</option>
                                </select>
                                <select class="filter-input" name="nombreGrado" id="nombreGrado"
                                    onchange="cargarSelectMateriasxProfesor()" required>
                                    <option value>Grados</option>
                                </select>
                                <select class="filter-input" id="lapso" name="lapso">
                                    <option value="Lapso Único" selected>Lapso Único</option>
                                </select>
                                <select class="filter-input" name="docente" id="docente"
                                    onchange="cargarProfesorxGrado()" required>
                                    <option value>Docente</option>
                                </select>
                                <select class="filter-input" id="materias" name="materias"
                                    onchange="buscarActividadxAsignatura()" required>
                                    <option value=>Asignaturas</option>
                                </select>
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
                        $contenido = $_POST['contenidos'];

                        //función genérica para retornar valores específicos y sencillos
                        $nombreProfesor = obtenerValorUnico($pdo, 'profesores', 'nombre', 'id_profesor', $docente);
                        $nombreGrado = obtenerValorUnico($pdo, 'grados', 'id_grado', 'id', $idGrado);
                        $nombreMateria = obtenerValorUnico($pdo, 'materias', 'nombre', 'id_materia', $materia);
                        $descrpContenido = obtenerValorUnico($pdo, 'actividades', 'contenido', 'id_actividad', $contenido);
                        ?>
                        <div class="filtros-aplicados-inline">
                            <strong>Filtros aplicados:</strong>

                            <?php if ($busquedaEstudiante): ?>
                                <span class="filtro-tag">Búsqueda: <?= htmlspecialchars($busquedaEstudiante) ?></span>
                            <?php endif; ?>

                            <?php if ($$nombreGrado): ?>
                                <span class="filtro-tag">Grado: <?= htmlspecialchars($$nombreGrado) ?></span>
                            <?php endif; ?>

                            <?php if ($lapso): ?>
                                <span class="filtro-tag">Lapso: <?= htmlspecialchars($lapso) ?></span>
                            <?php endif; ?>

                            <?php if ($nombreMateria): ?>
                                <span class="filtro-tag">Materia: <?= htmlspecialchars($nombreMateria) ?></span>
                            <?php endif; ?>

                            <?php if ($nombreProfesor): ?>
                                <span class="filtro-tag">Docente: <?= htmlspecialchars($nombreProfesor) ?></span>
                            <?php endif; ?>

                            <?php if ($anioEscolar): ?>
                                <span class="filtro-tag">Año escolar: <?= htmlspecialchars($anioEscolar) ?></span>
                            <?php endif; ?>

                            <?php if ($descrpContenido): ?>
                                <span class="filtro-tag" id="contenido"
                                    data-valor="<?= htmlspecialchars($descrpContenido) ?>">
                                    Contenidos: <?= htmlspecialchars($descrpContenido) ?>
                                </span>
                            <?php endif; ?>

                            <?php if (!$busquedaEstudiante && !$idGrado && !$lapso && !$materia && !$docente && !$anioEscolar && !$contenido): ?>
                                <span class="filtro-tag">Sin filtros aplicados.</span>
                            <?php endif; ?>
                        </div>
                        <div class="tabla-calificaciones-container">
                            <table class="calificaciones-table" id="calificaciones-table">
                                <thead>
                                    <tr>
                                        <th style="min-width: 120px;">Cédula Estudiante</th>
                                        <th style="min-width: 150px;">Nombre Estudiante</th>
                                        <th style="min-width: 150px;">Apellido Estudiante</th>

                                        <?php
                                        // Obtener actividades filtradas
                                        $sqlActividades = "SELECT id_actividad, contenido FROM actividades 
                                        WHERE id_profesor = ? AND id_materia = ? AND id_grado = ?";
                                        $stmtAct = $pdo->prepare($sqlActividades);
                                        $stmtAct->execute([$docente, $materia, $idGrado]);
                                        $actividades = $stmtAct->fetchAll(PDO::FETCH_ASSOC);

                                        foreach ($actividades as $actividad) {
                                            echo "<th style='min-width: 250px; white-space: normal;'>"
                                                . htmlspecialchars($actividad['contenido']) . "</th>";
                                        }
                                        ?>
                                        <th style="min-width: 150px;">Acciones</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($docente && $materia && $idGrado) {
                                        $sqlEst = "SELECT id, cedula_est, nombres_est, apellidos_est 
                                    FROM estudiantes 
                                    WHERE grado_est = ?";

                                        $params = [$idGrado];

                                        if (!empty($busquedaEstudiante)) {
                                            $sqlEst .= " AND (cedula_est LIKE ? OR nombres_est LIKE ? OR apellidos_est LIKE ?)";
                                            $busquedaWildcard = '%' . $busquedaEstudiante . '%';
                                            array_push($params, $busquedaWildcard, $busquedaWildcard, $busquedaWildcard);
                                        }

                                        $stmtEst = $pdo->prepare($sqlEst);
                                        $stmtEst->execute($params);

                                        $estudiantes = $stmtEst->fetchAll(PDO::FETCH_ASSOC);

                                        foreach ($estudiantes as $estudiante) {
                                            // Obtener TODAS las calificaciones del estudiante para esta materia/grado
                                            $sqlCalifs = "SELECT c.id, c.calificacion, c.actividad, a.contenido 
                                            FROM calificaciones c
                                            JOIN actividades a ON c.actividad = a.id_actividad
                                            WHERE c.id_estudiante = ? 
                                            AND c.id_materia = ? 
                                            AND c.id_grado = ? 
                                            AND c.id_profesor = ?";
                                            $stmtCalifs = $pdo->prepare($sqlCalifs);
                                            $stmtCalifs->execute([
                                                $estudiante['id'],
                                                $materia,
                                                $idGrado,
                                                $docente
                                            ]);
                                            $calificaciones = $stmtCalifs->fetchAll(PDO::FETCH_ASSOC);

                                            echo "<tr data-estudiante-id='" . htmlspecialchars($estudiante['id']) . "' 
                                            data-grado-id='" . htmlspecialchars($idGrado) . "'
                                            data-materia-id='" . htmlspecialchars($materia) . "'
                                            data-profesor-id='" . htmlspecialchars($docente) . "'>";

                                            echo "<td>" . htmlspecialchars($estudiante['cedula_est']) . "</td>";
                                            echo "<td>" . htmlspecialchars($estudiante['nombres_est']) . "</td>";
                                            echo "<td>" . htmlspecialchars($estudiante['apellidos_est']) . "</td>";

                                            foreach ($actividades as $actividad) {
                                                $nota = '-';
                                                $claseNota = '';

                                                // Buscar si existe calificación para esta actividad
                                                foreach ($calificaciones as $calificacion) {
                                                    if ($calificacion['actividad'] == $actividad['id_actividad']) {
                                                        $nota = $calificacion['calificacion'];

                                                        if (is_numeric($nota)) {
                                                            $claseNota = $nota >= 10 ? 'nota-alta' : ($nota >= 5 ? 'nota-media' : 'nota-baja');
                                                        } else {
                                                            $claseNota = ($nota == 'EX' || $nota == 'MB') ? 'nota-alta' : 'nota-media';
                                                        }
                                                        break;
                                                    }
                                                }

                                                echo "<td class='$claseNota'>" . htmlspecialchars($nota) . "</td>";
                                            }

                                            echo "<td>
                                                <button class='btn-editar' 
                                                        data-estudiante='" . htmlspecialchars($estudiante['id']) . "'
                                                        data-calificaciones='" . htmlspecialchars(json_encode($calificaciones), ENT_QUOTES, 'UTF-8') . "'>
                                                    <i class='bi bi-pencil'></i> Editar
                                                </button>
                                            </td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='" . (count($actividades) + 4) . "'>Por favor, selecciona profesor, materia y grado.</td></tr>";
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
<!-- Modal para editar calificaciones -->
<div class="modal fade" id="editarCalificacionesModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Calificaciones</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formEditarCalificaciones">
                    <input type="hidden" id="estudianteId" name="estudiante_id">
                    <input type="hidden" id="gradoId" name="grado_id">
                    <input type="hidden" id="materiaId" name="materia_id">
                    <input type="hidden" id="profesorId" name="profesor_id">

                    <div class="mb-3">
                        <label class="form-label">Estudiante:</label>
                        <p class="form-control-static" id="nombreEstudiante"></p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Cédula:</label>
                        <p class="form-control-static" id="cedulaEstudiante"></p>
                    </div>

                    <div id="camposCalificaciones">
                        <!-- Los campos de calificaciones se generarán dinámicamente aquí -->
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="guardarCambios">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function () {
        $('.search-box input[type="text"]').on("keyup input", function () {
            /* Get input value on change */
            var inputVal = $(this).val();
            var resultDropdown = $(this).siblings(".result");
            if (inputVal.length) {
                $.get("backend-search.php", { term: inputVal }).done(function (data) {
                    // Display the returned data in browser
                    resultDropdown.html(data);
                });
            } else {
                resultDropdown.empty();
            }
        });

        // Set search input value on click of result item
        $(document).on("click", ".result p", function () {
            $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
            $(this).parent(".result").empty();
        });
    });
    document.addEventListener("DOMContentLoaded", function () {
        // Delegación de evento para botones editar
        document.querySelectorAll(".btn-editar").forEach(button => {
            button.addEventListener("click", function () {
                const estudianteId = this.dataset.estudiante;
                const calificaciones = JSON.parse(this.dataset.calificaciones);
                const tr = this.closest("tr");

                // Obtener datos desde los atributos del <tr>
                const gradoId = tr.dataset.gradoId;
                const materiaId = tr.dataset.materiaId;
                const profesorId = tr.dataset.profesorId;
                const cedula = tr.children[0].textContent.trim();
                const nombres = tr.children[1].textContent.trim();
                const apellidos = tr.children[2].textContent.trim();

                // Asignar datos al modal
                document.getElementById("estudianteId").value = estudianteId;
                document.getElementById("gradoId").value = gradoId;
                document.getElementById("materiaId").value = materiaId;
                document.getElementById("profesorId").value = profesorId;

                document.getElementById("nombreEstudiante").textContent = `${nombres} ${apellidos}`;
                document.getElementById("cedulaEstudiante").textContent = cedula;

                // Generar inputs de calificaciones
                const contenedor = document.getElementById("camposCalificaciones");
                contenedor.innerHTML = ""; // Limpiar anteriores

                if (Array.isArray(calificaciones)) {
                    calificaciones.forEach(c => {
                        const grupo = document.createElement("div");
                        grupo.className = "mb-3";

                        grupo.innerHTML = `
                        <label class="form-label">${c.contenido}</label>
                        <input type="hidden" name="calificaciones[${c.id}][id]" value="${c.id}">
                        <input type="text" class="form-control calificacion-input" 
                        name="calificaciones[${c.id}][valor]" 
                        value="${c.calificacion}" 
                        pattern="EX|MB|B|DM" 
                        title="Valores válidos: EX, MB, B, DM" onkeyup="this.value = this.value.toUpperCase();"
                        required>
                `;

                        contenedor.appendChild(grupo);
                    });
                }

                // Mostrar modal
                const modal = new bootstrap.Modal(document.getElementById('editarCalificacionesModal'));
                modal.show();
            });
        });

        // Guardar cambios vía AJAX
        document.getElementById("guardarCambios").addEventListener("click", function () {
            const form = document.getElementById("formEditarCalificaciones");
            const formData = new FormData(form);

            const inputs = form.querySelectorAll(".calificacion-input");
            const validValues = ["EX", "MB", "B", "DM"];
            let valid = true;

            inputs.forEach(input => {
                const value = input.value.trim().toUpperCase();
                if (!validValues.includes(value)) {
                    input.classList.add("is-invalid");
                    valid = false;
                } else {
                    input.classList.remove("is-invalid");
                }
            });

            if (!valid) {
                alert("Por favor, ingresa solo valores válidos: EX, MB, B, o DM.");
                return; // No envía si hay errores
            }


            fetch("../AJAX/AJAX_Calificaciones/editarCalificacion_p.php", {
                method: "POST",
                body: formData,
            })
                .then(resp => resp.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: '¡Éxito!',
                            text: 'Calificaciones actualizadas correctamente',
                            timer: 3000,
                            timerProgressBar: true,
                            showConfirmButton: false
                        }).then(() => {
                            $('#editarCalificacionesModal').modal('hide');
                            // Opción 1: Recargar la página
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: data.message || 'Error al actualizar calificaciones',
                            confirmButtonText: 'Entendido'
                        });
                    }
                })
                .catch(error => {
                    console.error("Error en AJAX:", error);
                    alert("Ocurrió un error en la solicitud");
                });
        });
    });
</script>

<script>
    document.getElementById("infoEstudiante").addEventListener("submit", function (event) {
        event.preventDefault();

        // Array con todos los campos a validar
        const campos = [
            { id: 'categoriaGrado', nombre: 'Nivel' },
            { id: 'nombreGrado', nombre: 'Grado' },
            { id: 'docente', nombre: 'Docente' },
            { id: 'materias', nombre: 'Asignatura' },
        ];

        let camposInvalidos = [];
        let primerCampoInvalido = null;

        // Validar cada campo
        campos.forEach(campo => {
            const elemento = document.getElementById(campo.id);
            const valor = elemento ? elemento.value.trim() : '';

            if (!valor || valor === "Seleccionar") {
                camposInvalidos.push(campo.nombre);

                // Resaltar campo inválido
                elemento.style.borderColor = '#ff9800';
                elemento.style.boxShadow = '0 0 0 2px rgba(255, 152, 0, 0.2)';

                // Guardar el primer campo inválido para enfocarlo
                if (!primerCampoInvalido) {
                    primerCampoInvalido = elemento;
                }
            } else {
                // Restablecer estilos si es válido
                elemento.style.borderColor = '';
                elemento.style.boxShadow = '';
            }
        });

        // Si hay campos inválidos
        if (camposInvalidos.length > 0) {
            if (primerCampoInvalido) {
                primerCampoInvalido.focus();
            }

            Swal.fire({
                icon: 'warning',
                title: 'Campos requeridos',
                html: `Los siguientes campos son obligatorios:<br><br>- ${camposInvalidos.join('<br>- ')}`,
                confirmButtonColor: '#f0ad4e'
            });
            return false;
        }

        // Si todo está válido, enviar el formulario
        this.submit();
    });

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