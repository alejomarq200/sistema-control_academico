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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <!-- Scripts necesarios -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Auditoria de Usuarios</title>
    <style>
        /* Estilos para las tarjetas de constancias */
        .card {
            transition: all 0.3s ease;
            border-radius: 15px;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 2rem;
        }

        .display-4 {
            font-size: 3rem;
        }

        .btn-lg {
            padding: 0.5rem 1.5rem;
            font-size: 1.1rem;
        }

        /* Responsividad */
        @media (max-width: 768px) {
            .col-md-4 {
                margin-bottom: 1.5rem;
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
        include("../Desarrollo/menu.php");
        ?>
        <!-- CUERPO DEL HTML ESPACIO PARA TRABAJAR YA INCLUIDA LA BARRA -->
        <div class="main p-3">
            <div class="text-center">
                <main>
                    <?php include("../Layout/mensajes.php"); ?>
                    <div class="mb-4" style="max-width: 600px; margin: 0 auto; background-color:#F5F5F5; border-radius:15px; padding: 30px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); ">
                        <h1 class="display-10 fw-bold text-primary mb-2">Reportes de Auditoría de Usuarios</h1>
                        <p class="lead text-muted">Consulta los movimientos de auditoría del usuario seleccionado</p>
                        <div class="mx-auto" style="height: 48; width: 100px; background: linear-gradient(to right, #05357cff, #6c757d, #0d6efd);"></div>
                    </div>

                    <!-- Contenedor único para auditoría -->
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-6 mb-4">
                                <div class="card h-100 shadow-sm border-0">
                                    <div class="card-body text-center">
                                        <i class="bi bi-clipboard2-data-fill display-4 text-info mb-3"></i>
                                        <h3 class="card-title">Movimientos de Auditoría</h3>
                                        <p class="card-text">Consulta todos los registros de actividad del usuario</p>
                                        <div class="d-flex justify-content-center gap-3">
                                            <button class="btn btn-info btn-lg rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#modalAuditoria">
                                                <i class="bi bi-search me-2"></i>Consultar
                                            </button>
                                            <button class="btn btn-secondary btn-lg rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#modalAuditoriaPDF">
                                                <i class="bi bi-download me-2"></i>Exportar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</body>
<!-- Modal para Auditoria -->
<div class="modal fade" id="modalAuditoria" tabindex="-1" aria-labelledby="modalAuditoriaLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalAuditoriaLabel">Consultar de Auditoría</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-4">
                    <!-- Columna izquierda - Filtros principales -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="selectUsuario" class="form-label">Usuario:</label>
                            <select class="form-select" id="selectUsuario" name="usuario">
                                <option value="" selected>Todos los usuarios</option>

                                <!-- Opciones se llenarán dinámicamente -->
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="selectTabla" class="form-label">Tabla afectada:</label>
                            <select class="form-select" id="selectTabla" name="tabla">

                                <!-- Opciones se llenarán dinámicamente -->
                            </select>
                        </div>
                    </div>

                    <!-- Columna derecha - Filtros de fecha -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="selectOperacion" class="form-label">Tipo de operación:</label>
                            <select class="form-select" id="selectOperacion" name="operacion">
                                <option value="" selected>Todas las operaciones</option>
                                <option value="INSERT">Creación</option>
                                <option value="UPDATE">Actualización</option>
                                <option value="DELETE">Eliminación</option>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="fechaInicio" class="form-label">Fecha desde:</label>
                                <input type="date" class="form-control" id="fechaInicio" name="fechaInicio">
                            </div>
                            <div class="col-md-6">
                                <label for="fechaFin" class="form-label">Fecha hasta:</label>
                                <input type="date" class="form-control" id="fechaFin" name="fechaFin">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Botón para aplicar filtros -->
                <div class="text-center mb-4">
                    <button type="button" id="btnAplicarFiltros" class="btn btn-primary">
                        <i class="bi bi-funnel me-2"></i>Aplicar Filtros
                    </button>
                </div>

                <!-- Tabla de resultados -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Registros de Auditoría</h5>
                    </div>
                    <div class="card-body p-0">
                        <!-- Contenedor con scroll vertical -->
                        <div style="max-height: 500px; overflow-y: auto;">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover mb-0" id="tablaAuditoria">
                                    <thead class="table-dark" style="position: sticky; top: 0; z-index: 1;">
                                        <tr>
                                            <th>Fecha/Hora</th>
                                            <th>Tabla</th>
                                            <th>Operación</th>
                                            <th>Valores Ant</th>
                                            <th>Valores Nuevos</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Datos se cargarán dinámicamente -->
                                        <tr>
                                            <td colspan="7" class="text-center py-4">
                                                <div class="text-muted">
                                                    <i class="bi bi-funnel fs-4"></i>
                                                    <p class="mt-2">Aplique los filtros para ver los registros de auditoría</p>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="cerrar" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Auditoria PDF -->
<div class="modal fade" id="modalAuditoriaPDF" tabindex="-1" aria-labelledby="modalAuditoriaPDFLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="modalAuditorPDFiaLabel">Reporte de Auditoría</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="../reportes/emitirReporteAuditoria.php" method="POST">
                <div class="modal-body">
                    <div class="row mb-4">
                        <!-- Columna izquierda - Filtros principales -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="selectUsuarioAuditoria" class="form-label">Usuario:</label>
                                <select class="form-select" id="selectUsuarioAuditoria" name="usuarioAuditoria">

                                    <!-- Opciones se llenarán dinámicamente -->
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="selectTablaAuditoria" class="form-label">Tabla afectada:</label>
                                <select class="form-select" id="selectTablaAuditoria" name="tablaAuditoria">

                                    <!-- Opciones se llenarán dinámicamente -->
                                </select>
                            </div>
                        </div>

                        <!-- Columna derecha - Filtros de fecha -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="selectOperacionAuditoria" class="form-label">Tipo de operación:</label>
                                <select class="form-select" id="selectOperacionAuditoria" name="operacionAuditoria">
                                    <option value="" selected>Todas las operaciones</option>
                                    <option value="INSERT">Creación</option>
                                    <option value="UPDATE">Actualización</option>
                                    <option value="DELETE">Eliminación</option>
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="fechaInicioAuditoria" class="form-label">Fecha desde:</label>
                                    <input type="date" class="form-control" id="fechaInicioAuditoria" name="fechaInicioAuditoria">
                                </div>
                                <div class="col-md-6">
                                    <label for="fechaFinAuditoria" class="form-label">Fecha hasta:</label>
                                    <input type="date" class="form-control" id="fechaFinAuditoria" name="fechaFinAuditoria">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Botón para aplicar filtros -->
                    <div class="text-center mb-8">
                        <button type="submit" id="btnConsulta" class="btn btn-success" style="width: 50%;">
                            <i class="fi fi-rr-file-pdf"></i>Emitir Reporte
                        </button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="cerrar" data-bs-dismiss="modal">Cerrar</button>
                </div>
        </div>
        </form>
    </div>
</div>
<script>
    function cargarUsuarios() {
        $.ajax({
            url: "../AJAX/AJAX_Auditoria/cargarUsuarios.php",
            type: "POST",
            data: {
                action: 'cargar_usuarios'
            }, // Enviamos una acción específica
            success: function(resultado) {
                $("#selectUsuario").html('<option value="Seleccionar" selected>Seleccionar</option>' + resultado);
            },
            error: function(xhr, status, error) {
                console.error("Error en la solicitud AJAX:", error);
                $("#selectUsuario").html('<option value="Error">Error al cargar grados</option>');
            }
        });
    }

    function cargarUsuariosPDF() {
        $.ajax({
            url: "../AJAX/AJAX_Auditoria/cargarUsuarios.php",
            type: "POST",
            data: {
                action: 'cargar_usuarios'
            }, // Enviamos una acción específica
            success: function(resultado) {
                $("#selectUsuarioAuditoria").html('<option value="Seleccionar" selected>Seleccionar</option>' + resultado);
            },
            error: function(xhr, status, error) {
                console.error("Error en la solicitud AJAX:", error);
                $("#selectUsuarioAuditoria").html('<option value="Error">Error al cargar grados</option>');
            }
        });
    }

    function cargarTablasPDF() {
        $.ajax({
            url: "../AJAX/AJAX_Auditoria/cargarTablas.php",
            type: "POST",
            data: {
                action: 'cargar_tablas'
            },
            success: function(resultado) {
                console.log("Respuesta del servidor:", resultado); // Para depuración
                $("#selectTablaAuditoria").html('<option value="Seleccionar" selected>Seleccionar</option>' + resultado);
            },
            error: function(xhr, status, error) {
                console.error("Error en la solicitud AJAX:", error);
                $("#selectTablaAuditoria").html('<option value="Error">Error al cargar grados</option>');
            }
        });
    }


    function cargarTablas() {
        $.ajax({
            url: "../AJAX/AJAX_Auditoria/cargarTablas.php",
            type: "POST",
            data: {
                action: 'cargar_tablas'
            },
            success: function(resultado) {
                console.log("Respuesta del servidor:", resultado); // Para depuración
                $("#selectTabla").html('<option value="Seleccionar" selected>Seleccionar</option>' + resultado);
            },
            error: function(xhr, status, error) {
                console.error("Error en la solicitud AJAX:", error);
                $("#selectTabla").html('<option value="Error">Error al cargar grados</option>');
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        const modalAuditoriaPDF = document.getElementById('modalAuditoriaPDF');
        // Cuando se abre la modal
        modalAuditoriaPDF.addEventListener('shown.bs.modal', function() {
            cargarUsuariosPDF();
            cargarTablasPDF();
        });
        const modalAuditoria = document.getElementById('modalAuditoria');
        // Cuando se abre la modal
        modalAuditoria.addEventListener('shown.bs.modal', function() {
            cargarUsuarios();
            cargarTablas();
        });

        document.getElementById('btnAplicarFiltros').addEventListener('click', function() {
            const filtros = {
                usuario: document.getElementById('selectUsuario').value,
                tabla: document.getElementById('selectTabla').value,
                operacion: document.getElementById('selectOperacion').value,
                fechaInicio: document.getElementById('fechaInicio').value,
                fechaFin: document.getElementById('fechaFin').value
            };

            // Aquí iría tu llamada AJAX para obtener los datos filtrados
            fetchAuditoriaData(filtros);
        });

        function fetchAuditoriaData(filtros) {
            const loadingIndicator = document.createElement('div');
            loadingIndicator.className = 'text-center my-4';
            loadingIndicator.innerHTML = '<div class="spinner-border text-primary" role="status"><span class="visually-hidden">Cargando...</span></div>';

            const tbody = document.querySelector('#tablaAuditoria tbody');
            tbody.innerHTML = '';
            tbody.appendChild(loadingIndicator);

            fetch('../AJAX/AJAX_Auditoria/cargarDetallesAuditoria.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify(filtros)
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    if (!data.success) {
                        throw new Error(data.error || 'Error desconocido');
                    }

                    if (data.count === 0) {
                        showAlert('No se encontraron registros con los filtros seleccionados', 'info');
                    }

                    llenarTablaAuditoria(data.data);

                    // Para depuración:
                    console.log('Consulta ejecutada:', data.sql);
                })
                .catch(error => {
                    console.error('Error:', error);
                    showAlert('Error al cargar datos de auditoría: ' + error.message, 'danger');
                    tbody.innerHTML = '<tr><td colspan="7" class="text-center text-danger">Error al cargar datos</td></tr>';
                });
        }

        function showAlert(message, type = 'danger') {
            const alert = document.createElement('div');
            alert.className = `alert alert-${type} alert-dismissible fade show`;
            alert.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    `;

            const container = document.getElementById('alert-container');
            if (!container) {
                const newContainer = document.createElement('div');
                newContainer.id = 'alert-container';
                document.querySelector('.modal-body').prepend(newContainer);
                newContainer.appendChild(alert);
            } else {
                container.innerHTML = '';
                container.appendChild(alert);
            }
        }

        function limpiarPseudoJson(str) {
            if (!str || typeof str !== 'string') return {};

            try {
                // Agregar comillas a las claves
                str = str.replace(/([{,])\s*([a-zA-Z0-9_]+)\s*:/g, '$1"$2":');

                // Reemplazar NULL (SQL-style) con null
                str = str.replace(/\bNULL\b/g, 'null');

                return JSON.parse(str);
            } catch (e) {
                console.warn('No se pudo parsear el pseudo JSON:', str);
                return {};
            }
        }

        document.getElementById('cerrar').addEventListener('click', function() {
            window.location.href = 'auditoria.php';
        })

        function formatearValoresBonito(data) {
            if (!data || typeof data !== 'object') return 'Sin datos';

            const campos = {
                anio_escolar: 'Año',
                id_grado: 'Grado',
                lapso_academico: 'Lapso',
                id_profesor: 'Profesor',
                id_materia: 'Materia',
                id_estudiante: 'Estudiante',
                calificacion: 'Calificación',
                actividad: 'Actividad',
                tipo_actividad: 'Tipo',
                promedio: 'Promedio',
            };

            return Object.entries(data)
                .filter(([k, v]) => v !== null)
                .map(([clave, valor]) => {
                    const etiqueta = campos[clave] || clave;
                    return `${etiqueta}: ${valor}`;
                })
                .join(' - ');
        }

        function llenarTablaAuditoria(data) {
            const tbody = document.querySelector('#tablaAuditoria tbody');
            tbody.innerHTML = '';

            if (data.length === 0) {
                tbody.innerHTML = '<tr><td colspan="7" class="text-center">No se encontraron registros con los filtros aplicados</td></tr>';
                return;
            }

            data.forEach(item => {
                const tr = document.createElement('tr');

                const valAnt = formatearValoresBonito(limpiarPseudoJson(item.valores_anteriores));
                const valNuevos = formatearValoresBonito(limpiarPseudoJson(item.valores_nuevos));

                tr.innerHTML = `
            <td>${item.fecha_hora}</td>
            <td>${item.tabla_afectada}</td>
            <td><span class="badge ${getBadgeClass(item.operacion)}">${item.operacion}</span></td>
            <td>${valAnt}</td>
            <td>${valNuevos}</td>
        `;
                tbody.appendChild(tr);
            });
        }

        function getBadgeClass(operacion) {
            const classes = {
                'INSERT': 'bg-success',
                'UPDATE': 'bg-warning text-dark',
                'DELETE': 'bg-danger'
            };
            return classes[operacion] || 'bg-secondary';
        }
        btn.addEventListener('click', function() {
            const ant = JSON.parse(decodeURIComponent(this.dataset.ant));
            const nuevos = JSON.parse(decodeURIComponent(this.dataset.nuevos));
            mostrarDetalleAuditoria(this.dataset.id, ant, nuevos);
        });

        function mostrarDetalleAuditoria(id, ant, nuevos) {
            document.getElementById('detalleId').textContent = id;

            const formatValues = (data) => {
                if (!data || Object.keys(data).length === 0) {
                    return '<p class="text-muted">No hay datos</p>';
                }

                return Object.entries(data).map(([key, value]) =>
                    `<p><strong>${key}:</strong> ${value !== null ? value : 'N/A'}</p>`
                ).join('');
            };

            document.getElementById('detalleAnt').innerHTML = formatValues(ant);
            document.getElementById('detalleNuevos').innerHTML = formatValues(nuevos);

            if (ant && nuevos) {
                highlightChanges('detalleAnt', 'detalleNuevos', ant, nuevos);
            }
        }
    });
</script>