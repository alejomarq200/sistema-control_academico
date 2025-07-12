<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/modalesMaterias/modalEditM.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/modalesActividades/modalCrearA.css">
</head>
<body>
    <div class="modal fade" id="ModalFormAEdit" tabindex="-1" aria-labelledby="ModalFormLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-area">
                        <h1 class="text-center">Editar Actividades</h1>
                        <form action="../controller_php/controller_EditActividad.php" method="POST"
                            id="form-EditActividad">
                            <div class="mb-1">
                                <input type="text" name="idEditA" id="idEditA" class="input" hidden>
                            </div>
                            <div class="mb-1">
                                <label for="nombreGradoEdit" class="form-label">Nombre del Grado</label>
                                <input type="text" class="form-control" name="nombreGradoEdit" id="nombreGradoEdit"
                                    readonly>
                            </div>
                            <p class="errorAEdit" id="nombreGradoEditError"></p>
                            <div class="mb-1">
                                <label for="nombreAsigEdit" class="form-label">Nombre de la Asignatura</label>
                                <input type="text" class="form-control" name="nombreAsigEdit" id="nombreAsigEdit"
                                    readonly>
                            </div>
                            <p class="errorAEdit" id="nombreAsigEditError"></p>
                            <div class="mb-1">
                                <label for="nombreProfesorEdit" class="form-label">Nombre del profesor</label>
                                <input type="text" class="form-control" name="nombreProfesorEdit"
                                    id="nombreProfesorEdit" readonly>
                            </div>
                            <p class="errorAEdit" id="nombreProfesorEditError"></p>

                            <div class="mb-1">
                                <label for="contenidoEdit" class="form-label">Contenido</label>
                                <textarea name="contenidoEdit" id="contenidoEdit" class="styled-textarea"
                                    placeholder="Ingrese la descripción de la actividad" maxlength="200"
                                    oninput="contarCaracteres()"></textarea>
                                <span class="char-counter"><span id="contador">0</span>/200</span>
                            </div>
                            <p class="errorAEdit" id="contenidoEditError"></p>
                            <button type="submit" class="btn btn-light mt-2">Editar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SCRIPT-->
    <script>
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
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>
</body>
</html>