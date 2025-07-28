<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de Horarios Escolares</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-straight/css/uicons-regular-straight.css'>
    <style>
        .schedule-grid {
            display: grid;
            grid-template-columns: 100px repeat(5, 1fr);
            gap: 5px;
            margin-top: 20px;
        }

        .schedule-header {
            background-color: #f8f9fa;
            padding: 10px;
            text-align: center;
            font-weight: bold;
            border: 1px solid #dee2e6;
        }

        .schedule-cell {
            min-height: 80px;
            border: 1px solid #dee2e6;
            padding: 5px;
            position: relative;
        }

        .time-slot {
            background-color: #e9ecef;
            padding: 10px;
            text-align: center;
            font-weight: bold;
        }

        .class-event {
            background-color: #d1e7dd;
            border-radius: 4px;
            padding: 3px;
            margin-bottom: 3px;
            font-size: 0.8rem;
            cursor: pointer;
        }

        .class-event:hover {
            opacity: 0.8;
        }

        .conflict {
            background-color: #f8d7da !important;
        }

        #limpiarHorario {
            padding: 10px 10px 10px 10px;
        }

        #editarHorario {
            padding: 10px 10px 10px 10px;
        }

        #guardarHorario {
            padding: 10px 10px 10px 10px;
        }

        .form-select:focus,
        .btn:focus {
            box-shadow: 0 0 0 0.25rem rgba(63, 81, 181, 0.25) !important;
            border-color: #3f51b5 !important;
        }

        .btn {
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1) !important;
        }

        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
        }
    </style>
</head>

<body>
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
                <div class="container-fluid py-4">
                    <h1 class="mb-4">Gestor de Horarios Escolares</h1>

                    <!-- Filtros y selección inicial - Versión estilizada -->
                    <div class="card mb-4 border-0 shadow-sm" style="background-color: #f8f9fa; border-radius: 10px;">
                        <div class="card-header py-3" style="background: linear-gradient(135deg, #3f51b5, #2196f3); border-radius: 10px 10px 0 0 !important;">
                            <h5 class="mb-0 text-white"><i class="fas fa-calendar-alt me-2"></i> Configuración del Horario</h5>
                        </div>
                        <div class="card-body py-4" style="background-color: #ffffff; border-radius: 0 0 10px 10px;">
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label for="anioEscolar" class="form-label fw-bold text-primary"><i class="fas fa-calendar me-2"></i>Año Escolar</label>
                                    <select class="form-select shadow-sm" id="anioEscolar" style="border-radius: 10px; border: 2px solid #e0e0e0; padding: 10px;">
                                        <option value="2024-2025">2024-2025</option>
                                        <option value="2025-2026" selected>2025-2026</option>
                                        <option value="2026-2027">2026-2027</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="nivelEducativo" class="form-label fw-bold text-primary"><i class="fas fa-graduation-cap me-2"></i>Nivel Educativo</label>
                                    <select class="form-select shadow-sm" id="nivelEducativo" style="border-radius: 10px; border: 2px solid #e0e0e0; padding: 10px;">
                                        <option value="Seleccionar">Seleccionar</option>
                                        <option value="Primaria">Primaria</option>
                                        <option value="Secundaria">Secundaria</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="grado" class="form-label fw-bold text-primary"><i class="fas fa-user-graduate me-2"></i>Grado</label>
                                    <select class="form-select shadow-sm" id="grado" style="border-radius: 10px; border: 2px solid #e0e0e0; padding: 10px;">
                                        <option value="">Seleccionar nivel primero</option>
                                    </select>
                                </div>
                                <div class="col-md-3 d-flex align-items-end">
                                    <button id="cargarHorario" class="btn btn-primary me-2 shadow" style="border-radius: 10px; background: linear-gradient(135deg, #3f51b5, #2196f3); border: none; padding: 10px;">
                                        <i class="fas fa-search me-2"></i>Cargar
                                    </button>
                                    <button id="nuevoHorario" class="btn btn-success shadow" style="border-radius: 10px; background: linear-gradient(135deg, #4caf50, #8bc34a); border: none; padding: 10px;">
                                        <i class="fas fa-plus-circle me-2"></i>Nuevo
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Horario visual - Versión estilizada -->
                    <div class="card border-0 shadow" style="border-radius: 15px; overflow: hidden;">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center" style="background: linear-gradient(135deg, #3f51b5, #2196f3);">
                            <h5 class="mb-0 text-white"><i class="fas fa-table me-2"></i> Horario Semanal</h5>
                            <div>
                                <button id="limpiarHorario" class="btn btn-danger me-2 shadow-sm" style="border-radius: 10px; border: none;">
                                    <i class="fas fa-trash-alt me-2"></i>Limpiar
                                </button>
                                <button id="editarHorario" class="btn btn-warning me-2 shadow-sm text-white" style="border-radius: 10px; background: linear-gradient(135deg, #ff9800, #ffc107); border: none;">
                                    <i class="fas fa-edit me-2"></i>Editar
                                </button>
                                <button id="guardarHorario" class="btn btn-success shadow-sm" style="border-radius: 10px; background: linear-gradient(135deg, #4caf50, #8bc34a); border: none;">
                                    <i class="fas fa-save me-2"></i>Guardar
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <!-- Aquí iría tu grid/calendario de horario -->
                            <div id="schedule-container" style="min-height: 500px; background-color: #f5f7fa;"></div>
                        </div>
                    </div>
                    <!-- Modal para agregar/editar clase -->
                    <div class="modal fade" id="claseModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalTitle">Agregar Clase</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="claseForm">
                                        <input type="hidden" id="editIndex">
                                        <input type="hidden" id="idgrado" name="idgrado">
                                        <div class="mb-3">
                                            <input type="hidden" name="nivelGradoModal" id="nivelGradoModal">
                                        </div>
                                        <input type="hidden" name="idHorario" id="idHorario">
                                        <div class="mb-3">
                                            <label for="materia" class="form-label">Materia</label>
                                            <select class="form-select" id="materia" required>
                                                <!-- Se llenará dinámicamente -->
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="profesor" class="form-label">Profesor</label>
                                            <select class="form-select" id="profesor" required>
                                                <!-- Se llenará dinámicamente -->
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="aula" class="form-label">Aula</label>
                                            <select class="form-select" id="aula" required>
                                                <!-- Se llenará dinámicamente -->
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="diaSemana" class="form-label">Día de la semana</label>
                                            <select class="form-select" id="diaSemana" readonly>
                                                <option value="1">Lunes</option>
                                                <option value="2">Martes</option>
                                                <option value="3">Miércoles</option>
                                                <option value="4">Jueves</option>
                                                <option value="5">Viernes</option>
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="horaInicio" class="form-label">Hora de inicio</label>
                                                <input type="time" class="form-control" id="horaInicio" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="horaFin" class="form-label">Hora de fin</label>
                                                <input type="time" class="form-control" id="horaFin" required>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-primary" id="guardarClase">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Aquí irá el código JavaScript para la lógica del horario
        function cargarGrados() {
            $.ajax({
                url: "../AJAX/AJAX_Horarios/cargarHorarios.php",
                type: "POST",
                data: {
                    action: 'cargar_grados',
                    nivelEducativo: $("#nivelEducativo").val()
                }, // Enviamos una acción específica
                success: function(resultado) {
                    $("#grado").html('<option value="Seleccionar" selected>Seleccionar</option>' + resultado);
                },
                error: function(xhr, status, error) {
                    console.error("Error en la solicitud AJAX:", error);
                    $("#grado").html('<option value="Error">Error al cargar grados</option>');
                }
            });
        }
        // Variables globales
        let horarioActual = [];
        let editandoClaseIndex = null;
        const diasSemana = {
            1: "Lunes",
            2: "Martes",
            3: "Miércoles",
            4: "Jueves",
            5: "Viernes"
        };

        // Configuración de horas (puedes ajustar según tu sistema)
        const horasDelDia = [
            "07:00 - 08:00",
            "08:00 - 09:00",
            "09:00 - 10:00",
            "10:00 - 11:00",
            "11:00 - 12:00",
            "12:00 - 13:00",
        ];

        // Funciones para cargar datos en los selects
        function cargarSelectMaterias() {
            const gradoSeleccionado = document.getElementById('grado').value;
            document.getElementById('idgrado').value = gradoSeleccionado;

            $.ajax({
                url: "../AJAX/AJAX_Horarios/cargarMaterias.php",
                type: "POST",
                data: {
                    action: 'cargar_materias',
                    idgrado: gradoSeleccionado // Envía directamente el valor, no del input
                },
                success: function(resultado) {
                    console.log('Respuesta del servidor:', resultado);
                    $("#materia").html('<option value="">Seleccionar</option>' + resultado);
                },
                error: function(xhr, status, error) {
                    console.error('Error en AJAX:', status, error);
                }
            });
        }

        function cargarSelectProfesores() {
            const gradoSeleccionado = document.getElementById('grado').value;
            document.getElementById('idgrado').value = gradoSeleccionado;

            $.ajax({
                url: "../AJAX/AJAX_Horarios/cargarProfesores.php",
                type: "POST",
                data: {
                    action: 'cargar_profesores',
                    idgrado: gradoSeleccionado, // Envía directamente el valor, no del input,
                    materia: $("#materia").val()
                },
                success: function(resultado) {
                    $("#profesor").html('<option value="">Seleccionar</option>' + resultado);
                }
            });
        }

        function cargarSelectAulas() {
            const gradoSeleccionado = document.getElementById('grado').value;
            document.getElementById('idgrado').value = gradoSeleccionado;

            $.ajax({
                url: "../AJAX/AJAX_Horarios/cargarAulas.php",
                type: "POST",
                data: {
                    action: 'cargar_aulas',
                    idgrado: gradoSeleccionado // Envía directamente el valor, no del input
                },
                success: function(resultado) {
                    $("#aula").html('<option value="">Seleccionar</option>' + resultado);
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function() {

            // Cargar grados cuando cambia el nivel educativo
            document.getElementById('materia').addEventListener('change', cargarSelectProfesores);
            document.getElementById('nivelEducativo').addEventListener('change', cargarGrados);

            // Botón para cargar horario existente
            document.getElementById('cargarHorario').addEventListener('click', cargarHorarioExistente);

            // Botón para nuevo horario
            document.getElementById('nuevoHorario').addEventListener('click', iniciarNuevoHorario);

            // Botón guardar horario
            document.getElementById('guardarHorario').addEventListener('click', guardarHorario);

            document.getElementById('nivelGradoModal').addEventListener('input', function() {

                cargarSelectProfesores();
            });

            // Configurar modal
            const claseModal = new bootstrap.Modal(document.getElementById('claseModal'));
            document.getElementById('guardarClase').addEventListener('click', function() {
                guardarClaseEnHorario();
                claseModal.hide();
            });
        });

        function generarHorarioVisual() {
            const container = document.getElementById('schedule-container');
            container.innerHTML = '';

            // Crear estructura de la tabla
            const grid = document.createElement('div');
            grid.className = 'schedule-grid';

            // Crear encabezados de columnas (días)
            grid.appendChild(createHeaderCell('Hora'));
            for (let i = 1; i <= 5; i++) {
                grid.appendChild(createHeaderCell(diasSemana[i]));
            }

            // Crear filas para cada hora
            horasDelDia.forEach((hora, index) => {
                // Celda de la hora
                grid.appendChild(createTimeCell(hora));

                // Celdas para cada día
                for (let dia = 1; dia <= 5; dia++) {
                    const cell = document.createElement('div');
                    cell.className = 'schedule-cell';
                    cell.dataset.horaIndex = index;
                    cell.dataset.diaSemana = dia;

                    // Buscar clases para esta celda
                    const clasesEnCelda = horarioActual.filter(clase =>
                        clase.dia_semana == dia &&
                        coincideConHora(index, clase.hora_inicio, clase.hora_fin)
                    );

                    clasesEnCelda.forEach((clase, i) => {
                        const claseElement = document.createElement('div');
                        claseElement.className = 'class-event';
                        claseElement.style.backgroundColor = getColorForMateria(clase.id_materia);
                        if (tieneConflictos(clase)) {
                            claseElement.classList.add('conflict');
                        }

                        claseElement.innerHTML = `
                            <strong>${clase.nombre_materia}</strong><br>
                            ${clase.nombre_profesor}<br>
                            ${clase.nombre_aula}
                            <div class="d-flex justify-content-between mt-1">
                                <button class="btn btn-sm btn-outline-danger py-0 px-1 delete-clase" data-index="${horarioActual.indexOf(clase)}">
                                    <i class="bi bi-trash"></i> Eliminar
                                </button>
                                <button class="btn btn-sm btn-outline-secondary py-0 px-1 edit-clase" data-index="${horarioActual.indexOf(clase)}">
                                    <i class="bi bi-pencil"></i> Editar
                                </button>
                            </div>
                        `;

                        cell.appendChild(claseElement);
                    });

                    // Hacer la celda clickable para agregar nuevas clases
                    cell.addEventListener('click', function(e) {
                        if (!e.target.classList.contains('edit-clase')) {
                            abrirModalParaNuevaClase(index, dia);
                        }
                    });

                    grid.appendChild(cell);
                }
            });

            container.appendChild(grid);

            document.querySelectorAll('.delete-clase').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const index = parseInt(this.dataset.index);
                    eliminarClase(index);
                });
            });

            // Agregar eventos a los botones de edición
            document.querySelectorAll('.edit-clase').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const index = parseInt(this.dataset.index);
                    editarClaseExistente(index);
                });
            });
        }

        function eliminarClase(index) {
            // Confirmar antes de eliminar
            Swal.fire({
                title: '¿Eliminar esta clase?',
                text: "Esta acción no se puede deshacer",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Eliminar la clase del array
                    horarioActual.splice(index, 1);

                    // Regenerar el horario visual
                    generarHorarioVisual();

                    // Mostrar notificación de éxito
                    Swal.fire(
                        'Eliminada!',
                        'La clase ha sido eliminada del horario.',
                        'success'
                    );
                }
            });
        }

        function createHeaderCell(text) {
            const cell = document.createElement('div');
            cell.className = 'schedule-header';
            cell.textContent = text;
            return cell;
        }

        function createTimeCell(time) {
            const cell = document.createElement('div');
            cell.className = 'time-slot';
            cell.textContent = time;
            return cell;
        }

        function coincideConHora(horaIndex, horaInicio, horaFin) {
            const horaInicioParts = horaInicio.split(':');
            const horaFinParts = horaFin.split(':');

            const horaInicioNum = parseInt(horaInicioParts[0]);
            const horaFinNum = parseInt(horaFinParts[0]);

            const horaGridInicio = 7 + horaIndex;
            const horaGridFin = horaGridInicio + 1;

            return horaInicioNum < horaGridFin && horaFinNum > horaGridInicio;
        }

        function getColorForMateria(idMateria) {
            // Generar color basado en el ID de la materia (puedes personalizar)
            const hue = (idMateria * 137.508) % 360; // Distribución uniforme
            return `hsl(${hue}, 70%, 80%)`;
        }

        function tieneConflictos(clase) {
            // Verificar conflictos de profesor
            const conflictosProfesor = horarioActual.filter(c =>
                c.id_profesor === clase.id_profesor &&
                c.dia_semana === clase.dia_semana &&
                c !== clase &&
                ((c.hora_inicio < clase.hora_fin && c.hora_fin > clase.hora_inicio)));

            // Verificar conflictos de aula
            const conflictosAula = horarioActual.filter(c =>
                c.id_aula === clase.id_aula &&
                c.dia_semana === clase.dia_semana &&
                c !== clase &&
                ((c.hora_inicio < clase.hora_fin && c.hora_fin > clase.hora_inicio))
            );

            return conflictosProfesor.length > 0 || conflictosAula.length > 0;
        }

        // Funciones para manejar el horario
        function cargarHorarioExistente() {
            const anioEscolar = document.getElementById('anioEscolar').value;
            const nivelEducativo = document.getElementById('nivelEducativo').value;
            const grado = document.getElementById('grado').value;
            const btnGuardar = document.getElementById('guardarHorario');

            // Validaciones mejoradas
            if (grado === "Seleccionar") {
                Swal.fire({
                    icon: 'warning',
                    title: 'Selección requerida',
                    text: 'Por favor seleccione un grado válido'
                });
                return;
            }

            // Mostrar carga mientras se procesa
            Swal.fire({
                title: 'Cargando horario',
                html: 'Por favor espere...',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            $.ajax({
                url: "../AJAX/AJAX_Horarios/consultarHorario.php",
                type: "POST",
                dataType: 'json', // Esperamos JSON directamente
                data: {
                    action: 'consultar_horario',
                    anio_escolar: anioEscolar,
                    nivel_educativo: nivelEducativo,
                    id_grado: grado
                },
                success: function(respuesta) {
                    Swal.close();

                    if (respuesta.estado === 'exito') {
                        horarioActual = respuesta.datos;
                        generarHorarioVisual();
                        mostrarResumenHorario();

                        Swal.fire({
                            icon: 'success',
                            title: 'Horario cargado',
                            text: `Se cargaron ${horarioActual.length} clases`,
                            timer: 2000,
                            showConfirmButton: false
                        });
                        btnGuardar.disabled = true; // Deshabilitar botón mientras se carga

                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: respuesta.mensaje || 'Error al cargar el horario'
                        });
                    }
                },
                error: function(xhr, status, error) {
                    Swal.close();
                    console.error("Error en AJAX:", status, error);

                    Swal.fire({
                        icon: 'error',
                        title: 'Error de conexión',
                        text: 'No se pudo cargar el horario. Intente nuevamente.'
                    });
                }
            });
        }

        function iniciarNuevoHorario() {
            const grado = document.getElementById('grado').value;

            if (grado === "Seleccionar" || grado === "") {
                alert("Por favor seleccione un grado");
                return;
            }
            $.ajax({
                url: "../AJAX/AJAX_Horarios/validarHorarioxGrado.php",
                type: "POST",
                data: {
                    action: 'validar_horario',
                    grado: grado
                },
                success: function(resultado) {
                    // resultado ya es el texto directo porque especificamos text/plain
                    if (resultado.trim() === "") {
                        // Confirmar antes de borrar cualquier horario existente
                        if (confirm("¿Está seguro que desea crear un nuevo horario? Se perderán los cambios no guardados.")) {
                            horarioActual = [];
                            generarHorarioVisual();
                            mostrarResumenHorario();
                        }
                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: '¡Atención!',
                            text: resultado
                        });
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Ocurrió un error al validar el horario: ' + error
                    });
                }
            });
        }

        function abrirModalParaNuevaClase(horaIndex, diaSemana) {
            editandoClaseIndex = null;

            // Calcular horas basadas en el índice
            const horaInicio = 7 + horaIndex;
            const horaFin = horaInicio + 1;

            const gradoSeleccionado = document.getElementById('grado').value;
            document.getElementById('idgrado').value = gradoSeleccionado;

            const nivelGrado = document.getElementById('nivelEducativo').value;
            document.getElementById('nivelGradoModal').value = nivelGrado;
            cargarSelectMaterias();
            cargarSelectAulas();

            const miSelect = document.getElementById('diaSemana');
            let seleccionAnterior = miSelect.value; // Guarda la selección inicial

            miSelect.addEventListener('change', function() {
                // Si se ha cambiado la selección
                if (this.value !== seleccionAnterior) {
                    // Restaura la selección anterior
                    this.value = seleccionAnterior;
                    // Opcional: muestra un mensaje al usuario
                    alert('No se permite cambiar la selección.');
                } else {
                    // Actualiza la selección anterior si el cambio es válido
                    seleccionAnterior = this.value;
                }
            });

            // Formatear horas para el input time (HH:MM)
            document.getElementById('horaInicio').value = `${horaInicio.toString().padStart(2, '0')}:00`;
            document.getElementById('horaFin').value = `${horaFin.toString().padStart(2, '0')}:00`;
            document.getElementById('diaSemana').value = diaSemana;

            // Resetear otros campos
            document.getElementById('materia').value = '';
            document.getElementById('profesor').value = '';
            document.getElementById('aula').value = '';

            document.getElementById('modalTitle').textContent = 'Agregar Nueva Clase';
            const claseModal = new bootstrap.Modal(document.getElementById('claseModal'));
            claseModal.show();
        }

        function editarClaseExistente(index) {
            editandoClaseIndex = index;
            const clase = horarioActual[index];

            // Guardar también el ID del horario
            document.getElementById('idHorario').value = clase.id_horario || '';
            document.getElementById('materia').value = clase.id_materia;
            document.getElementById('profesor').value = clase.id_profesor;
            document.getElementById('aula').value = clase.id_aula;
            document.getElementById('diaSemana').value = clase.dia_semana;
            document.getElementById('horaInicio').value = clase.hora_inicio;
            document.getElementById('horaFin').value = clase.hora_fin;
            document.getElementById('idgrado').value = clase.id_grado;
            let nivel = document.getElementById('nivelGradoModal');
            if (clase.id_grado > 0 && clase.id_grado < 7) {
                nivel.value = "Primaria";
            } else if (clase.id_grado >= 7 && clase.id_grado < 11) {
                nivel.value = "Secundaria";
            } else {
                nivel.value = "Error de Grado";
            }

            cargarSelectMaterias();
            cargarSelectProfesores();
            cargarSelectAulas();

            document.getElementById('modalTitle').textContent = 'Editar Clase';
            const claseModal = new bootstrap.Modal(document.getElementById('claseModal'));
            claseModal.show();
        }

        function guardarClaseEnHorario() {
            const materia = document.getElementById('materia').value;
            const profesor = document.getElementById('profesor').value;
            const aula = document.getElementById('aula').value;
            const diaSemana = document.getElementById('diaSemana').value;
            const horaInicio = document.getElementById('horaInicio').value;
            const horaFin = document.getElementById('horaFin').value;

            // Validaciones básicas
            if (!materia || !profesor || !aula || !diaSemana || !horaInicio || !horaFin) {
                alert("Por favor complete todos los campos");
                return;
            }

            if (horaInicio >= horaFin) {
                alert("La hora de inicio debe ser anterior a la hora de fin");
                return;
            }

            // Obtener nombres para mostrar en el horario
            const nombreMateria = document.getElementById('materia').options[document.getElementById('materia').selectedIndex].text;
            const nombreProfesor = document.getElementById('profesor').options[document.getElementById('profesor').selectedIndex].text;
            const nombreAula = document.getElementById('aula').options[document.getElementById('aula').selectedIndex].text;

            const idHorario = document.getElementById('idHorario').value;
            const nuevaClase = {
                id_horario: idHorario || null,
                id_materia: materia,
                nombre_materia: nombreMateria,
                id_profesor: profesor,
                nombre_profesor: nombreProfesor,
                id_aula: aula,
                nombre_aula: nombreAula,
                dia_semana: diaSemana,
                hora_inicio: horaInicio,
                hora_fin: horaFin,
                id_grado: document.getElementById('idgrado').value,
                anio_escolar: document.getElementById('anioEscolar').value
            };


            if (editandoClaseIndex !== null) {
                // Editar clase existente
                horarioActual[editandoClaseIndex] = nuevaClase;
            } else {
                // Agregar nueva clase
                horarioActual.push(nuevaClase);
            }

            generarHorarioVisual();
            mostrarResumenHorario();
        }

        document.getElementById('editarHorario').addEventListener('click', function() {
            if (!horarioActual.length) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Horario vacío',
                    text: 'No hay clases que editar.'
                });
                return;
            }

            Swal.fire({
                title: '¿Guardar cambios?',
                text: "Esto actualizará el horario en la base de datos.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Sí, guardar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    guardarHorarioEditado();
                }
            });
        });

        document.getElementById('limpiarHorario').addEventListener('click', function() {
            window.location.reload();
        });

        function guardarHorarioEditado() {
            $.ajax({
                url: "../AJAX/AJAX_Horarios/editarHorario.php",
                type: "POST",
                data: {
                    action: 'guardar_edicion',
                    horario: JSON.stringify(horarioActual)
                },
                success: function(respuesta) {
                    try {
                        const res = JSON.parse(respuesta);
                        if (res.estado === 'exito') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Horario actualizado',
                                text: res.mensaje || 'El horario fue actualizado correctamente.'
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: res.mensaje || 'Hubo un error al actualizar el horario.'
                            });
                        }
                    } catch (e) {
                        console.error("Error al parsear la respuesta:", respuesta);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error inesperado',
                            text: 'No se pudo interpretar la respuesta del servidor.'
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error:", status, error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error de conexión',
                        text: 'No se pudo guardar el horario.'
                    });
                }
            });
        }



        function mostrarResumenHorario() {
            // Puedes implementar un resumen de horas por materia, conflictos, etc.
            console.log("Horario actualizado:", horarioActual);

            const conflictos = encontrarConflictos();
            if (conflictos.length > 0) {
                alert(`Advertencia: Hay ${conflictos.length} conflictos en el horario. Se muestran en rojo.`);
            }
        }

        function encontrarConflictos() {
            const conflictos = [];

            horarioActual.forEach((clase, index) => {
                if (tieneConflictos(clase)) {
                    conflictos.push({
                        clase,
                        index,
                        tipo: "Conflicto de horario"
                    });
                }
            });

            return conflictos;
        }

        function guardarHorario() {
            const anioEscolar = document.getElementById('anioEscolar').value;
            const nivelEducativo = document.getElementById('nivelEducativo').value;
            const grado = document.getElementById('grado').value;

            if (grado === "Seleccionar") {
                alert("Por favor seleccione un grado");
                return;
            }

            // Validar conflictos antes de guardar
            const conflictos = encontrarConflictos();
            if (conflictos.length > 0) {
                if (!confirm(`Hay ${conflictos.length} conflictos en el horario. ¿Desea guardar de todos modos?`)) {
                    return;
                }
            }

            // Preparar datos para enviar
            const datosHorario = {
                anio_escolar: anioEscolar,
                nivel_educativo: nivelEducativo,
                id_grado: grado,
                clases: horarioActual
            };

            // Mostrar carga mientras se guarda
            if (datosHorario.clases.length === 0) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Horario vacío',
                    text: 'No hay clases para guardar.'
                });
                return;
            } else {
                $.ajax({
                    url: "../AJAX/AJAX_Horarios/guardarHorario.php",
                    type: "POST",
                    data: {
                        action: 'guardar_horario',
                        datos: JSON.stringify(datosHorario)
                    },
                    success: function(respuesta) {
                        console.log('Respuesta cruda:', respuesta); // Ver esto en la consola
                        try {
                            const resultado = typeof respuesta === 'string' ? JSON.parse(respuesta) : respuesta;
                            if (resultado.estado === "exito") {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Horario guardado',
                                    text: resultado.mensaje
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: resultado.mensaje
                                });
                            }
                        } catch (e) {
                            console.error("Error completo:", e, "Respuesta recibida:", respuesta);
                            Swal.fire({
                                icon: 'error',
                                title: 'Error en el formato',
                                text: 'La respuesta del servidor no es válida: ' + typeof respuesta
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error en la conexión',
                            text: 'No se pudo conectar con el servidor'
                        });
                        console.error("Error en AJAX:", status, error);
                    }
                });
            }

        }
    </script>
</body>

</html>