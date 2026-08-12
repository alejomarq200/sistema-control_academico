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