<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/modalesMaterias/modalEditM.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/modalesAulas/editAulas.css">
</head>

<body>
    <div class="modal fade" id="ModalFormEditaAula" tabindex="-1" aria-labelledby="ModalFormLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-area">
                        <h1 class="text-center">Editar Aulas</h1>
                        <form action="../controller_php/contoller_EditAula.php" method="POST" id="form-EditAula">
                            <div class="mb-1">
                                <input type="text" name="idEditAula" class="input" id="idEditAula">
                            </div>
                            <div class="mb-1">
                                <label for="nombreAula" class="form-label">Nombre del Aula</label>
                                <input type="text" class="form-control" name="nombreAula" id="nombreAula">
                            </div>
                            <p class="errorAulaEdit" id="nombreErrorAula"></p>
                            <div class="mb-1">
                                <label for="capacidadAula" class="form-label">Capacidad del Aula</label>
                                <input type="text" class="form-control" name="capacidadAula" id="capacidadAula">
                            </div>
                            <p class="errorAulaEdit" id="capacidadErrorAula"></p>
                            <div class="mb-1">
                                <label for="gradoAula" class="form-label">Grado</label>
                                <select name="gradoAula" id="gradoAula" class="form-select">
                                    <option value="Seleccionar">Seleccionar</option>
                                    <option value="1er grado">1er grado</option>
                                    <option value="2do grado">2do grado</option>
                                    <option value="3er grado">3er grado</option>
                                    <option value="4to grado">4to grado</option>
                                    <option value="5to grado">5to grado</option>
                                    <option value="6to grado">6to grado</option>
                                    <option value="1er año">1er año</option>
                                    <option value="2do año">2do año</option>
                                    <option value="3er año">3er año</option>
                                    <option value="4to año">4to año</option>
                                    <option value="5to año">5to año</option>
                                </select>
                            </div>
                            <p class="errorAulaEdit" id="gradoErrorAula"></p>
                            <div class="mb-1">
                                <label for="estadoAula" class="form-label">Estado</label>
                                <input type="text" class="form-control" name="estadoAula" id="estadoAula" disabled>
                            </div>
                            <button type="submit" class="btn btn-light mt-2">Editar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var modal = document.getElementById("ModalFormEditaAula");
            var originalValues = {}; // Almacenará los valores originales
            var form = document.getElementById("form-EditAula");
            var isSubmitting = false; // Variable para controlar envíos múltiples

            modal.addEventListener("show.bs.modal", function(event) {
                var button = event.relatedTarget; // Botón que activó el modal

                // Obtener y almacenar los valores originales
                originalValues = {
                    idguia: button.getAttribute("data-id"),
                    nombre: button.getAttribute("data-nombre"),
                    capacidad: button.getAttribute("data-capacidad"),
                    grado: button.getAttribute("data-id_grado"),
                    estado: button.getAttribute("data-estado")
                };

                // Asignar valores a los campos del formulario
                document.getElementById("idEditAula").value = originalValues.idguia;
                document.getElementById("nombreAula").value = originalValues.nombre;
                document.getElementById("capacidadAula").value = originalValues.capacidad;
                document.getElementById("gradoAula").value = originalValues.grado;
                document.getElementById("estadoAula").value = originalValues.estado;

                limpiarErrores();
            });

            function limpiarErrores() {
                document.querySelectorAll(".errorAulaEdit").forEach(el => el.textContent = "");
            }

            function validarCampos() {
                let isValid = true;
                limpiarErrores();

                const regexName = /^[A-Za-zÁ-Úá-úñÑ\s]+\s\d+$/u;
                const regexIdguia = /^[0-9]{1,9}$/;

                let id = document.getElementById("idEditAula").value.trim();
                let nombre = document.getElementById("nombreAula").value.trim();
                let capacidad = document.getElementById("capacidadAula").value.trim();
                let grado = document.getElementById("gradoAula").value.trim();

                // Validación de IDGUIA
                if (!id || !regexIdguia.test(id)) {
                    isValid = false;
                }

                // Validación de nombre
                if (!nombre) {
                    document.getElementById("nombreErrorAula").textContent = "El nombre del aula es obligatorio";
                    isValid = false;
                } else if (!regexName.test(nombre)) {
                    document.getElementById("nombreErrorAula").textContent = "Formato inválido: Ingrese solo letras con espacios y un número al final";
                    isValid = false;
                }
                // Validación de IDGUIA
                if (!capacidad || isNaN(capacidad)) {
                    document.getElementById("capacidadErrorAula").textContent = "Campo capacidad de aula obligatorio";
                    isValid = false;
                }

                if (!grado|| grado === "Seleccionar") {
                    document.getElementById("gradoErrorAula").textContent = "Campo grado de materia obligatorio";
                    isValid = false;
                }

                return isValid;
            }

            function hayCambiosEnCamposCriticos() {
                // Obtener valores actuales del formulario
                const nombreAula = document.getElementById("nombreAula").value.trim();

                // Comparar con los valores originales
                const cambios = {
                    nombre: nombreAula !== originalValues.nombre
                };
                return cambios;
            }

            form.addEventListener("submit", function(event) {
                event.preventDefault();
                if (isSubmitting) return;

                if (!validarCampos()) {
                    return; // Si hay errores de validación, no continuar
                }

                // Verificar si hay cambios en campos críticos
                const cambios = hayCambiosEnCamposCriticos();
                const hayCambiosCriticos = cambios.nombre;

                if (!hayCambiosCriticos) {
                    // No hay cambios en campos críticos - mostrar confirmación directamente
                    mostrarConfirmacion();
                } else {
                    // Hay cambios en campos críticos - validar con AJAX
                    isSubmitting = true;

                    $.ajax({
                        url: "../AJAX/AJAX_Aulas/searchNombreEditAula.php",
                        type: "POST",
                        dataType: 'json', // Esperamos una respuesta JSON
                        data: $(form).serialize(),
                        success: function(response) {
                            if (response.valido) {
                                mostrarConfirmacion();
                            } else {
                                // Mostrar el error al usuario
                                $("#nombreErrorAula").text(response.error);
                                isSubmitting = false;
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("Error en la solicitud AJAX:", status, error);
                            $("#nombreErrorAula").text("Error al validar el nombre del aula");
                            isSubmitting = false;
                        }
                    });
                }
            });

            function mostrarConfirmacion() {
                let titulo = "¿Desea la información del aula seleccionada?";

                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "btn btn-success",
                        cancelButton: "btn btn-danger",
                    },
                    buttonsStyling: false,
                });

                swalWithBootstrapButtons.fire({
                    title: titulo,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Sí, editar!",
                    cancelButtonText: "No, cancelar!",
                    reverseButtons: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Usar AJAX para enviar el formulario
                        $.ajax({
                            url: form.action, // Asegúrate de que el formulario tenga el atributo action
                            type: "POST",
                            data: $(form).serialize(),
                            success: function(response) {
                                swalWithBootstrapButtons.fire({
                                    title: "Acción procesada con éxito",
                                    text: "La información del aula se editó correctamente.",
                                    icon: "success",
                                }).then(() => {
                                    // Recargar la página o redireccionar
                                    form.submit();
                                });
                            },
                            error: function(xhr, status, error) {
                                console.error("Error al enviar el formulario:", error);
                                swalWithBootstrapButtons.fire({
                                    title: "Error",
                                    text: "Ocurrió un error al procesar la solicitud",
                                    icon: "error"
                                });
                            }
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        swalWithBootstrapButtons.fire({
                            title: "Acción cancelada",
                            text: "Se deshizo la acción de editar",
                            icon: "error",
                        });
                        isSubmitting = false;
                    }
                });
            }

            // Ocultar mensajes de error y limpiar el formulario al cerrar la modal
            modal.addEventListener("hidden.bs.modal", function() {
                limpiarErrores();
                form.reset();
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>
</body>

</html>