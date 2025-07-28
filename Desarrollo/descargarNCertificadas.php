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
    <style>
        /* Estilos generales para el contenedor */
        .card.filtros-container {
            border-radius: 15px;
            border: none;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .card.filtros-container:hover {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        /* Estilos para los labels */
        .form-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        /* Estilos para los inputs y selects */
        .form-control,
        .form-select {
            border-radius: 8px;
            border: 1px solid #ced4da;
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
            transition: all 0.3s;
            height: calc(2.25rem + 8px);
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15);
        }

        /* Estilo especial para el input de año escolar */
        #anioS {
            background-color: #f1f8ff;
            font-weight: 500;
            color: #0d6efd;
        }

        /* Estilos para los botones */
        #btnBuscar {
            border-radius: 8px;
            font-weight: 600;
            padding: 0.5rem 1rem;
            transition: all 0.3s;
            height: calc(2.25rem + 8px);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            background: linear-gradient(135deg, #0d6efd 0%, #0b5ed7 100%);
            border: none;
        }

        #btnBuscar:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(13, 110, 253, 0.3);
        }

        #btnAgregar {
            border-radius: 8px;
            width: calc(2.25rem + 8px);
            height: calc(2.25rem + 8px);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
            background: linear-gradient(135deg, #198754 0%, #157347 100%);
            border: none;
        }

        #btnAgregar:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(25, 135, 84, 0.3);
        }

        /* Estilos para el modal */
        #modalEstudiantes .modal-content {
            border-radius: 15px;
            border: none;
            overflow: hidden;
        }

        #modalEstudiantes .modal-header {
            padding: 1rem 1.5rem;
        }

        #modalEstudiantes .modal-body {
            padding: 1.5rem;
        }

        /* Estilos para la tabla de estudiantes */
        #tablaEstudiantes {
            --bs-table-bg: transparent;
            --bs-table-striped-bg: rgba(0, 0, 0, 0.02);
            --bs-table-hover-bg: rgba(13, 110, 253, 0.05);
        }

        #tablaEstudiantes thead th {
            background-color: #f8f9fa;
            font-weight: 600;
            color: #495057;
            border-bottom-width: 2px;
        }

        #tablaEstudiantes tbody tr {
            transition: all 0.2s;
        }

        #tablaEstudiantes tbody tr:hover {
            transform: translateX(4px);
        }

        /* Efecto de carga */
        @keyframes pulse {
            0% {
                opacity: 0.6;
            }

            50% {
                opacity: 1;
            }

            100% {
                opacity: 0.6;
            }
        }

        .loading-text {
            animation: pulse 1.5s infinite;
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .card-body {
                padding: 1rem;
            }

            .row.g-3>div {
                margin-bottom: 1rem;
            }

            #btnAgregar {
                width: 100%;
            }
        }

        @media (max-width: 768px) {
            .form-label {
                font-size: 0.8rem;
            }

            .form-control,
            .form-select,
            #btnBuscar {
                font-size: 0.85rem;
            }
        }
    </style>
    </style>
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
                    <h1 class="my-3" id="titulo">Reporte de Notas Certificadas</h1>

                    <!-- Contenedor de filtros -->
                    <div class="container-fluid mb-4">
                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                <div class="card shadow-sm filtros-container">
                                    <div class="card-body">
                                        <!-- Tus controles de filtro aquí -->
                                        <div class="card-body">
                                            <form id="formFiltros" method="POST">
                                                <div class="row g-3 align-items-center">

                                                    <!-- Año Escolar -->
                                                    <div class="col-md-3">
                                                        <label for="anioEscolar" class="form-label">Año Escolar</label>
                                                        <input type="text" class="form-control" id="anioEscolar" readonly>
                                                    </div>

                                                    <!-- Nivel -->
                                                    <div class="col-md-2">
                                                        <label for="nivel" class="form-label">Nivel</label>
                                                        <select class="form-select" id="nivel" required>
                                                            <option value="" selected disabled>Seleccione</option>
                                                            <option value="Secundaria">Secundaria</option>
                                                        </select>
                                                    </div>

                                                    <!-- Grado 1 -->
                                                    <div class="col-md-2">
                                                        <label for="grado1" class="form-label">Grado</label>
                                                        <select class="form-select" id="grado1" disabled required>
                                                            <option value="" selected disabled>Seleccione nivel primero</option>
                                                        </select>
                                                    </div>

                                                    <!-- Grado 2 (opcional) -->
                                                    <div class="col-md-2">
                                                        <label for="grado2" class="form-label">Grado 2 (opcional)</label>
                                                        <select class="form-select" id="grado2" disabled>
                                                            <option value="" selected>Todas</option>
                                                        </select>
                                                    </div>

                                                    <!-- Botón de acción -->
                                                    <div class="col-md-2 d-flex align-items-end">
                                                        <button type="button" id="btnBuscar" class="btn btn-primary w-100" disabled>
                                                            <i class="bi bi-search"></i> Buscar
                                                        </button>
                                                    </div>

                                                    <!-- Botón para abrir modal -->
                                                    <div class="col-md-1 d-flex align-items-end">
                                                        <button type="button" id="btnAgregar" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalEstudiantes" disabled>
                                                            <i class="bi bi-plus-lg"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Resultados (se llenará con AJAX) -->
                        <div id="resultados" class="container-fluid mt-4"></div>
                </main>
            </div>
        </div>

        <!-- Modal para listar estudiantes -->
        <div class="modal fade" id="modalEstudiantes" tabindex="-1" aria-labelledby="modalEstudiantesLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="modalEstudiantesLabel">Listado de Estudiantes</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="tablaEstudiantes">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Cédula</th>
                                        <th>Nombre Completo</th>
                                        <th>Grado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="cuerpoTablaEstudiantes">
                                    <!-- Datos se cargarán via AJAX -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                function cargarGrados() {
                    $.ajax({
                        url: "../AJAX/AJAX_Horarios/cargarHorarios.php",
                        type: "POST",
                        data: {
                            action: 'cargar_grados',
                            nivelEducativo: $("#nivel").val()
                        }, // Enviamos una acción específica
                        success: function(resultado) {
                            $("#grado1").html('<option value="Seleccionar" selected>Seleccionar</option>' + resultado);
                            $("#grado2").html('<option value="Seleccionar" selected>Seleccionar</option>' + resultado);
                        },
                        error: function(xhr, status, error) {
                            console.error("Error en la solicitud AJAX:", error);
                            $("#grado1").html('<option value="Error">Error al cargar grados</option>');
                        }
                    });
                }
                // Calcular y asignar el año escolar
                const añoActual = new Date().getFullYear();
                $('#anioEscolar').val(`${añoActual}-${añoActual + 1}`);

                // Dinámica de los selectores
                const nivelSelect = document.getElementById('nivel');
                const grado1Select = document.getElementById('grado1');
                const grado2Select = document.getElementById('grado2');
                const btnBuscar = document.getElementById('btnBuscar');
                const btnAgregar = document.getElementById('btnAgregar');

                // Cargar grados según nivel seleccionado
                nivelSelect.addEventListener('change', function() {
                    const nivel = this.value;
                    grado1Select.disabled = false;
                    grado1Select.innerHTML = '<option value="" selected disabled>Cargando...</option>';

                    // Simulación de carga de grados (deberías reemplazar con tu AJAX real)
                    setTimeout(() => {
                        let options = '<option value="" selected disabled>Seleccione grado</option>';
                        cargarGrados();
                    }, 500);
                });

                // Cargar secciones cuando se selecciona un grado
                grado1Select.addEventListener('change', function() {
                    if (this.value) {
                        grado2Select.disabled = false;
                        btnBuscar.disabled = false;
                        btnAgregar.disabled = false;
                    } else {
                        grado2Select.disabled = true;
                        grado2Select.innerHTML = '<option value="" selected>Todas</option>';
                        btnBuscar.disabled = true;
                        btnAgregar.disabled = true;
                    }
                });

                // Botón Agregar (abre modal)
                btnAgregar.addEventListener('click', function() {
                    // Obtener valores de los filtros
                    const nivel = document.getElementById('nivel').value;
                    const grado1 = document.getElementById('grado1').value;
                    const grado2 = document.getElementById('grado2').value;
                    const anioEscolar = document.getElementById('anioEscolar').value;

                    // Validar que todos los campos obligatorios estén completos
                    if (!grado1 || !anioEscolar) {
                        Swal.fire('Error', 'Por favor complete todos los filtros obligatorios', 'error');
                        return;
                    }

                    // Mostrar estado de carga
                    const cuerpoTabla = document.getElementById('cuerpoTablaEstudiantes');
                    cuerpoTabla.innerHTML = `
                    <tr>
                        <td colspan="6" class="text-center loading-text">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Cargando...</span>
                            </div>
                            <p class="mt-2">Buscando estudiantes...</p>
                        </td>
                    </tr>
                    `;

                    // Configurar parámetros para la solicitud AJAX
                    const params = new URLSearchParams();
                    params.append('nivel', nivel);
                    params.append('grado1', grado1);
                    params.append('grado2', grado2 || ''); // Si no hay grado2, envía cadena vacía
                    params.append('anioEscolar', anioEscolar);

                    // Realizar la solicitud AJAX
                    fetch('../AJAX/cargarEstNCertf.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                            },
                            body: params
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Error en la respuesta del servidor');
                            }
                            return response.text();
                        })
                        .then(data => {
                            // Actualizar la tabla con los datos recibidos
                            cuerpoTabla.innerHTML = data;
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            cuerpoTabla.innerHTML = `
                            <tr>
                                <td colspan="6" class="text-center text-danger">
                                    <i class="bi bi-exclamation-triangle-fill"></i> 
                                    Error al cargar los datos: ${error.message}
                                </td>
                            </tr>
                        `;
                        });
                });
            });

            function seleccionarEstudiante(idEstudiante, nombreCompleto, grados) {
                Swal.fire({
                    title: 'Generar Reporte',
                    html: `¿Desea generar el reporte para:<br>
               <b>${nombreCompleto}</b><br>
               <small>Cédula: ${idEstudiante}</small><br>
               <small>Grados: ${grados}</small>`,
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Generar Reporte',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Mostrar indicador de carga
                        Swal.fire({
                            title: 'Generando Reporte',
                            html: 'Por favor espere...',
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading();
                            }
                        });

                        console.log(`ID Estudiante enviado: ${idEstudiante}`);


                        // Configurar la solicitud AJAX
                        fetch(`reporteNotasCertificadas.php?id_estudiante=${encodeURIComponent(idEstudiante)}`)
                            .then(response => {
                                if (!response.ok) {
                                    return response.json().then(err => {
                                        throw new Error(err.error || 'Error en la respuesta');
                                    });
                                }
                                return response.blob();
                            })
                            .then(blob => {
                                // Ocultar loader
                                Swal.close();

                                // Crear enlace para descarga
                                const url = window.URL.createObjectURL(blob);
                                const a = document.createElement('a');
                                a.href = url;
                                a.download = `reporte_${idEstudiante}.pdf`;
                                document.body.appendChild(a);
                                a.click();
                                window.URL.revokeObjectURL(url);

                                // Cerrar el modal
                                const modal = bootstrap.Modal.getInstance(document.getElementById('modalEstudiantes'));
                                modal.hide();
                            })
                            .catch(error => {
                                Swal.fire('Error', error.message || 'No se pudo generar el reporte', 'error');
                                console.error('Error:', error);
                            });
                    } else {
                        const modal = bootstrap.Modal.getInstance(document.getElementById('modalEstudiantes'));
                        modal.hide();
                    }

                });
            }
        </script>