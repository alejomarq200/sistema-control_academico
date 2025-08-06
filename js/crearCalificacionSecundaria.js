 $(document).ready(function() {
        // Calcular y asignar el año escolar
        const añoActual = new Date().getFullYear();
        $('#anio_escolar').val(`${añoActual}-${añoActual + 1}`);

        // Generar columnas de calificaciones al presionar Agregar
        $('#btnAgregarColumnas').click(function() {
            const numCalificaciones = parseInt($('#numCalificaciones').val()) || 1;

            // Limpiar encabezados y columnas de calificaciones existentes
            $('#calificaciones-table thead tr th.calificacion-col').remove();
            $('#calificaciones-table tbody tr td.calificacion-col').remove();

            // Crear encabezados de calificaciones
            let headers = '';
            for (let i = 1; i <= numCalificaciones; i++) {
                headers += `<th class="calificacion-col">Calif. ${i}</th>`;
            }

            // Insertar encabezados después de "Total"
            $('#calificaciones-table thead tr th:nth-child(4)').after(headers);

            // Insertar inputs en cada fila
            $('#calificaciones-table tbody tr').each(function() {
                const $tr = $(this);
                let inputs = '';
                for (let i = 1; i <= numCalificaciones; i++) {
                    inputs += `<td class="calificacion-col">
                               <input type="number" class="form-control calificacion" 
                                      min="1" max="20" step="0.01" data-indice="${i}">
                           </td>`;
                }
                $tr.find('td:nth-child(4)').after(inputs);
            });

        });

        //Controlamos totales en un rango permitido
        $(document).on('input', '.calificacion', function() {
            const valor = parseFloat($(this).val());
            if (valor > 20) {
                $(this).val(20); // limitar al valor máximo
            } else if (valor < 1) {
                $(this).val(1); // limitar al valor mínimo
            }
        });


        // Calcular promedio en tiempo real
        $(document).on('input', '.calificacion', function() {
            const $tr = $(this).closest('tr');
            let suma = 0;
            let cantidad = 0;

            $tr.find('.calificacion').each(function() {
                const valor = parseFloat($(this).val()) || 0;
                suma += valor;
                cantidad++;
            });

            const promedio = cantidad > 0 ? (suma / cantidad).toFixed(2) : '0.00';
            $tr.find('.total').text(promedio);
        });

        $(document).on('click', '.btn-guardar', function() {
            const $tr = $(this).closest('tr');

            const estudianteId = $tr.data('estudiante-id');
            const gradoId = $tr.data('grado-id');
            const materiaId = $tr.data('materia-id');
            const profesorId = $tr.data('profesor-id');
            const total = $tr.find('.total').text();
            const lapso = $('#selectLapso').val();
            const anioEscolar = $('#anio_escolar').val();

            const calificaciones = [];
            console.log(total);
            // Asumo que tienes inputs con clase .calificacion en cada fila para capturar las notas
            $tr.find('.calificacion').each(function() {
                calificaciones.push(parseFloat($(this).val()) || 0);
            });

            if (calificaciones.length === 0) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Advertencia',
                    text: 'Debes generar las columnas de calificación primero.',
                    confirmButtonColor: '#3085d6'
                });
                return;
            }

            $.ajax({
                url: "../AJAX/AJAX_Calificaciones/guardarCalificacion.php",
                type: 'POST',
                data: {
                    estudiante_id: estudianteId,
                    grado_id: gradoId,
                    lapso_academico: lapso,
                    profesor_id: profesorId,
                    materia_id: materiaId,
                    anioEscolar: anioEscolar,
                    calificaciones: calificaciones,
                    total: total
                },
                success: function(respuesta) {
                    if (respuesta.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Guardado',
                            text: respuesta.message,
                            confirmButtonColor: '#3085d6'
                        });
                    } else if (respuesta.error && respuesta.message.includes('Ya existe un registro')) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Atención',
                            text: respuesta.message,
                            confirmButtonColor: '#f0ad4e' // color tipo warning (amarillo)
                        });
                    } else if (respuesta.error && respuesta.message.includes('Su materia se registró ')) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Atención',
                            text: respuesta.message,
                            confirmButtonColor: '#f0ad4e' // color tipo warning (amarillo)
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: respuesta.message || 'Error desconocido',
                            confirmButtonColor: '#d33'
                        });
                    }

                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Hubo un problema al guardar las calificaciones',
                        confirmButtonColor: '#d33'
                    });
                }
            });
        });

    });


    function buscarGradodeMaterias() {
        const categoriaGrado = document.getElementById('categoriaGrado').value.trim();
        $.ajax({
            url: "../AJAX/AJAX_Grados/searchGradoxMateria.php",
            type: "POST",
            data: $("#infoEstudiante").serialize(),
            success: function(resultado) {
                $("#nombreGrado").html(resultado);
            },
            error: function(xhr, status, error) {
                console.error("Error en la solicitud AJAX:", error);
            }
        });
    }

    function cargarSelectMateriasxProfesor() {
        $.ajax({
            type: "POST",
            url: "../AJAX/AJAX_Calificaciones/consultarPrCalificacion.php",
            data: $("#infoEstudiante").serialize(),
            success: function(resultado) {
                $("#docente").html(resultado);
                cargarProfesorxGrado();
            },
            error: function(xhr, status, error) {
                console.error("Error en la solicitud AJAX:", error);
            }
        });
    }

    function cargarProfesorxGrado() {
        $.ajax({
            type: "POST",
            url: "../AJAX/AJAX_Calificaciones/consultarPrDocente.php",
            data: $("#infoEstudiante").serialize(),
            success: function(resultado) {
                $("#materias").html(resultado);
            },
            error: function(xhr, status, error) {
                console.error("Error en la solicitud AJAX:", error);
            }
        });
    }