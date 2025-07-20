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
    <!-- Tus scripts personalizados -->
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

        .search-input {
            flex: 1;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 5px 0 0 5px;
            font-size: 1rem;
            width: 100%;
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
        include("../Configuration/functions_php/functionsCRUDEstudiantes.php");
        include("../Layout/modalesCalificaciones/modalEditarC.php");
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
                    <!-- Formulario de Filtros -->
                    <form action method="POST" id="infoEstudiante">
                        <section class="search-filters">
                            <div class="search-box">
                                <input type="text" autocomplete="off" placeholder="Buscar estudiante..."
                                    class="search-input" name="busquedaEstudiante" /> <button class="search-btn"><i
                                        class="fas fa-search" style="display: none;"></i></button>
                                <div class="result"></div>
                            </div>
                            <div class="filter-inputs">
                                <select class="filter-input" id="categoriaGrado" name="categoriaGrado"
                                    onchange="buscarGradodeMaterias()" required>
                                    <option value>Nivel</option>
                                    <option value="Secundaria">Secundaria</option>
                                </select>
                                <select class="filter-input" name="nombreGrado" id="nombreGrado"
                                    onchange="cargarSelectMateriasxProfesor()" required>
                                    <option value>Grados</option>
                                    <option value="Seleccionar">Seleccionar</option>
                                </select>
                                <select class="filter-input" id="lapso" name="lapso" required>
                                    <option value>Lapso</option>
                                    <option value="1er Lapso">1er Lapso</option>
                                    <option value="2do Lapso">2do Lapso</option>
                                    <option value="3er Lapso">3er Lapso</option>
                                </select>
                                <select class="filter-input" name="docente" id="docente"
                                    onchange="cargarProfesorxGrado()" required>
                                    <option value>Docente</option>
                                </select>
                                <select class="filter-input" id="materias" name="materias" required>
                                    <option value>Asignaturas</option>
                                </select>
                                <input type="text" class="filter-input" placeholder="Año escolar" id="anio_escolar"
                                    name="anio_escolar" readonly>
                                <button class="filter-btn">Filtrar</button>
                            </div>
                        </section>
                    </form>
                    <section class="student-table">
                        <?php
                        // Recoger parámetros del formulario
                        $idProfesor = $_POST['docente'] ?? null;
                        $idMateria = $_POST['materias'] ?? null;
                        $idGrado = $_POST['nombreGrado'] ?? null;
                        $lapso = $_POST['lapso'] ?? null;
                        // Ejemplo resultado devuelto: V14256321 - Arianna Solis
                        $busquedaEstudiante = $_POST['busquedaEstudiante'] ?? null;
                        $anioEscolar = $_POST['anio_escolar'] ?? null;

                        // Verificar si hay parámetros válidos para la consulta
                        if ($busquedaEstudiante || ($idProfesor && $idMateria && $idGrado)) {
                            // Construir consulta SQL base
                            $sql = "SELECT e.id, e.cedula_est, e.nombres_est, e.apellidos_est,
                            c.id as calificacion_id, c.lapso_academico, c.calificacion
                            FROM estudiantes e
                            JOIN profesor_materia_grado pmg ON pmg.id_grado = e.grado_est
                            LEFT JOIN calificaciones c ON c.id_estudiante = e.id 
                            AND c.id_materia = pmg.id_materia
                            AND c.id_grado = pmg.id_grado";

                            // Preparar condiciones y parámetros
                            $conditions = [];
                            $params = [];

                            // Búsqueda por nombre/cedula
                            if ($busquedaEstudiante) {
                                // Extraer solo la parte antes del guión (si existe)
                                $partes = explode('-', $busquedaEstudiante);
                                $valorFiltrado = trim($partes[0]); // trim() elimina espacios alrededor
                        
                                // Determinar si es cédula (empieza con V/E/J/P) o nombre
                                if (preg_match('/^[VEJP]\d/', $valorFiltrado)) {
                                    // Búsqueda por cédula exacta o parcial
                                    $conditions[] = "e.cedula_est LIKE ?";
                                    $params[] = $valorFiltrado . '%';
                                } else {
                                    // Búsqueda por nombre/apellido
                                    $conditions[] = "(e.nombres_est LIKE ? OR e.apellidos_est LIKE ?)";
                                    $params[] = '%' . $valorFiltrado . '%';
                                    $params[] = '%' . $valorFiltrado . '%';
                                }
                            }

                            // Filtros regulares (se mantienen igual)
                            if ($idProfesor) {
                                $conditions[] = "pmg.id_profesor = ?";
                                $params[] = $idProfesor;
                            }

                            if ($idMateria) {
                                $conditions[] = "pmg.id_materia = ?";
                                $params[] = $idMateria;
                            }

                            if ($idGrado) {
                                $conditions[] = "pmg.id_grado = ?";
                                $params[] = $idGrado;
                            }

                            if ($lapso) {
                                $conditions[] = "c.lapso_academico = ?";
                                $params[] = $lapso;
                            }

                            // Combinar condiciones
                            if (!empty($conditions)) {
                                $sql .= " WHERE " . implode(" AND ", $conditions);
                            }

                            // Ordenar resultados
                            $sql .= " ORDER BY e.apellidos_est, e.nombres_est, c.lapso_academico";

                            // Ejecutar consulta
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute($params);
                            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            // Procesar resultados para agrupar por estudiante (se mantiene igual)
                            $estudiantesConCalificaciones = [];
                            foreach ($resultados as $row) {
                                $idEstudiante = $row['id'];

                                if (!isset($estudiantesConCalificaciones[$idEstudiante])) {
                                    $estudiantesConCalificaciones[$idEstudiante] = [
                                        'id' => $row['id'],
                                        'cedula_est' => $row['cedula_est'],
                                        'nombre_completo' => $row['nombres_est'] . ' ' . $row['apellidos_est'],
                                        'calificaciones' => []
                                    ];
                                }

                                if ($row['calificacion_id']) {
                                    $estudiantesConCalificaciones[$idEstudiante]['calificaciones'][] = [
                                        'id' => $row['calificacion_id'],
                                        'valor' => $row['calificacion'],
                                        'lapso' => $row['lapso_academico']
                                    ];
                                }
                            }

                            //función genérica para retornar valores específicos y sencillos
                            $nombreProfesor = obtenerValorUnico($pdo, 'profesores', 'nombre', 'id_profesor', $idProfesor);
                            $nombreGrado = obtenerValorUnico($pdo, 'grados', 'id_grado', 'id', $idGrado);
                            $nombreMateria = obtenerValorUnico($pdo, 'materias', 'nombre', 'id_materia', $idMateria);
                            $nombreEstudiante = obtenerValorUnico($pdo, 'estudiantes', 'nombres_est', 'cedula_est', $busquedaEstudiante);
                            $idEstudianteSearch = obtenerValorUnico($pdo, 'estudiantes', 'cedula_est', 'nombre_est', $busquedaEstudiante);
                            ?>

                            <!-- Mostrar filtros aplicados -->
                            <div class="filtros-aplicados-inline">
                                <strong>Filtros aplicados:</strong>
                                <?php if ($busquedaEstudiante): ?>
                                    <span class="filtro-tag">Grado: <?= htmlspecialchars($busquedaEstudiante) ?></span>
                                <?php endif; ?>

                                <?php if ($nombreGrado): ?>
                                    <span class="filtro-tag">Grado: <?= htmlspecialchars($nombreGrado) ?></span>
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

                                <?php if (!$busquedaEstudiante && !$idGrado && !$lapso && !$idMateria && !$idProfesor && !$anioEscolar): ?>
                                    <span class="filtro-tag">Sin filtros aplicados.</span>
                                <?php endif; ?>
                            </div>

                            <!-- Tabla de resultados -->
                            <div class="tabla-calificaciones-container">
                                <div class="table-responsive">
                                    <table class="calificaciones-table">
                                        <thead>
                                            <tr>
                                                <th>Cédula</th>
                                                <th>Estudiante</th>
                                                <?php
                                                // Determinar el número máximo de calificaciones por estudiante
                                                $maxCalifs = 0;
                                                if (!empty($estudiantesConCalificaciones)) {
                                                    foreach ($estudiantesConCalificaciones as $estudiante) {
                                                        $count = count($estudiante['calificaciones']);
                                                        if ($count > $maxCalifs) {
                                                            $maxCalifs = $count;
                                                        }
                                                    }

                                                    // Generar encabezados dinámicos para las calificaciones
                                                    for ($i = 1; $i <= $maxCalifs; $i++) {
                                                        echo "<th>C$i</th>";
                                                    }
                                                }
                                                ?>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Mostrar los resultados
                                            if (!empty($estudiantesConCalificaciones)) {
                                                foreach ($estudiantesConCalificaciones as $estudiante) {
                                                    ?>
                                                    <tr data-estudiante-id="<?= htmlspecialchars($estudiante['id']) ?>"
                                                        data-grado-id="<?= htmlspecialchars($idGrado) ?>"
                                                        data-materia-id="<?= htmlspecialchars($idMateria) ?>"
                                                        data-profesor-id="<?= htmlspecialchars($idProfesor) ?>">
                                                        <td><?= htmlspecialchars($estudiante['cedula_est']) ?></td>
                                                        <td><?= htmlspecialchars($estudiante['nombre_completo']) ?></td>

                                                        <?php
                                                        // Mostrar las calificaciones
                                                        foreach ($estudiante['calificaciones'] as $calificacion) {
                                                            echo '<td class="' . ($calificacion['valor'] < 10 ? 'nota-baja' : 'nota-alta') . '">';
                                                            echo htmlspecialchars($calificacion['valor']);
                                                            echo '</td>';
                                                        }

                                                        // Completar con celdas vacías si tiene menos calificaciones
                                                        for ($i = count($estudiante['calificaciones']); $i < $maxCalifs; $i++) {
                                                            echo '<td class="nota-vacia">-</td>';
                                                        }
                                                        ?>

                                                        <td>
                                                            <button class="btn-editar" data-estudiante="<?= $estudiante['id'] ?>"
                                                                data-calificaciones='<?= json_encode($estudiante['calificaciones']) ?>'>
                                                                <i class="bi bi-pencil"></i> Editar
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            } else {
                                                echo "<tr><td colspan='" . ($maxCalifs + 3) . "'>No se encontraron estudiantes con calificaciones para los filtros seleccionados.</td></tr>";
                                            }
                        } else {
                            echo "<tr><td colspan='4'>Por favor, selecciona profesor, materia y grado o ingresa un nombre para buscar.</td></tr>";
                        }
                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </main>
            </div>
        </div>
    </div>
</body>
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

</script>
   
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Calcular y asignar el año escolar
        const añoActual = new Date().getFullYear();
        $('#anio_escolar').val(`${añoActual}-${añoActual + 1}`);


        // Cambia el nombre de la función alert para evitar conflictos
        contarFilasTbody();

        compararValores();
        const form = document.getElementById('infoEstudiante');
        const searchInput = document.querySelector('input[name="busquedaEstudiante"]');
        const requiredSelects = [
            document.querySelector('select[name="nombreGrado"]'),
            document.querySelector('select[name="docente"]'),
            document.querySelector('select[name="materias"]')
        ];

        // Controlar campos requeridos según búsqueda
        searchInput.addEventListener('input', function () {
            const hasSearch = this.value.trim() !== '';
            requiredSelects.forEach(select => {
                select.required = hasSearch;
            });
        });

        // Validar envío del formulario
        form.addEventListener('submit', function (e) {
            const hasSearch = searchInput.value.trim() !== '';
            const missingRequired = requiredSelects.some(select => !select.value);

            if (hasSearch && missingRequired) {
                e.preventDefault();
                alert('Cuando buscas por nombre de estudiante, debes seleccionar grado, docente y materia');
                return false;
            }

            // Validación mínima para consulta general
            if (!hasSearch && missingRequired) {
                e.preventDefault();
                alert('Para consultar el listado completo, debes seleccionar grado, docente y materia');
                return false;
            }
        });
    });


    function compararValores() {
        const contador = parseInt(document.getElementById('contador').value.trim()) || 0;
        const totalMaterias = parseInt(document.getElementById('totalMaterias').value.trim()) || 0;

        const total = document.getElementById('total').value = totalMaterias * 3;
    }
    function contarFilasTbody() {
        const tabla = document.getElementById('calificaciones-table');
        const tbody = tabla.getElementsByTagName('tbody')[0];
        const numeroFilasTbody = tbody.rows.length;
        document.getElementById('contador').value = numeroFilasTbody;
    }


    // Asignar el valor al input
    document.getElementById('anio_escolar').value = añoEscolar;

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