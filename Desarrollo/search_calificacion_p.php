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
    <link rel="stylesheet" href="../css/moduloCalificacion_p.css">
</head>

<body>
    <!-- DIV PARA TRABAJAR CON EL MENÚ Y EL FORMULARIO RESPECTIVO  -->
    <div class="wrapper">
        <?php
        include("menu_1.php");
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
                        <h2><i class="fas fa-school"></i>UNIDAD EDUCATIVA COLEGIO “PRADO DEL NORTE” </h2>
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
                                    onchange="buscarTipoContenidoxAsignatura();" required>
                                    <option value=>Asignaturas</option>
                                </select>
                                <select class="filter-input" id="tipoContenido" name="tipoContenido" required>
                                    <option value=>Descripción de Contenido</option>
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
                        include("../Layout/modalesCalificaciones/modalEditarCPrimaria.php");

                        $idGrado = $_POST['nombreGrado'] ?? null;
                        $lapso = $_POST['lapso'] ?? null;
                        $materia = $_POST['materias'] ?? null;
                        $docente = $_POST['docente'] ?? null;
                        $anioEscolar = $_POST['anio_escolar'] ?? null;
                        $busquedaEstudiante = $_POST['busquedaEstudiante'] ?? null;
                        $contenido = $_POST['contenidos'];
                        $tipoContenido = $_POST['tipoContenido'];

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

                            <?php if ($tipoContenido): ?>
                                <span class="filtro-tag" id="contenido"
                                    data-valor="<?= htmlspecialchars($tipoContenido) ?>">
                                    Descripción de contenido: <?= htmlspecialchars($tipoContenido) ?>
                                </span>
                            <?php endif; ?>

                            <?php if (!$busquedaEstudiante && !$idGrado && !$lapso && !$materia && !$docente && !$anioEscolar && !$contenido && !$tipoContenido): ?>
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
                                        WHERE id_profesor = ? AND id_materia = ? AND id_grado = ? AND tipo_contenido = ?";
                                        $stmtAct = $pdo->prepare($sqlActividades);
                                        $stmtAct->execute([$docente, $materia, $idGrado, $tipoContenido]);
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
                                            // Separar el input por el guión si existe
                                            $partesBusqueda = explode('-', $busquedaEstudiante, 2);

                                            // Limpiar cada parte
                                            $parte1 = trim($partesBusqueda[0] ?? '');
                                            $parte2 = trim($partesBusqueda[1] ?? '');

                                            // Construir la condición de búsqueda
                                            $condicionesBusqueda = [];
                                            $paramsBusqueda = [];

                                            if (!empty($parte1)) {
                                                $condicionesBusqueda[] = "cedula_est LIKE ?";
                                                $paramsBusqueda[] = '%' . $parte1 . '%';
                                            }

                                            if (!empty($parte2)) {
                                                $condicionesBusqueda[] = "(nombres_est LIKE ? OR apellidos_est LIKE ?)";
                                                $paramsBusqueda[] = '%' . $parte2 . '%';
                                                $paramsBusqueda[] = '%' . $parte2 . '%';
                                            }

                                            // Si hay condiciones de búsqueda, agregarlas a la consulta SQL
                                            if (!empty($condicionesBusqueda)) {
                                                $sqlEst .= " AND (" . implode(" OR ", $condicionesBusqueda) . ")";
                                                $params = array_merge($params, $paramsBusqueda);
                                            }
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
<script src="../js/consultarCalificacionPrimaria.js"></script>

</html>