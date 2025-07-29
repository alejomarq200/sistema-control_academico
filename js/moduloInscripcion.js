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