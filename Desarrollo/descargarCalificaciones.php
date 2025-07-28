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
    <!-- Scripts necesarios -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Reportes de Calificaciones</title>
</head>

<body>
    <!-- DIV PARA TRABAJAR CON EL MENÚ Y EL FORMULARIO RESPECTIVO -->
    <div class="wrapper">
        <?php
        error_reporting(0);
        session_start();
        include("../Desarrollo/menu.php");
        ?>
        <!-- CUERPO DEL HTML ESPACIO PARA TRABAJAR YA INCLUIDA LA BARRA -->
        <div class="main p-3">
            <div class="text-center">
                <main>
                    <?php include("../Layout/mensajes.php"); ?>
                    <h1 class="my-3" id="titulo">Reporte de Calificaciones</h1>
                    <!-- Contenedores para los botones de Primaria y Secundaria -->
                    <div class="row mb-4">
                        <!-- Contenedor Primaria -->
                        <div class="col-md-6 mb-3 mb-md-0">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                    <i class="bi bi-mortarboard-fill text-primary mb-3" style="font-size: 3rem;"></i>
                                    <h3 class="card-title">Primaria</h3>
                                    <p class="card-text text-muted">Gestionar calificaciones de educación primaria</p>
                                    <button class="btn btn-primary btn-lg mt-2 w-75" data-bs-toggle="modal" data-bs-target="#modalDescargarEstudiantes"> <i class="bi bi-journal-check"></i> Acceder</button>
                                </div>
                            </div>
                        </div>

                        <!-- Contenedor Secundaria -->
                        <div class="col-md-6">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                    <i class="bi bi-backpack2-fill text-success mb-3" style="font-size: 3rem;"></i>
                                    <h3 class="card-title">Secundaria</h3>
                                    <p class="card-text text-muted">Gestionar calificaciones de educación secundaria</p>
                                    <button class="btn btn-success btn-lg mt-2 w-75" data-bs-toggle="modal" data-bs-target="#modalDescargarEstudiantesSecundaria"> <i class="bi bi-journal-bookmark"></i> Acceder</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
</body>
<!-- Modal Calificaciones Primaria -->
<div class="modal fade" id="modalDescargarEstudiantes" tabindex="-1" aria-labelledby="modalLabelEstudiantes" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content"><!-- ../ajax/cargar_estudiantes.php -->
            <form id="formEstudiantes" action="#" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabelEstudiantes">Descargar Calificaciones de Estudiantes: Primaria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="anioModal" class="form-label">Año Escolar</label>
                        <input type="text" class="form-control" id="anioModal" name="anioModal" placeholder="Ej. 2024-2025">
                    </div>
                    <div class="mb-3">
                        <label for="gradoModal" class="form-label">Grado:</label>
                        <select class="form-select" name="gradoModal" id="gradoModal">
                            <option value>Seleccionar grado</option>
                            <option value="1">1er Grado</option>
                            <option value="2">2do Grado</option>
                            <option value="3">3er Grado</option>
                            <option value="4">4to Grado</option>
                            <option value="5">5to Grado</option>
                            <option value="6">6to Grado</option>
                        </select>
                    </div>
                    <div id="tabla-estudiantes-container">
                        <!-- Aquí se cargará la tabla de estudiantes -->
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Cédula</th>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Seleccionar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="4" class="text-center">Seleccione un grado para cargar estudiantes</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" id="btnDescargarSeleccionados">
                        <i class="bi bi-download"></i> Descargar
                    </button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Calificaciones Secundaria -->
<div class="modal fade" id="modalDescargarEstudiantesSecundaria" tabindex="-1" aria-labelledby="modalLabelEstudiantes" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content"><!-- ../ajax/cargar_estudiantes.php -->
            <form id="formEstudiantesSecundaria" action="#" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabelEstudiantes">Descargar Calificación de Estudiantes: Secundaria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="anioModalSecundaria" class="form-label">Año Escolar</label>
                        <input type="text" class="form-control" id="anioModalSecundaria" name="anioModalSecundaria" placeholder="Ej. 2024-2025">
                    </div>
                    <div class="mb-3">
                        <label for="lapsoModalSecundaria" class="form-label">Lapso Académico</label>
                        <select class="form-select" name="lapsoModalSecundaria" id="lapsoModalSecundaria">
                            <option value="Seleccionar">Seleccionar</option>
                            <option value="1er lapso">1er lapso</option>
                            <option value="2do lapso">2do lapso</option>
                            <option value="3er lapso">3ero lapso</option>
                            <option value="All">Todos los lapsos</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="gradoModalSecundaria" class="form-label">Grado:</label>
                        <select class="form-select" name="gradoModalSecundaria" id="gradoModalSecundaria">
                            <option value>Seleccionar grado</option>
                            <option value="7">1er año</option>
                            <option value="8">2do año</option>
                            <option value="9">3er año</option>
                            <option value="10">4to año</option>
                            <option value="11">5to año</option>
                        </select>
                    </div>
                    <div id="tabla-estudiantes-container-Secundaria">
                        <!-- Aquí se cargará la tabla de estudiantes -->
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Cédula</th>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Seleccionar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="4" class="text-center">Seleccione un grado para cargar estudiantes</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" id="btnDescargarSeleccionados">
                        <i class="bi bi-download"></i> Descargar
                    </button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Calcular y asignar el año escolar
        const añoActual = new Date().getFullYear();
        $('#anioModal').val(`${añoActual}-${añoActual + 1}`);

        // Cargar estudiantes cuando cambia el select de grado
        $('#gradoModal').change(function() {
            const formData = $('#formEstudiantes').serialize();

            // Mostrar loading
            $('#tabla-estudiantes-container').html(`
                    <div class="text-center py-4">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Cargando...</span>
                        </div>
                        <p class="mt-2">Cargando estudiantes...</p>
                    </div>
                `);

            $.ajax({
                url: '../AJAX/AJAX_Estudiantes/cargar_estudiantes.php',
                type: 'POST',
                data: formData,
                success: function(html) {
                    $('#tabla-estudiantes-container').html(html);
                },
                error: function() {
                    $('#tabla-estudiantes-container').html(`
                    <div class="alert alert-danger">
                        Error al cargar los estudiantes. Intente nuevamente.
                    </div>
                `);
                }
            });
        });

        // Descargar reporte de calificaciones individual
        $('#formEstudiantes').submit(function(e) {
            e.preventDefault();

            if ($('.estudiante-check:checked').length === 0) {
                alert('Por favor seleccione al menos un estudiante');
                return false;
            }

            const tempForm = document.createElement('form');
            tempForm.action = '../reportes/reporteCalificacionP.php';
            tempForm.method = 'POST';
            tempForm.target = '_blank';

            // Agregar ID del profesor
            const idProfesor = document.getElementById('idProfesorGlobal').value;
            const inputProfesor = document.createElement('input');
            inputProfesor.type = 'hidden';
            inputProfesor.name = 'id_profesor';
            inputProfesor.value = idProfesor;
            tempForm.appendChild(inputProfesor);

            // Agregar IDs de estudiantes seleccionados
            $('.estudiante-check:checked').each(function() {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'estudiantes_seleccionados[]';
                input.value = $(this).data('id');
                tempForm.appendChild(input);
            });

            document.body.appendChild(tempForm);
            tempForm.submit();
            document.body.removeChild(tempForm);
        });
        // Calcular y asignar el año escolar
        const añoActualSecundaria = new Date().getFullYear();
        $('#anioModalSecundaria').val(`${añoActualSecundaria}-${añoActualSecundaria + 1}`);

        $(document).ready(function() {
            // Cargar estudiantes cuando cambia el select de grado o lapso
            $('#gradoModalSecundaria, #lapsoModalSecundaria').change(function() {
                // Validar que ambos campos estén seleccionados
                if ($('#gradoModalSecundaria').val() && $('#lapsoModalSecundaria').val()) {
                    const formData = $('#formEstudiantesSecundaria').serialize();

                    // Mostrar loading
                    $('#tabla-estudiantes-container-Secundaria').html(`
                <div class="text-center py-4">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Cargando...</span>
                    </div>
                    <p class="mt-2">Cargando estudiantes...</p>
                </div>
            `);

                    $.ajax({
                        url: 'cargar_estudiantesSecundaria.php',
                        type: 'POST',
                        data: formData,
                        success: function(html) {
                            $('#tabla-estudiantes-container-Secundaria').html(html);
                        },
                        error: function(xhr, status, error) {
                            $('#tabla-estudiantes-container-Secundaria').html(`
                        <div class="alert alert-danger">
                            Error al cargar los estudiantes: ${error}
                        </div>
                    `);
                            console.error("Error en la solicitud:", error);
                        }
                    });
                }
            });

            // Descargar reporte de calificaciones individual
            $('#formEstudiantesSecundaria').submit(function(e) {
                e.preventDefault();

                // Validar que se haya seleccionado un lapso
                const lapso = $('#lapsoModalSecundaria').val();
                if (!lapso) {
                    alert('Por favor seleccione un lapso académico');
                    return false;
                }

                if ($('.estudiante-check:checked').length === 0) {
                    alert('Por favor seleccione al menos un estudiante');
                    return false;
                }

                if (lapso === 'All') {
                    const tempForm = document.createElement('form');
                    tempForm.action = '../reportes/reporteCalificacionS3L.php';
                    tempForm.method = 'POST';
                    tempForm.target = '_blank';

                    // Agregar ID del grado
                    const gradoEst = document.getElementById('gradoModalSecundaria').value;
                    const inputGrado = document.createElement('input');
                    inputGrado.type = 'hidden';
                    inputGrado.name = 'id_grado';
                    inputGrado.value = gradoEst;
                    tempForm.appendChild(inputGrado);

                    // Agregar ID del profesor
                    const idProfesor = document.getElementById('idProfesorGlobal').value;
                    const inputProfesor = document.createElement('input');
                    inputProfesor.type = 'hidden';
                    inputProfesor.name = 'id_profesor';
                    inputProfesor.value = idProfesor;
                    tempForm.appendChild(inputProfesor);

                    // Agregar Lapso académico
                    const inputLapso = document.createElement('input');
                    inputLapso.type = 'hidden';
                    inputLapso.name = 'lapsoModalSecundaria';
                    inputLapso.value = lapso;
                    tempForm.appendChild(inputLapso);

                    // Agregar IDs de estudiantes seleccionados
                    $('.estudiante-check:checked').each(function() {
                        const input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = 'estudiantes_seleccionados[]';
                        input.value = $(this).data('id');
                        tempForm.appendChild(input);
                    });
                    document.body.appendChild(tempForm);
                    tempForm.submit();
                    document.body.removeChild(tempForm);
                } else {
                    const tempForm = document.createElement('form');
                    tempForm.action = '../reportes/reporteCalificacionS.php';
                    tempForm.method = 'POST';
                    tempForm.target = '_blank';

                    // Agregar ID del grado
                    const gradoEst = document.getElementById('gradoModalSecundaria').value;
                    const inputGrado = document.createElement('input');
                    inputGrado.type = 'hidden';
                    inputGrado.name = 'id_grado';
                    inputGrado.value = gradoEst;
                    tempForm.appendChild(inputGrado);

                    // Agregar ID del profesor
                    const idProfesor = document.getElementById('idProfesorGlobal').value;
                    const inputProfesor = document.createElement('input');
                    inputProfesor.type = 'hidden';
                    inputProfesor.name = 'id_profesor';
                    inputProfesor.value = idProfesor;
                    tempForm.appendChild(inputProfesor);

                    // Agregar Lapso académico
                    const inputLapso = document.createElement('input');
                    inputLapso.type = 'hidden';
                    inputLapso.name = 'lapsoModalSecundaria';
                    inputLapso.value = lapso;
                    tempForm.appendChild(inputLapso);

                    // Agregar IDs de estudiantes seleccionados
                    $('.estudiante-check:checked').each(function() {
                        const input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = 'estudiantes_seleccionados[]';
                        input.value = $(this).data('id');
                        tempForm.appendChild(input);
                    });

                    document.body.appendChild(tempForm);
                    tempForm.submit(); // <- primero enviar
                    document.body.removeChild(tempForm); // <- luego eliminar
                }

            });
        });
    });
</script>

</html>