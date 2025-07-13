<!-- Modal para editar calificaciones -->
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
    document.addEventListener("DOMContentLoaded", function () {
        // Delegación de evento para botones editar
        document.querySelectorAll(".btn-editar").forEach(button => {
            button.addEventListener("click", function () {
                const estudianteId = this.dataset.estudiante;
                const calificaciones = JSON.parse(this.dataset.calificaciones);
                const tr = this.closest("tr");

                // Obtener datos desde los atributos del <tr>
                const gradoId = tr.dataset.gradoId;
                const materiaId = tr.dataset.materiaId;
                const profesorId = tr.dataset.profesorId;
                const cedula = tr.children[0].textContent.trim();
                const nombres = tr.children[1].textContent.trim();
                const apellidos = tr.children[2].textContent.trim();

                // Asignar datos al modal
                document.getElementById("estudianteId").value = estudianteId;
                document.getElementById("gradoId").value = gradoId;
                document.getElementById("materiaId").value = materiaId;
                document.getElementById("profesorId").value = profesorId;

                document.getElementById("nombreEstudiante").textContent = `${nombres} ${apellidos}`;
                document.getElementById("cedulaEstudiante").textContent = cedula;

                // Generar inputs de calificaciones
                const contenedor = document.getElementById("camposCalificaciones");
                contenedor.innerHTML = ""; // Limpiar anteriores

                if (Array.isArray(calificaciones)) {
                    calificaciones.forEach(c => {
                        const grupo = document.createElement("div");
                        grupo.className = "mb-3";

                        grupo.innerHTML = `
                        <label class="form-label">${c.contenido}</label>
                        <input type="hidden" name="calificaciones[${c.id}][id]" value="${c.id}">
                        <input type="text" class="form-control calificacion-input" 
                        name="calificaciones[${c.id}][valor]" 
                        value="${c.calificacion}" 
                        pattern="EX|MB|B|DM" 
                        title="Valores válidos: EX, MB, B, DM" onkeyup="this.value = this.value.toUpperCase();"
                        required>
                `;

                        contenedor.appendChild(grupo);
                    });
                }

                // Mostrar modal
                const modal = new bootstrap.Modal(document.getElementById('editarCalificacionesModal'));
                modal.show();
            });
        });

        // Guardar cambios vía AJAX
        document.getElementById("guardarCambios").addEventListener("click", function () {
            const form = document.getElementById("formEditarCalificaciones");
            const formData = new FormData(form);

            const inputs = form.querySelectorAll(".calificacion-input");
            const validValues = ["EX", "MB", "B", "DM"];
            let valid = true;

            inputs.forEach(input => {
                const value = input.value.trim().toUpperCase();
                if (!validValues.includes(value)) {
                    input.classList.add("is-invalid");
                    valid = false;
                } else {
                    input.classList.remove("is-invalid");
                }
            });

            if (!valid) {
                alert("Por favor, ingresa solo valores válidos: EX, MB, B, o DM.");
                return; // No envía si hay errores
            }


            fetch("../AJAX/AJAX_Calificaciones/editarCalificacion_p.php", {
                method: "POST",
                body: formData,
            })
                .then(resp => resp.json())
                .then(data => {
                    if (data.success) {
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
                            text: data.message || 'Error al actualizar calificaciones',
                            confirmButtonText: 'Entendido'
                        });
                    }
                })
                .catch(error => {
                    console.error("Error en AJAX:", error);
                    alert("Ocurrió un error en la solicitud");
                });
        });
    });
</script>