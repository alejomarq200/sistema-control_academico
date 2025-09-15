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
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-solid-straight/css/uicons-solid-straight.css'>
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
                    <?php 
                    include("../Layout/mensajes.php");
                    include("../Layout/modalesInscripcion/modalInscripPrimaria.php"); 
                    include("../Layout/modalesInscripcion/modalInscripSecundaria.php");
                    ?>
                    <div class="mb-4" style="max-width: 600px; margin: 0 auto; background-color:#F5F5F5; border-radius:15px; padding: 30px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); ">
                        <h1 class="display-5 fw-bold text-primary mb-3">Reporte de Inscripcion</h1>
                        <p class="lead text-muted">Descarga y visualiza las planillas de inscripción disponibles</p>
                        <div class="mx-auto" style="height: 48; width: 100px; background: linear-gradient(to right, #05357cff, #6c757d, #0d6efd);"></div>
                    </div>
                    <!-- Contenedores para los botones de Primaria y Secundaria -->
                    <div class="row mb-4">
                        <!-- Contenedor Primaria -->
                        <div class="col-md-6 mb-3 mb-md-0">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                    <i class="fi fi-rr-file-invoice text-primary mb-3" style="font-size: 3rem;"></i>
                                    <h3 class="card-title">Primaria</h3>
                                    <p class="card-text text-muted">Gestionar planilla de inscripción de educación primaria</p>
                                    <button class="btn btn-primary btn-lg mt-2 w-75" data-bs-toggle="modal" data-bs-target="#modalDescargarPlanillaP"> <i class="bi bi-journal-check"></i> Acceder</button>
                                </div>
                            </div>
                        </div>

                        <!-- Contenedor Secundaria -->
                        <div class="col-md-6">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                    <i class="fi fi-ss-assessment-alt text-success mb-3" style="font-size: 3rem;"></i>
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
<script>
     document.addEventListener('DOMContentLoaded', function() {
        // Calcular y asignar el año escolar
        const añoActual = new Date().getFullYear();
        $('#anioS').val(`${añoActual}-${añoActual + 1}`);
        $(document).ready(function() {


            $('#gradosS, #anioS').on('change', function() {
                const gradosS = $('#gradosS').val();
                const anioS = $('#anioS').val();

                if (!gradosS || !anioS) return;

                $('#tabla-planilla-container-S').html(`
                <div class="text-center py-4">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Cargando...</span>
                    </div>
                    <p class="mt-2">Cargando planillas de inscripción...</p>
                </div>
                `);

                $.ajax({
                    url: '../AJAX/AJAX_Inscripcion/cargar_planilla.php', // Asegúrate que esta ruta es correcta
                    type: 'POST',
                    data: {
                        gradosS: gradosS,
                        anioS: anioS
                    },
                    success: function(response) {
                        $('#tabla-planilla-container-S').html(response);
                    },
                    error: function(xhr, status, error) {
                        $('#tabla-planilla-container-S').html(`
                    <div class="alert alert-danger">
                        Error al cargar las planillas: ${error}
                    </div>
                `);
                        console.error("Error en la solicitud AJAX:", status, error);
                    }
                });
            });

           $('#formPlanillaS').submit(function(e) {
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


        // Calcular y asignar el año escolar
        const añoActualP = new Date().getFullYear();
        $('#anioP').val(`${añoActual}-${añoActual + 1}`);

        $('#gradosP, #anioP').on('change', function() {
            const grado = $('#gradosP').val();
            const anio = $('#anioP').val();

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
                url: '../AJAX/AJAX_Inscripcion/cargar_planillaP.php',
                type: 'POST',
                data: {
                    gradosP: grado,
                    anioP: anio
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

        $('#formPlanillaP').submit(function(e) {
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