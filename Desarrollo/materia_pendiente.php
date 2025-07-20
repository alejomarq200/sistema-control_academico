<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Asignatura: Pendiente</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="../css/moduloCalificacion_s.css" rel="stylesheet" />
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-straight/css/uicons-regular-straight.css'>
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

        .is-invalid {
            border-color: #dc3545;
        }

        .is-invalid:focus {
            box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.25);
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
                                                    <th>Fecha Actualización</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if ($materia && $idGrado && $anioEscolar) {
                                                    $sql = "SELECT  mp.*, 
                                                    e.id,
                                                    e.cedula_est, 
                                                    e.nombres_est, 
                                                    e.apellidos_est,
                                                    m.id_materia,
                                                    m.nombre AS nombre_materia,
                                                    g.id AS idG,
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
                                                                <td><?= htmlspecialchars($row['fecha_actualizacion']) ?></td>
                                                                <td>
                                                                    <button type="button" class="btn btn-success"
                                                                        data-idProfesor="<?= htmlspecialchars($row['id_profesor']) ?>"
                                                                        data-cEstudiante="<?= htmlspecialchars($row['cedula_est']) ?>"
                                                                        data-idEstudiante="<?= htmlspecialchars($row['id']) ?>"
                                                                        data-nEstudiante="<?= htmlspecialchars($row['nombres_est']) ?>"
                                                                        data-nMateria="<?= htmlspecialchars($row['nombre_materia']) ?>"
                                                                        data-idMateria="<?= htmlspecialchars($row['id_materia']) ?>"
                                                                        data-nGrado="<?= htmlspecialchars($row['nombre_grado']) ?>"
                                                                        data-idGrado="<?= htmlspecialchars($row['idG']) ?>">
                                                                        <img src="up.png" style="color:rebeccapurple;">
                                                                    </button>
                                                                    <button type="button" class="btn btn-danger"
                                                                        data-idEstudiante="<?= htmlspecialchars($row['id']) ?>"
                                                                        data-promedio="<?= htmlspecialchars($row['promedio_final']) ?>"
                                                                        data-estado="<?= htmlspecialchars($row['estado']) ?>">
                                                                        <img src="../imgs/change_status.png">
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
<!-- Modal -->
<div class="modal fade" id="calificacionesModal" tabindex="-1" aria-labelledby="calificacionesModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="calificacionesModalLabel">Registrar Calificaciones</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Estudiante:</label>
                    <input type="hidden" class="form-control" id="idProfesor" readonly>
                    <input type="text" class="form-control" id="modalEstudiante" readonly>
                    <input type="hidden" class="form-control" id="idEstudiante" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Materia:</label>
                    <input type="text" class="form-control" id="modalMateria" readonly>
                    <input type="hidden" class="form-control" id="idMateria" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Grado:</label>
                    <input type="text" class="form-control" id="modalGrado" readonly>
                    <input type="hidden" class="form-control" id="idGrado" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Cantidad de calificaciones:</label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="cantidadCalificaciones" min="1" max="10" required>
                        <button class="btn btn-primary" id="generarInputs">Generar</button>
                    </div>
                </div>
                <div id="inputsContainer"></div>

                <div class="mb-3">
                    <label class="form-label">Promedio:</label>
                    <input type="number" class="form-control" name="promedio" id="promedio" readonly step="0.01">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success" id="guardarCalificaciones">Guardar</button>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Función para mostrar errores de validación
        function showError(input, message) {
            input.classList.add('is-invalid');
            const feedback = input.nextElementSibling;
            if (feedback && feedback.classList.contains('invalid-feedback')) {
                feedback.textContent = message;
                feedback.style.display = 'block';
            }
        }

        // Función para limpiar errores de validación
        function clearError(input) {
            input.classList.remove('is-invalid');
            const feedback = input.nextElementSibling;
            if (feedback && feedback.classList.contains('invalid-feedback')) {
                feedback.style.display = 'none';
            }
        }

        // Función para validar un campo numérico con rango
        function validateNumberInput(input, min, max) {
            const value = parseFloat(input.value);
            if (isNaN(value) || input.value.trim() === '') {
                showError(input, 'Este campo es requerido');
                return false;
            }
            if (value < min || value > max) {
                showError(input, `El valor debe estar entre ${min} y ${max}`);
                return false;
            }
            clearError(input);
            return true;
        }

        // Activar modal y cargar datos
        document.querySelectorAll('.btn-danger').forEach(button => {
            button.addEventListener('click', function() {
                const promedio = this.getAttribute('data-promedio');
                const idEstudiante = this.getAttribute('data-idEstudiante');
                const estado = this.getAttribute('data-estado');


                if (promedio >= 10 && estado == 'pendiente') {
                    Swal.fire({
                        title: "¡Atención!",
                        text: "Calificaciones mayores o iguales a 10 no se pueden cambiar el estado a 'repetido'",
                        icon: "warning"
                    });
                } else if (promedio <= 10 && estado == 'repetida' || promedio >= 10 && estado == 'repetida') {
                    Swal.fire({
                        title: "¡Atención!",
                        text: "Las calificaciones con estado 'repetido' no se pueden cambiar de estado",
                        icon: "warning"
                    });
                } else if (promedio <= 10 && estado == 'recuperada' || promedio >= 10 && estado == 'recuperada') {
                Swal.fire({
                        title: "¡Atención!",
                        text: "Las calificaciones con estado 'recuperada' no se pueden cambiar de estado",
                        icon: "warning"
                    });
                } else {
                    Swal.fire({
                        title: "¿Esta seguro de realizar ésta acción?",
                        text: "Esta acción es irreversible. Se cambiará el estado de la materia a 'Repetida'",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#122e49ff",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Cambiar",
                        cancelButtonText: "Cancelar"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            var url = "../AJAX/AJAX_Materias/cambiarEstadoMP.php";
                            // Obtiene el data-id del botón que se hizo clic
                            $.ajax({
                                type: "POST",
                                url: url,
                                data: {
                                    idEstudiante: idEstudiante
                                },
                                success: function(data) {
                                    location.href = "materia_pendiente.php";
                                },
                                error: function(xhr, status, error) {
                                    console.error("Error:", error);
                                }
                            });
                        }
                    });
                }
            });
        });

        // Activar modal y cargar datos
        document.querySelectorAll('.btn-success[data-cEstudiante]').forEach(button => {
            button.addEventListener('click', function() {
                const cedula = this.getAttribute('data-cEstudiante');
                const nombre = this.getAttribute('data-nEstudiante');
                const materia = this.getAttribute('data-nMateria');
                const grado = this.getAttribute('data-nGrado');

                const idEstudiante = this.getAttribute('data-idEstudiante');
                const idMateria = this.getAttribute('data-idMateria');
                const idGrado = this.getAttribute('data-idGrado');
                const idProfesor = this.getAttribute('data-idProfesor');

                // Llenar datos en el modal
                document.getElementById('modalEstudiante').value = nombre;
                document.getElementById('modalMateria').value = materia;
                document.getElementById('modalGrado').value = grado;

                //
                document.getElementById('idEstudiante').value = idEstudiante;
                document.getElementById('idMateria').value = idMateria;
                document.getElementById('idGrado').value = idGrado;
                document.getElementById('idProfesor').value = idProfesor;
                // Limpiar inputs anteriores
                document.getElementById('inputsContainer').innerHTML = '';
                document.getElementById('promedio').value = '';
                // Mostrar modal
                const modal = new bootstrap.Modal(document.getElementById('calificacionesModal'));
                modal.show();
            });
        });

        // Generar inputs dinámicos con mejor validación
        document.getElementById('generarInputs').addEventListener('click', function() {
            const cantidadInput = document.getElementById('cantidadCalificaciones');
            if (!validateNumberInput(cantidadInput, 1, 5)) return;

            const cantidad = parseInt(cantidadInput.value);
            const container = document.getElementById('inputsContainer');
            container.innerHTML = '';

            for (let i = 1; i <= cantidad; i++) {
                const group = document.createElement('div');
                group.className = 'form-group';

                group.innerHTML = `
                <label class="form-label">Calificación ${i}:</label>
                <input type="number" class="form-control calificacion-input" 
                       min="0" max="20" step="0.01" required>
                <div class="invalid-feedback">La calificación debe estar entre 0 y 20</div>
            `;

                const input = group.querySelector('.calificacion-input');
                input.addEventListener('input', function() {
                    validateNumberInput(this, 0, 20);
                    calcularPromedio();
                });

                container.appendChild(group);
            }
        });

        // Función para calcular el promedio (mejorada)
        function calcularPromedio() {
            const inputs = document.querySelectorAll('.calificacion-input');
            let total = 0;
            let cantidadValidas = 0;
            let allValid = true;

            inputs.forEach(input => {
                const isValid = validateNumberInput(input, 0, 20);
                if (!isValid) allValid = false;

                const valor = parseFloat(input.value);
                if (!isNaN(valor) && valor >= 0 && valor <= 20) {
                    total += valor;
                    cantidadValidas++;
                }
            });

            if (cantidadValidas > 0 && allValid) {
                const promedio = total / cantidadValidas;
                document.getElementById('promedio').value = promedio.toFixed(2);
            } else {
                document.getElementById('promedio').value = '';
            }
        }

        // Validación mejorada al guardar
        document.getElementById('guardarCalificaciones').addEventListener('click', function() {
            // Validar cantidad de calificaciones
            const cantidadInput = document.getElementById('cantidadCalificaciones');
            if (!validateNumberInput(cantidadInput, 1, 5)) {
                alert('Por favor corrija la cantidad de calificaciones');
                return;
            }

            // Validar todas las calificaciones
            const inputs = document.querySelectorAll('.calificacion-input');
            let allValid = true;

            inputs.forEach(input => {
                if (!validateNumberInput(input, 0, 20)) {
                    allValid = false;
                }
            });

            if (!allValid) {
                alert('Por favor corrija las calificaciones marcadas en rojo');
                return;
            }

            // Verificar que hay al menos una calificación válida
            if (inputs.length === 0) {
                alert('Debe generar al menos una calificación');
                return;
            }

            // Validar que el promedio sea un número válido
            const promedio = parseFloat(document.getElementById('promedio').value);
            if (isNaN(promedio)) {
                alert('Error al calcular el promedio. Verifique las calificaciones.');
                return;
            }

            // Obtener los datos necesarios
            const idEstudiante = document.getElementById('idEstudiante').value;
            const idMateria = document.getElementById('idMateria').value;
            const idGrado = document.getElementById('idGrado').value;
            const idProfesor = document.getElementById('idProfesor').value;

            // Recolectar calificaciones (versión mejorada)
            const calificaciones = [];
            document.querySelectorAll('.form-group').forEach((group, index) => {
                const input = group.querySelector('.calificacion-input');
                if (input) {
                    calificaciones.push({
                        id: index + 1, // O usa un sistema de IDs más robusto si es necesario
                        calificacion: parseFloat(input.value)
                    });
                }
            });

            // Mostrar confirmación antes de enviar
            if (!confirm('¿Está seguro que desea guardar estas calificaciones?')) {
                return;
            }

            // Enviar datos al servidor (código existente mejorado)
            fetch('../AJAX/AJAX_Calificaciones/act_materiaPendiente.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        idEstudiante: idEstudiante,
                        idMateria: idMateria,
                        idGrado: idGrado,
                        idProfesor: idProfesor,
                        promedio: promedio,
                        calificaciones: calificaciones
                    })
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`Error HTTP: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            title: "Éxito!",
                            text: data.message,
                            icon: "success"
                        });
                        const modal = bootstrap.Modal.getInstance(document.getElementById('calificacionesModal'));
                        modal.hide();
                        location.reload();
                    } else {
                        throw new Error(data.message || 'Error desconocido del servidor');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        title: "Error!",
                        text: error.message,
                        icon: "error"
                    });
                });
        });
    });
</script>
<script>
    const añoActual = new Date().getFullYear();
    $('#anio_escolar').val(`${añoActual}-${añoActual + 1}`);

    function buscarGradodeMaterias() {
        const categoriaGrado = document.getElementById('categoriaGrado').value.trim();
        $.ajax({
            url: "../AJAX/AJAX_Grados/searchGradoxMateria.php",
            type: "POST",
            data: $("#infoEstudiante").serialize(),
            success: function(resultado) {
                $("#nombreGrado").html(resultado);
            },
            error: function(xhr, status, error) {
                console.error("Error en la solicitud AJAX:", error);
            }
        });
    }

    function cargarSelectMateriasxProfesor() {
        $.ajax({
            type: "POST",
            url: "../AJAX/AJAX_Calificaciones/consultarPrCalificacion.php",
            data: $("#infoEstudiante").serialize(),
            success: function(resultado) {
                $("#docente").html(resultado);
                cargarProfesorxGrado();
            },
            error: function(xhr, status, error) {
                console.error("Error en la solicitud AJAX:", error);
            }
        });
    }

    function cargarProfesorxGrado() {
        $.ajax({
            type: "POST",
            url: "../AJAX/AJAX_Calificaciones/consultarPrDocente.php",
            data: $("#infoEstudiante").serialize(),
            success: function(resultado) {
                $("#materias").html(resultado);
            },
            error: function(xhr, status, error) {
                console.error("Error en la solicitud AJAX:", error);
            }
        });
    }
</script>

</html>