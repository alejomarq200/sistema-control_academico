<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo Calificaciones: Primaria</title>
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
    <link rel="stylesheet" href="../css/regCalificacionPrimaria.css">

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

                                <input type="text" class="filter-input" placeholder="Año escolar" id="anio_escolar"
                                    style="margin-left: 15px; text-align:center;outline:none;" name="anio_escolar"
                                    readonly>
                                <input type="hidden" id="selectLapso" name="selectLapso"
                                    value="<?php echo $_POST['lapso']; ?>" required>
                                     <input type="hidden" id="tcontent" name="tcontent"
                                    value="<?php echo $_POST['tipocontenido']; ?>">
                            </div>
                            <div class="filter-inputs">
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
                                <input type="hidden" name="tipocontenido" id="tipocontenido" readonly>
                                <button class="filter-btn">Filtrar</button>
                            </div>
                            <div class="search-bar" style="margin-top: 15px;">
                                <select class="search-input" name="contenidos" id="contenidos" required>
                                    <option value="Seleccionar">Contenido</option>
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
                                <span class="filtro-tag" id="contenido" data-valor="<?= htmlspecialchars($contenido) ?>">
                                    Contenidos: <?= htmlspecialchars($descrpContenido) ?>
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
<script src="../js/creaCalificacionPrimaria.js"></script>
</html>