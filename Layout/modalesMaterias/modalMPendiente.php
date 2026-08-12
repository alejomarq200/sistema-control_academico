<!-- Modal -->
<div class="modal fade" id="calificacionesModal" tabindex="-1" aria-labelledby="calificacionesModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="calificacionesModalLabel">Registrar Calificaciones</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Estudiante:</label>
                    <input type="hidden" class="form-control" id="idProfesor" readonly>
                    <input type="text" class="form-control" id="modalEstudiante" readonly>
                    <input type="hidden" class="form-control" id="idEstudiante" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Materia:</label>
                    <input type="text" class="form-control" id="modalMateria" readonly>
                    <input type="hidden" class="form-control" id="idMateria" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Grado:</label>
                    <input type="text" class="form-control" id="modalGrado" readonly>
                    <input type="hidden" class="form-control" id="idGrado" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Cantidad de calificaciones:</label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="cantidadCalificaciones" min="1" max="10" required>
                        <button class="btn btn-primary" id="generarInputs">Generar</button>
                    </div>
                </div>
                <div id="inputsContainer"></div>

                <div class="mb-3">
                    <label class="form-label">Promedio:</label>
                    <input type="number" class="form-control" name="promedio" id="promedio" readonly step="0.01">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success" id="guardarCalificaciones">Guardar</button>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Función para mostrar errores de validación
        function showError(input, message) {
            input.classList.add('is-invalid');
            const feedback = input.nextElementSibling;
            if (feedback && feedback.classList.contains('invalid-feedback')) {
                feedback.textContent = message;
                feedback.style.display = 'block';
            }
        }

        // Función para limpiar errores de validación
        function clearError(input) {
            input.classList.remove('is-invalid');
            const feedback = input.nextElementSibling;
            if (feedback && feedback.classList.contains('invalid-feedback')) {
                feedback.style.display = 'none';
            }
        }

        // Función para validar un campo numérico con rango
        function validateNumberInput(input, min, max) {
            const value = parseFloat(input.value);
            if (isNaN(value) || input.value.trim() === '') {
                showError(input, 'Este campo es requerido');
                return false;
            }
            if (value < min || value > max) {
                showError(input, `El valor debe estar entre ${min} y ${max}`);
                return false;
            }
            clearError(input);
            return true;
        }

        // Activar modal y cargar datos
        document.querySelectorAll('.btn-danger').forEach(button => {
            button.addEventListener('click', function() {
                const promedio = this.getAttribute('data-promedio');
                const idEstudiante = this.getAttribute('data-idEstudiante');
                const estado = this.getAttribute('data-estado');


                if (promedio >= 10 && estado == 'pendiente') {
                    Swal.fire({
                        title: "¡Atención!",
                        text: "Calificaciones mayores o iguales a 10 no se pueden cambiar el estado a 'repetido'",
                        icon: "warning"
                    });
                } else if (promedio <= 10 && estado == 'repetida' || promedio >= 10 && estado == 'repetida') {
                    Swal.fire({
                        title: "¡Atención!",
                        text: "Las calificaciones con estado 'repetido' no se pueden cambiar de estado",
                        icon: "warning"
                    });
                } else if (promedio <= 10 && estado == 'recuperada' || promedio >= 10 && estado == 'recuperada') {
                Swal.fire({
                        title: "¡Atención!",
                        text: "Las calificaciones con estado 'recuperada' no se pueden cambiar de estado",
                        icon: "warning"
                    });
                } else {
                    Swal.fire({
                        title: "¿Esta seguro de realizar ésta acción?",
                        text: "Esta acción es irreversible. Se cambiará el estado de la materia a 'Repetida'",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#122e49ff",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Cambiar",
                        cancelButtonText: "Cancelar"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            var url = "../AJAX/AJAX_Materias/cambiarEstadoMP.php";
                            // Obtiene el data-id del botón que se hizo clic
                            $.ajax({
                                type: "POST",
                                url: url,
                                data: {
                                    idEstudiante: idEstudiante
                                },
                                success: function(data) {
                                    location.href = "materia_pendiente.php";
                                },
                                error: function(xhr, status, error) {
                                    console.error("Error:", error);
                                }
                            });
                        }
                    });
                }
            });
        });

        // Activar modal y cargar datos
        document.querySelectorAll('.btn-success[data-cEstudiante]').forEach(button => {
            button.addEventListener('click', function() {
                const cedula = this.getAttribute('data-cEstudiante');
                const nombre = this.getAttribute('data-nEstudiante');
                const materia = this.getAttribute('data-nMateria');
                const grado = this.getAttribute('data-nGrado');

                const idEstudiante = this.getAttribute('data-idEstudiante');
                const idMateria = this.getAttribute('data-idMateria');
                const idGrado = this.getAttribute('data-idGrado');
                const idProfesor = this.getAttribute('data-idProfesor');

                // Llenar datos en el modal
                document.getElementById('modalEstudiante').value = nombre;
                document.getElementById('modalMateria').value = materia;
                document.getElementById('modalGrado').value = grado;

                //
                document.getElementById('idEstudiante').value = idEstudiante;
                document.getElementById('idMateria').value = idMateria;
                document.getElementById('idGrado').value = idGrado;
                document.getElementById('idProfesor').value = idProfesor;
                // Limpiar inputs anteriores
                document.getElementById('inputsContainer').innerHTML = '';
                document.getElementById('promedio').value = '';
                // Mostrar modal
                const modal = new bootstrap.Modal(document.getElementById('calificacionesModal'));
                modal.show();
            });
        });

        // Generar inputs dinámicos con mejor validación
        document.getElementById('generarInputs').addEventListener('click', function() {
            const cantidadInput = document.getElementById('cantidadCalificaciones');
            if (!validateNumberInput(cantidadInput, 1, 5)) return;

            const cantidad = parseInt(cantidadInput.value);
            const container = document.getElementById('inputsContainer');
            container.innerHTML = '';

            for (let i = 1; i <= cantidad; i++) {
                const group = document.createElement('div');
                group.className = 'form-group';

                group.innerHTML = `
                <label class="form-label">Calificación ${i}:</label>
                <input type="number" class="form-control calificacion-input" 
                       min="0" max="20" step="0.01" required>
                <div class="invalid-feedback">La calificación debe estar entre 0 y 20</div>
            `;

                const input = group.querySelector('.calificacion-input');
                input.addEventListener('input', function() {
                    validateNumberInput(this, 0, 20);
                    calcularPromedio();
                });

                container.appendChild(group);
            }
        });

        // Función para calcular el promedio (mejorada)
        function calcularPromedio() {
            const inputs = document.querySelectorAll('.calificacion-input');
            let total = 0;
            let cantidadValidas = 0;
            let allValid = true;

            inputs.forEach(input => {
                const isValid = validateNumberInput(input, 0, 20);
                if (!isValid) allValid = false;

                const valor = parseFloat(input.value);
                if (!isNaN(valor) && valor >= 0 && valor <= 20) {
                    total += valor;
                    cantidadValidas++;
                }
            });

            if (cantidadValidas > 0 && allValid) {
                const promedio = total / cantidadValidas;
                document.getElementById('promedio').value = promedio.toFixed(2);
            } else {
                document.getElementById('promedio').value = '';
            }
        }

        // Validación mejorada al guardar
        document.getElementById('guardarCalificaciones').addEventListener('click', function() {
            // Validar cantidad de calificaciones
            const cantidadInput = document.getElementById('cantidadCalificaciones');
            if (!validateNumberInput(cantidadInput, 1, 5)) {
                alert('Por favor corrija la cantidad de calificaciones');
                return;
            }

            // Validar todas las calificaciones
            const inputs = document.querySelectorAll('.calificacion-input');
            let allValid = true;

            inputs.forEach(input => {
                if (!validateNumberInput(input, 0, 20)) {
                    allValid = false;
                }
            });

            if (!allValid) {
                alert('Por favor corrija las calificaciones marcadas en rojo');
                return;
            }

            // Verificar que hay al menos una calificación válida
            if (inputs.length === 0) {
                alert('Debe generar al menos una calificación');
                return;
            }

            // Validar que el promedio sea un número válido
            const promedio = parseFloat(document.getElementById('promedio').value);
            if (isNaN(promedio)) {
                alert('Error al calcular el promedio. Verifique las calificaciones.');
                return;
            }

            // Obtener los datos necesarios
            const idEstudiante = document.getElementById('idEstudiante').value;
            const idMateria = document.getElementById('idMateria').value;
            const idGrado = document.getElementById('idGrado').value;
            const idProfesor = document.getElementById('idProfesor').value;

            // Recolectar calificaciones (versión mejorada)
            const calificaciones = [];
            document.querySelectorAll('.form-group').forEach((group, index) => {
                const input = group.querySelector('.calificacion-input');
                if (input) {
                    calificaciones.push({
                        id: index + 1, // O usa un sistema de IDs más robusto si es necesario
                        calificacion: parseFloat(input.value)
                    });
                }
            });

            // Mostrar confirmación antes de enviar
            if (!confirm('¿Está seguro que desea guardar estas calificaciones?')) {
                return;
            }

            // Enviar datos al servidor (código existente mejorado)
            fetch('../AJAX/AJAX_Calificaciones/act_materiaPendiente.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        idEstudiante: idEstudiante,
                        idMateria: idMateria,
                        idGrado: idGrado,
                        idProfesor: idProfesor,
                        promedio: promedio,
                        calificaciones: calificaciones
                    })
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`Error HTTP: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            title: "Éxito!",
                            text: data.message,
                            icon: "success"
                        });
                        const modal = bootstrap.Modal.getInstance(document.getElementById('calificacionesModal'));
                        modal.hide();
                        location.reload();
                    } else {
                        throw new Error(data.message || 'Error desconocido del servidor');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        title: "Error!",
                        text: error.message,
                        icon: "error"
                    });
                });
        });
    });

      const añoActual = new Date().getFullYear();
    $('#anio_escolar').val(`${añoActual}-${añoActual + 1}`);

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
</script>