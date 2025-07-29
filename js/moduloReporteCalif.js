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