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
    <link rel="stylesheet" href="../css/tablaActividades.css">
    <title>Consultar Actividades</title>
    <style>
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
        ?>
        <!-- CUERPO DEL HTML ESPACIO PARA TRABAJAR YA INCLUIDA LA BARRA  -->
        <div class="main p-3">
            <div class="text-center">
                <?php
                include("../Layout/mensajes.php");
                include("../Configuration/Configuration.php");
                include("../Configuration/functions_php/functionsCRUDInscripciones.php")
                /* CUERPO DEL MENÚ */
                ?>
                <h1 class="my-3" id="titulo">Módulo de Actividades</h1>
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
                            <select id="filtroGrado" class="form-select filter-select" onchange="cargarSelectMaterias();">
                                <option value="">Todos los grados</option>
                                <option value="1">1er grado</option>
                                <option value="2">2do grado</option>
                                <option value="3">3er grado</option>
                                <option value="4">4to grado</option>
                                <option value="5">5to grado</option>
                                <option value="6">6to grado</option>
                            </select>
                        </div>

                        <div class="filter-group">
                            <label for="filtroAsignatura" class="filter-label">
                                <i class="bi bi-book-half"></i> Asignatura
                            </label>
                            <select id="filtroAsignatura" class="form-select filter-select" onchange="cargarSelectProfesores()">

                            </select>
                        </div>

                        <div class="filter-group">
                            <label for="filtroProfesor" class="filter-label">
                                <i class="bi bi-book-half"></i> Profesor
                            </label>
                            <select id="filtroProfesor" class="form-select filter-select">

                            </select>
                        </div>

                        <div class="filter-group">
                            <label for="filtroEstado" class="filter-label">
                                <i class="bi bi-check-circle"></i> Estado
                            </label>
                            <select id="filtroEstado" class="form-select filter-select">
                                <option value="">Estado</option>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="custom-table">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col" style="display: none;">Grado</th>
                                <th scope="col" style="display: none;">Nombre de la asignatura</th>
                                <th scope="col">Nombre del Profesor</th>
                                <th scope="col">Actividad</th>
                                <th scope="col" style="display: none;">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include("../Configuration/Configuration.php");
                            include("../Configuration/functions_php/functioncsCRUDActividades.php");
                            include("../Layout/modalesActividades/modalAEdit.php");
                            include("../Layout/modalesActividades/modalADisable.php");
                            include("../Layout/modalesActividades/modalAEnable.php");

                            $actividades = consultarActividadesCRUD($pdo);

                            if (!empty($actividades)) {
                                foreach ($actividades as $actividad) {
                            ?>
                                    <tr>
                                        <td style="display: none;"><?= htmlspecialchars($actividad['nombre_grado']) ?></td>
                                        <td style="display: none;"><?= htmlspecialchars($actividad['nombre_materia']) ?></td>
                                        <td><?= htmlspecialchars($actividad['nombre_profesor']) ?></td>
                                        <td><?= htmlspecialchars($actividad['contenido']) ?></td>
                                        <td style="display: none;"><?= htmlspecialchars($actividad['estado']) ?></td>

                                        <td>
                                            <a href="#ModalFormAEdit" class="btn btn-dark" data-bs-toggle="modal"
                                                data-bs-target="#ModalFormAEdit"
                                                data-id="<?= htmlspecialchars($actividad['id_actividad'])  ?>"
                                                data-nombreG="<?= htmlspecialchars($actividad['nombre_grado']) ?>"
                                                data-nombreM="<?= htmlspecialchars($actividad['nombre_materia']) ?>"
                                                data-nombreP="<?= htmlspecialchars($actividad['nombre_profesor']) ?>"
                                                data-contenido="<?= htmlspecialchars($actividad['contenido']) ?>">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                data-bs-target="#ModalFormEnableA"
                                                data-id="<?= htmlspecialchars($actividad['id_actividad'])  ?>"
                                                data-nombreG="<?= htmlspecialchars($actividad['nombre_grado']) ?>"
                                                data-nombreM="<?= htmlspecialchars($actividad['nombre_materia']) ?>"
                                                data-nombreP="<?= htmlspecialchars($actividad['nombre_profesor']) ?>"
                                                data-contenido="<?= htmlspecialchars($actividad['contenido']) ?>">
                                                <i class='bx bx-check-circle'></i>
                                            </button>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#ModalFormDisableA"
                                                data-id="<?= htmlspecialchars($actividad['id_actividad'])  ?>"
                                                data-nombreG="<?= htmlspecialchars($actividad['nombre_grado']) ?>"
                                                data-nombreM="<?= htmlspecialchars($actividad['nombre_materia']) ?>"
                                                data-nombreP="<?= htmlspecialchars($actividad['nombre_profesor']) ?>"
                                                data-contenido="<?= htmlspecialchars($actividad['contenido']) ?>">
                                                <i class="bi bi-x-circle"></i>
                                            </button>
                                            <button type="button" class="btn btn-secondary"
                                                data-id="<?= $actividad['id_actividad'] ?>" onclick="myFunction(this)">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo "<tr><td colspan='5'>No se encontraron actividades.</td></tr>";
                            } ?>
                        </tbody>
                    </table>
                </div>
                </main>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
            </div>
        </div>
    </div>
</body>
</div>

</html>
<script>
    document.getElementById('filtroEstado').addEventListener('change', function() {
        const estadoSeleccionado = this.value.toLowerCase();
        const filas = document.querySelectorAll('table tbody tr');

        filas.forEach(fila => {
            const estado = fila.querySelector('td:nth-child(5)').textContent.toLowerCase();

            if (estadoSeleccionado === '' || estado === estadoSeleccionado) {
                fila.style.display = '';
            } else {
                fila.style.display = 'none';
            }
        });
    });

    document.getElementById('filtroAsignatura').addEventListener('change', function() {
        const asignaturaSeleccionada = this.value.toLowerCase();
        const filas = document.querySelectorAll('table tbody tr');

        filas.forEach(fila => {
            const asignatura = fila.querySelector('td:nth-child(2)').textContent.toLowerCase();

            if (asignaturaSeleccionada === '' || asignatura === asignaturaSeleccionada) {
                fila.style.display = '';
            } else {
                fila.style.display = 'none';
            }
        });
    });

     document.getElementById('filtroProfesor').addEventListener('change', function() {
        const profesorSeleccionado = this.value.toLowerCase();
        const filas = document.querySelectorAll('table tbody tr');

        filas.forEach(fila => {
            const profesor = fila.querySelector('td:nth-child(0)').textContent.toLowerCase();

            if (profesorSeleccionado === '' || profesor === profesorSeleccionado) {
                fila.style.display = '';
            } else {
                fila.style.display = 'none';
            }
        });
    });

    function cargarSelectMaterias() {
        const gradoSeleccionado = document.getElementById('filtroGrado').value;
 
        $.ajax({
            url: "../AJAX/AJAX_Actividades/cargarMateriaxGrado.php",
            type: "POST",
            data: {
                action: 'cargar_materias',
                idgrado: gradoSeleccionado // Envía directamente el valor, no del input
            },
            success: function(resultado) {
                console.log('Respuesta del servidor:', resultado);
                $("#filtroAsignatura").html('<option value="">Seleccionar</option>' + resultado);
            },
            error: function(xhr, status, error) {
                console.error('Error en AJAX:', status, error);
            }
        });
    }

     function cargarSelectProfesores() {
            const gradoSeleccionado = document.getElementById('filtroGrado').value;

            $.ajax({
                url: "../AJAX/AJAX_Actividades/cargarProfxGrado.php",
                type: "POST",
                data: {
                    action: 'cargar_profesores',
                    idgrado: gradoSeleccionado, // Envía directamente el valor, no del input,
                    materia: $("#filtroAsignatura").val()
                },
                success: function(resultado) {
                      console.log('Respuesta del servidor:', resultado);
                    $("#filtroProfesor").html('<option value="">Seleccionar</option>' + resultado);
                }
            });
        }

    document.getElementById('filtroGrado').addEventListener('change', function() {
        const gradoSeleccionado = this.value;
        const filas = document.querySelectorAll('table tbody tr');

        filas.forEach(fila => {
            const textoGrado = fila.querySelector('td:nth-child(1)').textContent.trim();

            // Mostrar todas si no hay selección o si coincide
            if (gradoSeleccionado === '' ||
                textoGrado.includes(gradoSeleccionado) ||
                (gradoSeleccionado === '1' && textoGrado.includes('1er')) ||
                (gradoSeleccionado === '2' && textoGrado.includes('2do')) ||
                (gradoSeleccionado === '3' && textoGrado.includes('3er')) ||
                (gradoSeleccionado === '4' && textoGrado.includes('4to')) ||
                (gradoSeleccionado === '5' && textoGrado.includes('5to')) ||
                (gradoSeleccionado === '6' && textoGrado.includes('6to'))) {
                fila.style.display = '';
            } else {
                fila.style.display = 'none';
            }
        });
    });
</script>