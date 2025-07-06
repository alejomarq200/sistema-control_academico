 function contarCaracteres() {
            const textarea = document.getElementById('contenidoEdit');
            const contador = document.getElementById('contador');
            const charCounter = contador.parentElement;
            const caracteres = textarea.value.length;

            contador.textContent = caracteres;

            // Cambiar colores según se acerca al límite
            charCounter.classList.remove('warning', 'error');

            if (caracteres > 180) {
                charCounter.classList.add('warning');
            }

            if (caracteres >= 200) {
                charCounter.classList.add('error');
            }
        }

        document.addEventListener("DOMContentLoaded", function () {
            var modal = document.getElementById("ModalFormAEdit");
            var originalValues = {}; // Almacenará los valores originales
            var form = document.getElementById("form-EditActividad");
            var isSubmitting = false; // Variable para controlar envíos múltiples

            modal.addEventListener("show.bs.modal", function (event) {
                var button = event.relatedTarget; // Botón que activó el modal

                // Obtener y almacenar los valores originales
                originalValues = {
                    IDGUIA: button.getAttribute("data-id"),
                    nombreG: button.getAttribute("data-nombreG"),
                    nombreM: button.getAttribute("data-nombreM"),
                    nombreP: button.getAttribute("data-nombreP"),
                    contenido: button.getAttribute("data-contenido"),
                };

                // Asignar valores a los campos del formulario
                document.getElementById("idEditA").value = originalValues.IDGUIA;
                document.getElementById("nombreGradoEdit").value = originalValues.nombreG;
                document.getElementById("nombreAsigEdit").value = originalValues.nombreM;
                document.getElementById("nombreProfesorEdit").value = originalValues.nombreP;
                document.getElementById("contenidoEdit").value = originalValues.contenido;
            });

            function limpiarErrores() {
                document.querySelectorAll(".errorAEdit").forEach(el => el.textContent = "");
            }

            function validarCampos() {
                let isValid = true;

                const regexName = /^[A-Za-zÑñÁÉÍÓÚáéíóú\s'-]+$/;
                const regexIdguia = /^[0-9]{1,9}$/;

                let idguia = document.getElementById("idEditA").value.trim();
                let nombreG = document.getElementById("nombreGradoEdit").value.trim();
                let nombreA = document.getElementById("nombreAsigEdit").value.trim();
                let nombreP = document.getElementById("nombreProfesorEdit").value.trim();
                let conteido = document.getElementById("contenidoEdit").value.trim();

                // Validación de IDGUIA
                if (!idguia || !regexIdguia.test(idguia)) {
                    isValid = false;
                }

                if (!nombreG) {
                    document.getElementById("nombreGradoEditError").textContent = "El nombre del grado es obligatorio";
                    isValid = false;
                } else {
                    document.getElementById("nombreGradoEditError").textContent = "";
                }

                if (!nombreA) {
                    document.getElementById("nombreAsigEditError").textContent = "Campo nivel de las asignatura es obligatorio";
                    isValid = false;
                } else if (!regexName.test(nombreA)) {
                    document.getElementById("nombreAsigEditError").textContent = "Formato inválido: Admite letras y espacios";
                    isValid = false;
                } else {
                    document.getElementById("nombreAsigEditError").textContent = "";
                }

                if (!nombreP) {
                    document.getElementById("nombreProfesorEditError").textContent = "El nombre del profesor es obligatorio";
                    isValid = false;
                } else {
                    document.getElementById("nombreProfesorEditError").textContent = "";
                }

                if (!conteido) {
                    document.getElementById("contenidoEditError").textContent = "Campo del contendido es obligatorio";
                    isValid = false;
                } else {
                    document.getElementById("contenidoEditError").textContent = "";
                }
                return isValid;
            }

            function hayCambiosEnCamposCriticos() {
                // Obtener valores actuales del formulario
                const contenidoActual = document.getElementById("contenidoEdit").value.trim();

                // Comparar con los valores originales
                const cambios = {
                    contenido: contenidoActual !== originalValues.contenido,
                };
                return cambios;
            }

            form.addEventListener("submit", function (event) {
                event.preventDefault();
                if (isSubmitting) return;

                if (!validarCampos()) {
                    return; // Si hay errores de validación, no continuar
                }

                const cambios = hayCambiosEnCamposCriticos();
                const hayCambiosCriticos = cambios.contenido;

                if (!hayCambiosCriticos) {
                    // No hay cambios en campos críticos - mostrar confirmación directamente
                    mostrarConfirmacion();
                } else {
                    // Hay cambios en campos críticos - validar con AJAX
                    isSubmitting = true;

                    $.ajax({
                        url: "../AJAX/AJAX_Calificaciones/existeContenido.php",
                        type: "POST",
                        data: $(form).serialize(),
                        success: function (resultado) {
                            $("#contenidoEditError").html(resultado);

                            var errores = document.getElementById("contenidoEditError").textContent;

                            if (errores.trim() === "") {
                                mostrarConfirmacion();
                            } else {
                                console.log("Error en la validación: ", errores);
                                isSubmitting = false;
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error("Error en la solicitud AJAX:", status, error);
                            isSubmitting = false;
                        }
                    });
                }
            });

            function mostrarConfirmacion() {
                let titulo = "¿Desea editar el contenido de la actividad seleccionada?";

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
                        swalWithBootstrapButtons.fire({
                            title: "Acción procesada con éxito",
                            text: "La información de la materia se editó correctamente.",
                            icon: "success",
                        }).then(() => {
                            // Recargar la página o redireccionar
                            form.submit();
                            limpiarErrores();
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
            modal.addEventListener("hidden.bs.modal", function () {
                limpiarErrores();
                form.reset();
            });
        });