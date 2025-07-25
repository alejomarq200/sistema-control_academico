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
    <title>Reportes de Inscripcion</title>
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
                    <h1 class="my-3" id="titulo">Reporte de Inscripcion</h1>
                    <!-- Contenedores para los botones de Primaria y Secundaria -->
                    <div class="row mb-4">
                        <!-- Contenedor Primaria -->
                        <div class="col-md-6 mb-3 mb-md-0">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                    <i class="bi bi-mortarboard-fill text-primary mb-3" style="font-size: 3rem;"></i>
                                    <h3 class="card-title">Primaria</h3>
                                    <p class="card-text text-muted">Gestionar planilla de inscripción de educación primaria</p>
                                    <button class="btn btn-primary btn-lg mt-2 w-75" data-bs-toggle="modal" data-bs-target="#"> <i class="bi bi-journal-check"></i> Acceder</button>
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
                                    <button class="btn btn-success btn-lg mt-2 w-75" data-bs-toggle="modal" data-bs-target="#modalDescargarPlanillaS"> <i class="bi bi-journal-bookmark"></i> Acceder</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
</body>
<!-- Modal -->
<div class="modal fade" id="modalDescargarPlanillaS" tabindex="-1" aria-labelledby="modalLabelPlanilla" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="formPlanilla" action="cargar_planilla.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabelEstudiantes">Descargar Planillas de Inscripción</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="anioS" class="form-label">Año Escolar</label>
                        <input type="text" class="form-control" id="anioS" name="anioS" placeholder="Ej. 2024-2025">
                    </div>
                    <div class="mb-3">
                        <label for="gradosS" class="form-label">Grado:</label>
                        <select class="form-select" name="gradosS" id="gradosS">
                            <option value>Seleccionar grado</option>
                            <option value="7">1er año</option>
                            <option value="8">2do año</option>
                            <option value="9">3er año</option>
                            <option value="10">4to año</option>
                            <option value="11">5to año</option>
                        </select>
                    </div>
                    <div id="tabla-planilla-container">
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
        $('#anioS').val(`${añoActual}-${añoActual + 1}`);

        $('#gradosS, #anioS').on('change', function() {
            const grado = $('#gradosS').val();
            const anio = $('#anioS').val();

            if (!grado || !anio) return;

            $('#tabla-planilla-container').html(`
            <div class="text-center py-4">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Cargando...</span>
                </div>
                <p class="mt-2">Cargando planillas de inscripción...</p>
            </div>
        `);

            $.ajax({
                url: 'cargar_planilla.php',
                type: 'POST',
                data: {
                    gradosS: grado,
                    anioS: anio
                },
                success: function(response) {
                    $('#tabla-planilla-container').html(response);
                },
                error: function(xhr, status, error) {
                    $('#tabla-planilla-container').html(`
                    <div class="alert alert-danger">
                        Error al cargar las planillas: ${error}
                    </div>
                `);
                }
            });
        });

        $('#formPlanilla').submit(function(e) {
            e.preventDefault();

            if ($('.planilla-check:checked').length === 0) {
                alert('Por favor seleccione al menos una planilla');
                return false;
            }

            const tempForm = document.createElement('form');
            tempForm.action = '../reportes/reportePlanillaInscripcionMultiple.php'; // Tu archivo PHP receptor
            tempForm.method = 'POST';
            tempForm.target = '_blank';

            // Agrega los IDs de inscripciones seleccionadas
            $('.planilla-check:checked').each(function() {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'planillas_seleccionadas[]';
                input.value = $(this).val(); // Usa .val() ya que los checkboxes tienen value=""
                tempForm.appendChild(input);
            });

            document.body.appendChild(tempForm);
            tempForm.submit();
            document.body.removeChild(tempForm);
        });

    });
</script>

</html>