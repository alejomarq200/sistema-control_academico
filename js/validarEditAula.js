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