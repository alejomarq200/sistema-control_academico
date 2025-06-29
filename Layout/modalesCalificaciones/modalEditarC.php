<!-- Modal -->
<style>
    .error {
        text-align: left;
        padding-left: 0;
        color: red;
        font-size: 0.85rem;
        margin-top: 0.1rem;
        margin-bottom: 0.5rem;
    }
</style>
<div class="modal fade" id="modalEditar" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form id="formEditarCalificacion" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Calificaciones</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="contenedorCalificaciones">
                <!-- Aquí se cargan dinámicamente los campos -->
            </div>
            <div class="modal-footer">
                <div class="d-flex justify-content-between w-100 align-items-center">
                    <div class="promedio-container">
                        <strong>Promedio:</strong>
                        <input type="number" id="promedioCalculado" class="form-control d-inline-block ms-2"
                            style="width: 80px;" readonly>
                        <input type="hidden" name="total_calificacion" id="totalCalificacion">
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Eventos para botones de edición
        document.querySelectorAll('.btn-editar').forEach(button => {
            button.addEventListener('click', function () {
                const ids = JSON.parse(this.dataset.ids);
                const valores = JSON.parse(this.dataset.valores);
                const idEstudiante = this.dataset.est;
                const idMateria = this.dataset.mat;

                const contenedor = document.getElementById('contenedorCalificaciones');
                contenedor.innerHTML = '';

                // Agregar campos ocultos con información importante
                contenedor.innerHTML += `
                <input type="hidden" name="id_estudiante" value="${idEstudiante}">
                <input type="hidden" name="id_materia" value="${idMateria}">
            `;

                // Crear inputs para cada calificación
                ids.forEach((id, index) => {
                    const div = document.createElement('div');
                    div.classList.add('mb-2');
                    div.innerHTML = `
                    <input type="hidden" name="id_calif[]" value="${id}">
                    <label>Calificación ${index + 1}:</label>
                    <input type="number" name="valor_calif[]" value="${valores[index]}" 
                           class="form-control calificacion-input" min="0" max="20" step="0.01" required>
                `;
                    contenedor.appendChild(div);
                });

                // Calcular promedio inicial
                calcularPromedio();

                // Mostrar modal
                const modal = new bootstrap.Modal(document.getElementById('modalEditar'));
                modal.show();
            });
        });

        // Calcular promedio cuando cambian los inputs
        document.addEventListener('input', function (e) {
            if (e.target.classList.contains('calificacion-input')) {
                calcularPromedio();
            }
        });

        // Función para calcular el promedio
        function calcularPromedio() {
            const inputs = document.querySelectorAll('.calificacion-input');
            let suma = 0;
            let contador = 0;

            inputs.forEach(input => {
                const value = parseFloat(input.value);
                if (!isNaN(value) && value >= 0 && value <= 20) {
                    suma += value;
                    contador++;
                }
            });

            const promedio = contador > 0 ? (suma / contador) : 0;
            const promedioRedondeado = Math.round(promedio * 100) / 100;

            document.getElementById('promedioCalculado').value = promedioRedondeado;
            document.getElementById('totalCalificacion').value = promedioRedondeado;
        }

        // Manejar el envío del formulario
        document.getElementById('formEditarCalificacion').addEventListener('submit', async function (e) {
            e.preventDefault();

            // Validación
            const inputs = document.querySelectorAll('.calificacion-input');
            let valid = true;

            inputs.forEach(input => {
                const value = parseFloat(input.value);
                if (isNaN(value) || value < 0 || value > 20) {
                    input.classList.add('is-invalid');
                    valid = false;
                } else {
                    input.classList.remove('is-invalid');
                }
            });

            if (!valid) {
                Swal.fire({
                    title: 'Error',
                    text: 'Por favor ingrese calificaciones válidas (0-20)',
                    icon: 'error'
                });
                return;
            }

            try {
                // Mostrar carga
                Swal.fire({
                    title: 'Procesando',
                    html: 'Actualizando calificaciones...',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                const formData = new FormData(this);

                // Verificar datos en consola (solo para desarrollo)
                console.log('Datos enviados:', Object.fromEntries(formData.entries()));

                const response = await fetch('../AJAX/AJAX_Calificaciones/editarCalificacion.php', {
                    method: 'POST',
                    body: formData
                });

                const data = await response.json();

                if (!response.ok) {
                    throw new Error(data.message || 'Error en la respuesta del servidor');
                }

                if (data.success) {
                    Swal.fire({
                        title: '¡Éxito!',
                        text: data.message || 'Calificaciones actualizadas correctamente',
                        icon: 'success'
                    }).then(() => {
                        // Cerrar modal y recargar
                        const modal = bootstrap.Modal.getInstance(document.getElementById('modalEditar'));
                        modal.hide();
                        location.reload();
                    });
                } else {
                    throw new Error(data.message || 'Error al actualizar las calificaciones');
                }
            } catch (error) {
                console.error('Error:', error);
                Swal.fire({
                    title: 'Error',
                    text: error.message,
                    icon: 'error'
                });
            }
        });
    });
</script>