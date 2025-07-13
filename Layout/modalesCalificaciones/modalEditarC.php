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
    $(document).ready(function () {
        // Manejar clic en botón editar
        $(document).on('click', '.btn-editar', function () {
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
        $('#guardarCambios').click(function () {
            const formData = $('#formEditarCalificaciones').serialize();

            $.ajax({
                url: '../AJAX/AJAX_Calificaciones/editarCalificacion.php',
                method: 'POST',
                data: formData,
                beforeSend: function () {
                    $('#guardarCambios').prop('disabled', true).html(
                        '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Guardando...'
                    );
                },
                success: function (response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: '¡Éxito!',
                            text: 'Calificaciones actualizadas correctamente',
                            timer: 3000,
                            timerProgressBar: true,
                            showConfirmButton: false
                        }).then(() => {
                            $('#editarCalificacionesModal').modal('hide');
                            // Opción 1: Recargar la página
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
                error: function (xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error de conexión',
                        text: 'Ocurrió un error al conectar con el servidor: ' + xhr.statusText,
                        confirmButtonText: 'Entendido'
                    });
                },
                complete: function () {
                    $('#guardarCambios').prop('disabled', false).text('Guardar Cambios');
                }
            });
        });
    });
</script>