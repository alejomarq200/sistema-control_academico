<head>
    <link rel="stylesheet" href="..\css\modalesCalificación\modalEditarClfPrimaria.css">
</head>
<div class="modal fade" id="editarCalificacionesModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Calificaciones</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formEditarCalificaciones">
                    <input type="hidden" id="estudianteId" name="estudiante_id">
                    <input type="hidden" id="gradoId" name="grado_id">
                    <input type="hidden" id="materiaId" name="materia_id">
                    <input type="hidden" id="profesorId" name="profesor_id">

                    <div class="mb-3">
                        <label class="form-label">Estudiante:</label>
                        <p class="form-control-static" id="nombreEstudiante"></p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Cédula:</label>
                        <p class="form-control-static" id="cedulaEstudiante"></p>
                    </div>

                    <div id="camposCalificaciones">
                        <!-- Los campos de calificaciones se generarán dinámicamente aquí -->
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="guardarCambios">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        // Manejar clic en botón editar
        $(document).on('click', '.btn-editar', function() {
            const estudianteId = $(this).data('estudiante');
            const calificaciones = $(this).data('calificaciones');
            const fila = $(this).closest('tr');

            // Obtener datos del estudiante
            const cedula = fila.find('td:eq(0)').text();
            const nombre = fila.find('td:eq(1)').text();
            const gradoId = fila.data('grado-id');
            const materiaId = fila.data('materia-id');
            const profesorId = fila.data('profesor-id');

            // Llenar datos estáticos del modal
            $('#estudianteId').val(estudianteId);
            $('#gradoId').val(gradoId);
            $('#materiaId').val(materiaId);
            $('#profesorId').val(profesorId);
            $('#nombreEstudiante').text(nombre);
            $('#cedulaEstudiante').text(cedula);

            // Generar campos de calificaciones dinámicamente
            const camposCalificaciones = $('#camposCalificaciones');
            camposCalificaciones.empty();

            if (calificaciones && calificaciones.length > 0) {
                calificaciones.forEach((calificacion, index) => {
                    camposCalificaciones.append(`
                    <div class="mb-3">
                        <label for="calificacion-${index}" class="form-label">
                            Calificación ${index + 1} (Lapso: ${calificacion.lapso})
                        </label>
                        <input type="number" class="form-control calificacion-input" 
                               id="calificacion-${index}" name="calificaciones[${index}][valor]"
                               min="0" max="20" step="0.01" value="${calificacion.valor}">
                        <input type="hidden" name="calificaciones[${index}][id]" value="${calificacion.id}">
                        <input type="hidden" name="calificaciones[${index}][lapso]" value="${calificacion.lapso}">
                    </div>
                `);
                });
            } else {
                camposCalificaciones.append('<p>No hay calificaciones registradas</p>');
            }

            // Mostrar el modal
            $('#editarCalificacionesModal').modal('show');
        });

        // Manejar el guardado de cambios
        $('#guardarCambios').click(function() {
            const formData = $('#formEditarCalificaciones').serialize();

            $.ajax({
                url: '../AJAX/AJAX_Calificaciones/editarCalificacion.php',
                method: 'POST',
                data: formData,
                dataType: 'json', // Asegura que jQuery parseé la respuesta como JSON
                beforeSend: function() {
                    $('#guardarCambios').prop('disabled', true).html(
                        '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Guardando...'
                    );
                },
                success: function(response) {
                    // Verificar si la respuesta es un string y necesita ser parseada
                    if (typeof response === 'string') {
                        try {
                            response = JSON.parse(response);
                        } catch (e) {
                            console.error('Error parsing JSON:', e);
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Formato de respuesta inválido del servidor',
                                confirmButtonText: 'Entendido'
                            });
                            return;
                        }
                    }

                    if (response.success) {
                        // Construir mensaje detallado
                        let mensaje = response.message;

                        // Agregar información adicional si existe
                        if (response.materiaPendiente) {
                            mensaje += "\n\nEstado materia pendiente:";
                            mensaje += "\n- Acción realizada: " + (response.materiaPendiente.accionRealizada || 'ninguna');
                            mensaje += "\n- Promedio anterior: " + (response.materiaPendiente.promedioAnterior || 'N/A');
                            mensaje += "\n- Promedio nuevo: " + (response.materiaPendiente.promedioNuevo || 'N/A');
                        }

                        Swal.fire({
                            icon: 'success',
                            title: '¡Éxito!',
                            html: mensaje.replace(/\n/g, '<br>'), // Convertir saltos de línea a <br>
                            timer: 4000, // Un poco más de tiempo para leer
                            timerProgressBar: true,
                            showConfirmButton: true // Permitir cerrar manualmente
                        }).then(() => {
                            $('#editarCalificacionesModal').modal('hide');
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.message || 'Error al actualizar calificaciones',
                            confirmButtonText: 'Entendido'
                        });
                    }
                },
                error: function(xhr) {
                    let errorMsg = 'Ocurrió un error al conectar con el servidor: ' + xhr.statusText;
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMsg = xhr.responseJSON.message;
                    }

                    Swal.fire({
                        icon: 'error',
                        title: 'Error de conexión',
                        text: errorMsg,
                        confirmButtonText: 'Entendido'
                    });
                },
                complete: function() {
                    $('#guardarCambios').prop('disabled', false).text('Guardar Cambios');
                }
            });
        });
    });
</script>