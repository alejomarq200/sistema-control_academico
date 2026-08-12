    $(document).ready(function() {
        $('.search-box input[type="text"]').on("keyup input", function() {
            var inputVal = $(this).val();
            var resultDropdown = $(this).siblings(".result");
            if (inputVal.length) {
                $.get("backend-search.php", {
                    term: inputVal
                }).done(function(data) {
                    // Display the returned data in browser
                    resultDropdown.html(data);
                });
            } else {
                resultDropdown.empty();
            }
        });

        // Set search input value on click of result item
        $(document).on("click", ".result p", function() {
            $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
            $(this).parent(".result").empty();
        });
    });
    document.getElementById("infoEstudiante").addEventListener("submit", function(event) {
        event.preventDefault();
        // Array con todos los campos a validar
        const campos = [{
                id: 'categoriaGrado',
                nombre: 'Nivel'
            },
            {
                id: 'nombreGrado',
                nombre: 'Grado'
            },
            {
                id: 'docente',
                nombre: 'Docente'
            },
            {
                id: 'materias',
                nombre: 'Asignatura'
            },
            {
                id: 'tipoContenido',
                nombre: 'Tipo Contenido'
            },

        ];

        let camposInvalidos = [];
        let primerCampoInvalido = null;

        // Validar cada campo
        campos.forEach(campo => {
            const elemento = document.getElementById(campo.id);
            const valor = elemento ? elemento.value.trim() : '';

            if (!valor || valor === "Seleccionar") {
                camposInvalidos.push(campo.nombre);

                // Resaltar campo inválido
                elemento.style.borderColor = '#ff9800';
                elemento.style.boxShadow = '0 0 0 2px rgba(255, 152, 0, 0.2)';

                // Guardar el primer campo inválido para enfocarlo
                if (!primerCampoInvalido) {
                    primerCampoInvalido = elemento;
                }
            } else {
                // Restablecer estilos si es válido
                elemento.style.borderColor = '';
                elemento.style.boxShadow = '';
            }
        });

        // Si hay campos inválidos
        if (camposInvalidos.length > 0) {
            if (primerCampoInvalido) {
                primerCampoInvalido.focus();
            }

            Swal.fire({
                icon: 'warning',
                title: 'Campos requeridos',
                html: `Los siguientes campos son obligatorios:<br><br>- ${camposInvalidos.join('<br>- ')}`,
                confirmButtonColor: '#f0ad4e'
            });
            return false;
        }

        // Si todo está válido, enviar el formulario
        this.submit();
    });

    function validarNota(inputElement, valorPermitido) {
        const valorIngresado = inputElement.value.trim().toUpperCase();
        const fila = inputElement.closest('tr');
        const inputsFila = fila.querySelectorAll('.input-table');

        // Validación del valor permitido
        if (valorIngresado === valorPermitido) {
            inputElement.style.borderColor = "green";
            inputElement.setCustomValidity("");

            // Deshabilitar otros inputs si este tiene valor
            if (valorIngresado !== "") {
                inputsFila.forEach(input => {
                    if (input !== inputElement) {
                        input.disabled = true;
                        input.value = ""; // Limpiar otros campos
                        input.style.borderColor = ""; // Resetear borde
                    }
                });
            } else {
                // Si se borra, habilitar todos
                inputsFila.forEach(input => {
                    input.disabled = false;
                });
            }

            return true;
        } else if (valorIngresado === "") {
            // Si está vacío, habilitar todos
            inputsFila.forEach(input => {
                input.disabled = false;
                input.style.borderColor = "";
            });
            return false;
        } else {
            // Valor incorrecto
            inputElement.style.borderColor = "red";
            inputElement.setCustomValidity(`Solo se permite: ${valorPermitido}`);
            inputElement.reportValidity();
            return false;
        }
    }

    $(document).ready(function() {
        // Calcular y asignar el año escolar
        const añoActual = new Date().getFullYear();
        $('#anio_escolar').val(`${añoActual}-${añoActual + 1}`);


        $(document).on('click', '.btn-guardar', function() {
            const $tr = $(this).closest('tr');
            const $btn = $(this);
            //$btn.prop('disabled', true).html('<i class="bi bi-hourglass"></i> Procesando...');

            // Obtener datos de la fila
            const estudianteId = $tr.data('estudiante-id');
            const gradoId = $tr.data('grado-id');
            const materiaId = $tr.data('materia-id');
            const profesorId = $tr.data('profesor-id');
            const lapso = $('#selectLapso').val();
            const anioEscolar = $('#anio_escolar').val();
            const actividad = document.getElementById('contenido').dataset.valor;

            // Obtener la calificación seleccionada
            let calificacion = '';
            let columnaSeleccionada = '';

            // Asegurarse que sea un número
            if (!/^\d+$/.test(actividad)) {
                Swal.fire('Error', 'El contenido debe ser un número válido', 'error');
                return;
            }

            // Buscar qué input tiene valor en esta fila
            $tr.find('.input-table').each(function() {
                const valor = $(this).val().trim();
                if (valor !== '') {
                    calificacion = valor;
                    columnaSeleccionada = $(this).data('columna'); // EX, MB, B o DM
                }
            });

            // Validar que se haya seleccionado una calificación
            if (calificacion === '') {
                Swal.fire('Error', 'Debe seleccionar una calificación para el estudiante', 'error');
                $btn.prop('disabled', false).html('<i class="bi bi-save"></i> Guardar');
                return;
            }

            // Validar que la calificación coincida con la columna
            if (calificacion !== columnaSeleccionada) {
                Swal.fire('Error', `La calificación debe ser exactamente "${columnaSeleccionada}" para esta columna`, 'error');
                $btn.prop('disabled', false).html('<i class="bi bi-save"></i> Guardar');
                return;
            }

            // Preparar datos para enviar
            const datos = {
                estudiante_id: estudianteId,
                grado_id: gradoId,
                materia_id: materiaId,
                profesor_id: profesorId,
                lapso: lapso,
                anio_escolar: anioEscolar,
                calificacion: calificacion,
                actividad: actividad,
                accion: 'guardar_calificacion'
            };

            $.ajax({
                url: '../AJAX/AJAX_Calificaciones/guardarNota.php',
                type: 'POST',
                data: datos,
                dataType: 'json',
                success: function(response) {
                    if (response.type === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: response.message,
                            timer: 2000,
                            showConfirmButton: false
                        });
                        // Opcional: Limpiar campos después de guardar
                        $tr.find('.input-table').val('').prop('disabled', false).css('border-color', '');
                    } else if (response.type === 'warning') {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Advertencia',
                            text: response.message,
                            showConfirmButton: true,
                            confirmButtonText: 'Entendido'
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.message,
                            showConfirmButton: true
                        });
                    }
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error de conexión',
                        text: 'No se pudo contactar al servidor: ' + xhr.statusText,
                        showConfirmButton: true
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

    function buscarActividadxAsignatura() {
        $.ajax({
            url: "../AJAX/AJAX_Calificaciones/actividadxAsignatura.php",
            type: "POST",
            data: $("#infoEstudiante").serialize(),
            success: function(resultado) {
                $("#contenidos").html(resultado);
            },
            error: function(xhr, status, error) {
                console.error("Error en la solicitud AJAX:", error);
            }
        });
    }

    function buscarTipoContenidoxAsignatura() {
        $.ajax({
            url: "../AJAX/AJAX_Calificaciones/contenidoxAsignatura.php",
            type: "POST",
            data: $("#infoEstudiante").serialize(),
            success: function(resultado) {
                $("#tipoContenido").html(resultado);
            },
            error: function(xhr, status, error) {
                console.error("Error en la solicitud AJAX:", error);
            }
        })
    }
